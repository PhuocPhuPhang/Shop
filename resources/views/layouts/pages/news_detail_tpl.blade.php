@extends('layouts.master')
@section('content')

<div class="container">
	<label class="title_tpl" style="margin-top: 10px;">{{$news_detail->title}}</label>
	<p id="tintuc" style="margin-bottom: 20px;">{{$news_detail->noi_dung}}</p>
	<div class="binhluan">
		<label>Bình luận bài viết</label>
	</div>

	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>
	<div class="fb-comments" data-href="<?php echo url()->current(); ?>" data-width="100%" data-numposts="5"></div>
</div>

@endsection