@extends('media.preview')

@section('buttons')
<form class="form-horizontal" action="{{ url('contents/'.$contentId.'/media') }}" method="POST">
    {{ csrf_field() }}
		<input type="hidden" name="mediaId" value="{{ $media->id }}">
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add</button>
</form>
@endsection
