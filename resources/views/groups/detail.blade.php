<form class="form-horizontal" action="{{ url('groups/'.$group->id) }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
		<h3>
				{{$group->name}}
				<button type="submit" class="btn btn-danger pull-right"><i class="fa fa-btn fa-trash"></i> Löschen</button>
				<a href="{{ url('groups/'.$active->id.'/edit') }}" class="btn btn-default pull-right" role="button"><i class="fa fa-btn fa-pencil"></i> Bearbeiten</a>
		</h3>
</form>
<table class="table">
		<thead>
				<tr>
						<th>Name</th>
						<th>Graduierung</th>
						<th>Berechtigungen</th>
						@if (Auth::user()->admin)
								<th>Aktionen</th>
						@endif
				</tr>
		</thead>
		<tbody>
				@foreach ($group->users as $user)
						<tr>
								<td>{{$user->fullname()}}</td>
								<td>{{$user->belt->label()}}</td>
								<td>
										@if($user->admin)
												Admin
										@endif
										@if($user->admin && $user->instructor)
												|
										@endif
										@if($user->instructor)
												Instruktor
										@endif
								</td>
								@if (Auth::user()->admin)
										<td>
								        <form action="{{ url('users/'.$user->id) }}" method="POST">
								            {{ csrf_field() }}
								            {{ method_field('DELETE') }}
														<a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
								            <button type="submit" class="btn btn-danger">
								                <i class="fa fa-trash"></i>
								            </button>
								        </form>
										</td>
								@endif
						</tr>
				@endforeach
		</tbody>
</table>
