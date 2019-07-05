<section class="footer">
	<div class="center-layout footer-content flex-between-center footer_repon">
		<div class="footer-col">
			<div class="footer-title">Thông tin công ty</div>
			<div class="footer-row">
				<span style="font-size: 28px;text-transform: uppercase;font-weight: bold;color: #fed700;">{{$website->ten_cong_ty}}</span>
			</div>
			<div class="footer-row">
				<span>Tel: {{$website->dien_thoai}}</span>
			</div>
			<div class="footer-row">
				<span>E-mail: {{$website->email}}</span>
			</div>
			<div class="footer-row">
				<span>Webiste: {{$website->website}}</span>
			</div>
		</div>
		<div class="footer-col">
            <div class="footer-title">Chính sách công ty</div>
            @foreach($tintuc as $chinhsach)
            @if($chinhsach->type == "chinh-sach")
            <a class="footer-row" href="shop/tin-tuc/{{$chinhsach->ten_khong_dau}}" title="{{$chinhsach->title}}">{{$chinhsach->title}}</a>
            @endif
            @endforeach
		</div>
		<div class="footer-col">
		    <p id="tintuc">{{$website->map}}</p>
		    
		</div>
	</div>
	<!-- <section class="tags container">
		<a href="">Samsung s10</a>
		<a href="">Samsung galaxy</a>
		<a href="">iphone 6 plus</a>
	</section> -->
	<section class="copyright">
		<div class="center-layout copy_repon flex-between-center copyright-content">
			<div class="copyright-left">Copyright <i class="far fa-copyright"></i> 2019 <span>Đồ án tốt nghiệp</span> . All rights reserved. Web design: NiNa Co., Ltd</div>
			<!-- <div class="copyright-right">
				<span>Đang Online: 1</span>
				<span>Tổng truy cập: 100</span>
			</div> -->
		</div>
	</section>
</section>
