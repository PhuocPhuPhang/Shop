@extends('layouts.master')
@section('content')

<div class="container">
	<label class="title_tpl" style="margin-top: 10px;">{{$about->title}}</label>
	<p id="tintuc" style="margin-bottom: 20px;">{{$about->noi_dung}}</p>
</div>
@endsection