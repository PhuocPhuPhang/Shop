@extends('layouts.master')
@section('content')
<div class="container">
	<div class="video-grid" style="display: grid;grid-template-columns: repeat(4,1fr);grid-gap: 30px;">
		@foreach($video as $vi)
		<a href="{{$vi->link}}"><img src="{{$vi->link}}"></a>
		@endforeach
	</div>
</div>
@endsection