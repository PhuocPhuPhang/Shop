@extends('layouts.master')
@section('content')
<div class="news_tpl_wrap">
	<label class="news_tpl_title">Tin công nghệ</label>
	<div class="container flex-between">
		<div class="news_tpl_left news_tpl_grid">
			@foreach($tintuc_shop as $tt)
			<div class="news_tpl_box flex-between">
				<div class="img_news_tpl">
					<a href="shop/tin-tuc/{{$tt->ten_khong_dau}}" title=""><img src="upload/tintuc/{{$tt->hinh_anh}}" alt=""/></a>
				</div>
				<div class="news_tpl_info">
					<a class="news_tpl_name" href="shop/tin-tuc/{{$tt->ten_khong_dau}}" title="">{{$tt->title}}</a>
					<div class="news_tpl_mota">{{$tt->mo_ta}}</div>
					<span class="news_tpl_date">{{$tt->updated_at}}</span>
				</div>
			</div>
			@endforeach
		</div>
		<div class="news_tpl_right">
			<div class="product_tintuc_wrap">
				<div class="title" style="font-weight: bold;text-transform: uppercase;color: #000;font-size: 22px;"><h3>Sản phẩm nổi bật</h3></div>
				<ul id="scroller2">
					@foreach($product_shop as $ps)
					<li>
						<div class="main_news flex-between">
							<div class="img_news">
								<a class="w-img effect-zoom" href="shop/san-pham/{{$ps->ma_san_pham}}" title="{{$ps->ten_san_pham}}">
									<img src="upload/sanpham/{{$ps->hinh_anh}}" alt="{{$ps->ten_san_pham}}">
								</a>
							</div>
							<div class="news_list_info" style="margin-left: 10px;">
								<div class="news_list_name"><a href="shop/san-pham/{{$ps->ma_san_pham}}">{{$ps->ten_san_pham}}</a></div>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
