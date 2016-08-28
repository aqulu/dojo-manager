@extends('layouts.app')

@section('content')
<div class="container">
	<table class="table">
			<thead>
					<tr>
							<th>Name</th>
							<th>Gruppe</th>
							<th>Graduierung</th>
							<th>Berechtigungen</th>
							@if (Auth::user()->admin)
									<th>Aktionen</th>
							@endif
					</tr>
			</thead>
			<tbody>
					@foreach ($users as $user)
							<tr>
									<td><a href="{{ url('users/'.$user->id) }}">{{$user->fullname()}}</a></td>
									<td>
											@if ($user->group)
													{{ $user->group->name }}
											@else
													No group
											@endif
									</td>
									<td>
											@if ($user->belt)
													{{$user->belt->label()}}
											@else
													No belt
											@endif
									</td>
									<td>
											@if ($user->admin)
													Admin
											@endif
											@if ($user->admin && $user->instructor)
													|
											@endif
											@if ($user->instructor)
													Instructor
											@endif
									</td>
									@if (Auth::user()->admin)
											<td>
									        <form action="{{ url('users/'.$user->id) }}" method="POST">
									            {{ csrf_field() }}
									            {{ method_field('DELETE') }}
															<a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span>Edit</a>
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
</div>
@endsection
