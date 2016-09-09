@extends('layouts.app')

@section('content')
<div class="container">
		<form action="{{ url('/examprograms') }}" method="GET">
				<div class="row">
						<div class="col-xs-4">
								<h4>Group</h4>
								<select name="groupName" class="form-control">
						        @foreach ($groups as $group)
										  <option role="presentation"
						  						@if ($program && $group->id == $program->group_id)
															selected
													@endif
													value="{{$group->name}}"
											>{{$group->name}}</option>
										@endforeach
								</select>
						</div>
						<div class="col-xs-4">
								<h4>Belt</h4>
								<select name="beltId" class="form-control">
						        @foreach ($belts as $belt)
										  <option role="presentation"
						  						@if ($program && $belt->id == $program->belt_id)
															selected
													@endif
													value="{{$belt->id}}"
											>{{$belt->label()}}</option>
										@endforeach
								</select>
						</div>
						<div class="col-xs-2">
								<button type="submit" class="btn btn-primary">Anzeigen</button>
						</div>
				</div>
		</form>

		@if($program)
				<h1>
					{{ $program->belt->label() }} {{ $program->group->name }}
					<a href="{{ url('examprograms/'.$program->group->name.'/'.$program->grade->id) }}" class="btn btn-primary"><i class="fa fa-chevron-left"></i></a>
				</h1>
				<div class="row">
						<div class="col-xs-8" id="contents">
								<table class="table">
										<thead>
												<tr>
														<th>Bezeichnung</th>
														<th>Beschreibung</th>
														<th>Aktionen</th>
												</tr>
										</thead>
										<tbody>
												@foreach ($program->contents as $content)
														<tr>
																<td>{{$content->name}}</td>
																<td>{{$content->description}}</td>
																<td>
														        <form action="{{ url('examprograms/'.$program->id.'/contents/'.$content->id) }}" method="POST">
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

						</div>
						<div class="col-xs-4" style="height: 100%; overflow: auto;">
								@foreach($contents as $content)
								<div class="row">
							  <div class="col-xs-10">
										<h5>{{$content->name}}</h5>
										<p>{{$content->description}}</p>
							  </div>
							  <div class="col-xs-2">
										<script>
												var table = '<h2>New entries</h2>' +
																		'<table class="table">' +
																				'<thead>' +
																						'<tr>' +
																								'<th>Bezeichnung</th>' +
																								'<th>Beschreibung</th>' +
																								'<th>Aktionen</th>' +
																						'</tr>' +
																				'</thead>' +
																				'<tbody id="newcontentsbody">' +
																				'</tbody>' +
																		'</table>';
												var rowId = 0;
												function addRow(contentId, name, description) {
														if (rowId === 0) {
																jQuery('#contents').append(table);
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
														jQuery('#newcontents').append(row);
												};

												function removeRow(id) {
													jQuery('#contentrow-' + id).detach();
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
		@endif
</div>
@endsection
