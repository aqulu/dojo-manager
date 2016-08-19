@extends('media.preview')

@section('buttons')
<button type="button" class="btn btn-default" onclick="addRow( {{ $media->id }}, '{{ $media->videoId() }}', '{{ $media->user->firstname . ' ' . $media->user->lastname }}' );">Add to content</button>
<script>
		var table = '<h2>New media</h2>' +
								'<table class="table" id="newmedia">' +
										'<thead>' +
												'<tr>' +
														'<th>Thumbnail</th>' +
														'<th>Uploader</th>' +
														'<th>Aktionen</th>' +
												'</tr>' +
										'</thead>' +
										'<tbody id="newmedia">' +
										'</tbody>' +
								'</table>';
		var rowId = 0;
		function addRow(contentId, videoId, name) {
				if (rowId === 0) {
						jQuery('#contentfrm').append(table);
				}
				rowId++;
				var row = 	'<tr id="mediarow-' + rowId + '">' +
											'<td>' +
												'<input type="hidden" name="media[' + rowId + ']" value="' + contentId + '">'+
												'<img src="http://img.youtube.com/vi/' + videoId + '/0.jpg" height="50px" alt="video thumbnail">' +
											'</td>' +
											'<td>' + name + '</td>' +
											'<td>' +
												'<button type="button" class="btn btn-danger" onclick="removeRow(' + rowId + ')"><span class="glyphicon glyphicon-trash"></span></button>'
											'</td>' +
										'</tr>';
				jQuery('#newmedia').append(row);
		};

		function removeRow(id) {
			jQuery('#mediarow-' + id).detach();
		};
</script>

@endsection
