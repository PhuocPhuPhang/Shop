@extends('layouts.master')
@section('content')

<div class="container">
	<label class="title_tpl">{{$news_detail->title}}</label>
	<p id="tintuc">{{$news_detail->noi_dung}}</p>
</div>
@endsection