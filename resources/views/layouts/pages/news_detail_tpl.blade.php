@extends('layouts.master')
@section('content')

<div class="container">
	<label class="title_tpl">{{$tintuc->ten}}</label>
	<p id="tintuc">{{$tintuc->noi_dung}}</p>

</div>
@endsection