@extends('media.preview')

@section('buttons')
<form class="form-horizontal" action="{{ url('contents/'.$contentId.'/media/'.$media->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
		<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Entfernen</button>
</form>
@endsection
