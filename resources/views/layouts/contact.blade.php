@extends('layouts.master')
@section('content')
<div class="row box mx-0">
	<div class="col-md-5">
		<h3 class="title-contact">Thông tin liên hệ</h3>
		<?=$row_detail['noidung_'.$lang]?>
	</div>
	<div class="col-md-7">
		<h3 class="title-contact">Liên hệ với chúng tôi</h3>
		<form id="frmContact" method="post" action="lien-he">
			<div class="row">
				<div class="col-md-6">
					<input type="text" name="fullname" placeholder="<?=_hovaten?>">
				</div>
				<div class="col-md-6">
					<input type="text" name="phone" placeholder="<?=_sodienthoai?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<input type="email" name="email" placeholder="Email">
				</div>
				<div class="col-md-6">
					<input type="text" name="address" placeholder="<?=_diachi?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<textarea name=content placeholder="<?=_noidung?>"></textarea>
				</div>
			</div>
			<div class="text-center">
				<button type="submit"><?=_gui?></button>
				<button type="reset"><?=_huy?></button>
			</div>
			<input type="hidden" id="recaptchaResponse" name="recaptcha_response">
		</form>
	</div>
</div>

@endsection