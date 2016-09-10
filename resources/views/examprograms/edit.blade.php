@extends('layouts.app')

@section('content')
<div class="container">
		@if($program)
				<div class="row">
						<div class="col-sm-8">
								<h1>
									{{ $program->belt->label() }} {{ $program->group->name }}
									<a href="{{ url( 'examprograms?groupName='.$program->group->name.'&beltId='.$program->belt->id ) }}" class="btn btn-primary"><i class="fa fa-chevron-left"></i></a>
								</h1>
								<table class="table">
										<thead>
												<tr>
														<th>Bezeichnung</th>
														<th>Beschreibung</th>
														<th>Aktionen</th>
												</tr>
										</thead>
										<tbody>
												@foreach ($program->entries as $entry)
														<tr>
																<td>{{$entry->content->name}}</td>
																<td>{{$entry->content->description}}</td>
																<td>
														        <form action="{{ url('examprograms/'.$program->id.'/entries/'.$entry->id) }}" method="POST">
														            {{ csrf_field() }}
														            {{ method_field('DELETE') }}
														            <button type="submit" class="btn btn-danger">
														                <i class="fa fa-btn fa-trash"></i> Remove
														            </button>
														        </form>
																</td>
														</tr>
												@endforeach
										</tbody>
								</table>
								<form id="contents" action="{{ url('examprograms/'.$program->id) }}" method="POST">
				            {{ csrf_field() }}
				            {{ method_field('PUT') }}
								</form>
						</div>
						<div class="col-sm-4" id="contentbar" style="overflow: auto;">
								@foreach($contents as $content)
									<div class="row">
										<div class="col-xs-10">
												<h5>{{$content->name}}</h5>
												<p>{{$content->description}}</p>
										</div>
										<div class="col-xs-2">
												<script>
														var table = '<h2 class="top-margin">New entries</h2>' +
																				'<table class="table">' +
																						'<thead>' +
																								'<tr>' +
																										'<th>Bezeichnung</th>' +
																										'<th>Beschreibung</th>' +
																										'<th>Aktionen</th>' +
																								'</tr>' +
																						'</thead>' +
																						'<tbody id="newcontents">' +
																						'</tbody>' +
																				'</table>' +
																				'<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Save</button>';
														var rowId = 0;
														function addRow(contentId, name, description) {
																if (rowId === 0) {
																		$('#contents').append(table);
																}
																rowId++;
																var row = 	'<tr id="contentrow-' + rowId + '">' +
																							'<td>' +
																								name +
																								'<input type="hidden" name="contents[' + rowId + ']" value="' + contentId + '">'+
																							'</td>' +
																							'<td>' + description + '</td>' +
																							'<td>' +
																								'<button type="button" class="btn btn-danger" onclick="removeRow(' + rowId + ')"><i class="fa fa-minus"></span></button>'
																							'</td>' +
																						'</tr>';
																$('#newcontents').append(row);
														};

														function removeRow(id) {
															$('#contentrow-' + id).detach();
														};
												</script>

												<button type="button" class="btn btn-primary" onclick="addRow( {{ $content->id }}, '{{$content->name}}', '{{$content->description}}');">
														<i class="fa fa-plus"></i>
												</button>
										</div>
									</div>
								@endforeach
						</div>
				</div>
				<script>
						window.onload = function() {
							$('#contentbar').height(
								$(window).height() - $('nav.navbar').outerHeight(true)
							);
						};
				</script>
		@endif
</div>
@endsection
