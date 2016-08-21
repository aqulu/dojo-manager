<h3>{{$group->name}}</h3>
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
												<a href="{{ url('users/'.$user->id.'/edit') }}" class=""><span class="glyphicon glyphicon-pencil"></span>Edit</a>
								        <form action="{{ url('users/'.$user->id) }}" method="POST">
								            {{ csrf_field() }}
								            {{ method_field('DELETE') }}
								            <button type="submit" class="btn btn-danger">
								                <i class="fa fa-btn fa-trash"></i> Delete
								            </button>
								        </form>
										</td>
								@endif
						</tr>
				@endforeach
		</tbody>
</table>
