@extends('layouts.master')
@section('content')
<div class="news_tpl_wrap">
	<label class="news_tpl_title">Tin công nghệ</label>
	<div class="container flex-between">
		<div class="news_tpl_left news_tpl_grid">
			@foreach($tintuc as $tt)
			<div class="news_tpl_box flex-between">
				<div class="img_news_tpl">
					<a href="" title=""><img src="upload/tintuc/{{$tt->hinh_anh}}" alt=""/></a>
				</div>
				<div class="news_tpl_info">
					<a class="news_tpl_name" href="news_detail_tpl/{{$tt->id}}" title="">{{$tt->ten}}</a>
					<div class="news_tpl_mota">{{$tt->mo_ta}}</div>
					<span class="news_tpl_date">{{$tt->updated_at}}</span>
				</div>
			</div>
			@endforeach
		</div>
		<div class="news_tpl_right"></div>
	</div>
</div>
@endsection