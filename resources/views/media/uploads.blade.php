@include('media/index', [ 'allMedia' => Auth::user()->media, 'title' => 'Meine Videos' ])
