@extends('layouts.master')
@section('content')

<div class="container">
	<label class="title_tpl" style="margin-top: 10px;">{{$news_detail->title}}</label>
	<p id="tintuc" style="margin-bottom: 20px;">{{$news_detail->noi_dung}}</p>
</div>
@endsection