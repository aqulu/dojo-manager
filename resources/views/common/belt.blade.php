<svg height="{{ $height }}" viewbox="0 0 100 75"
	@if($style)
		style="{{$style}}"
	@endif
>
	<path d="M 0 20 q 50 10 100 0" style="stroke: {{ $color }}" stroke-width="7" fill="none" />
	<path d="M 10 75 q 40 -100 80 0" style="stroke: {{ $color }}" stroke-width="7" fill="none" />
	<circle cx="50" cy="25" r="10" style="fill: {{ $color }}"  />
</svg>
