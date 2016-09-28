@extends('media.preview')

@section('buttons')
<form class="form-horizontal" action="{{ url('media/'.$media->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
		<a href="{{ url('media/'.$media->id.'/edit') }}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
		<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
</form>
@endsection
