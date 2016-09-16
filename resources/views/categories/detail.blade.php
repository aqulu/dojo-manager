<h3>{{$category->name}}</h3>
<table class="table">
		<thead>
				<tr>
						<th>Bezeichnung</th>
						<th>Beschreibung</th>
						@if (Auth::user()->admin)
								<th>Aktionen</th>
						@endif
				</tr>
		</thead>
		<tbody>
				@foreach ($category->contents as $content)
						<tr>
								<td class="col-md-3"><a href="{{ url('contents/'.$content->id) }}">{{$content->name}}</a></td>
								<td class="col-md-7">{{$content->description}}</td>
								@if (Auth::user()->admin)
										<td class="col-md-2">
								        <form action="{{ url('contents/'.$content->id) }}" method="POST">
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

@if (Auth::user()->admin)
<div class="panel panel-default">
	  <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Add entry</div>
	  <div class="panel-body">
				<form action="{{ url('categories/'.$category->id.'/contents') }}" method="POST">
					{{ csrf_field() }}

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="control-label">Name</label>
              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
              <label for="description" class="control-label">Description</label>
              <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="The technique's description"></textarea>
              @if ($errors->has('description'))
                  <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
          </div>

					<div class="form-group">
							<ul class="nav nav-tabs">
									  <li role="presentation" class="active">
												<a href="">Available media</a>
										</li>
										<li>
												<a href="">New video</a>
										</li>
							</ul>
							@if ($allMedia)
									@foreach($allMedia as $media)
											@include('media/preview', ['media' => $media])
									@endforeach
							@endif
					</div>

					<button type="submit" class="btn btn-primary pull-right">
						<span class="glyphicon glyphicon-floppy-disk"></span> Save
					</button>
				</form>
	  </div>
</div>
@endif
