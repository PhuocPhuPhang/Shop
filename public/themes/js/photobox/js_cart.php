<script src="js/sweetalert.min.js"></script>
<script>
	function addtocart10(act,pid,sl){
		$.ajax({
			url: 'ajax/cart.php',
			type: 'POST',
			dataType:'json',
			data:{act:act,pid:pid,sl:sl},
			error: function(){
				swal("Phát hiện lỗi!", "Bạn đã gặp lỗi trong quá trình đặt hàng!", "error");
			},
			success:function(kq){
				if(act == 'addtocart' && kq.check != 0){
					loadCart10(pid);
				}
				if(act == 'buynow' && kq.check != 0){
					window.location='gio-hang';
				}
				$('#quantity-product').html(kq.sl);
				console.log(kq);
			}
		});
	}
	function loadCart10(pid){
		$('#foo').load("ajax/loadCart.php",{'pid':pid}, function(){
			var foo = $('#foo').html(); 
			$.fancybox.open(foo);
		});
	}
	function del($pid){
		swal({
			title: "Bạn có chắc chắn xóa sản phẩm này khỏi giỏ hàng?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				var pid = $pid;
				var act = "delete";
				$.ajax({
					type:'POST',
					url:'ajax/cart.php',
					data:{pid:pid,act:act},
					success: function(result) {
						window.location.reload();
					}
				});
			}
		});
	}
	$(document).ready(function(){
		$('.amount').click(function(event) {
			<?php if($template == 'cart' || $template == 'pay') { ?>
				var pid = $(this).attr('data-id');
				var amount = $('#amount-'+pid).val();
			<?php }else{ ?>
				var amount = $('#amount').val();
			<?php } ?>
			var action = $(this).attr('data-action');
			if(amount >= 1){
				if(action == 'minus'){
					if(amount == 1){
						return false;
					}else{
						amount--;
					}
				}
				if(action == 'plus'){
					amount++;
				}
				<?php if($template == 'cart' || $template == 'pay') { ?>
					var act = 'update';
					$.ajax({
						type:'POST',
						url:'ajax/cart.php',
						data:{act:act,amount:amount,pid:pid},
						success: function(result) {
							var getData = $.parseJSON(result);
							$('#amount-'+pid).val(getData.amount);
							$('#price-'+pid).html(getData.price);
							$('#order-subtotal').html(getData.total);
							$('#order-total').html(getData.total);
						}
					});
				<?php }else{ ?>
					$('#amount').val(amount);
				<?php } ?>
			}else{
				return false;
			}
		});
		$(".select_tinhthanh").change(function() {
			var child = $(this).data("child");
			var levell = $(this).data('level');
			var table = $(this).data('table');
			var type = $(this).data('type');
			$.ajax({
				url: 'ajax/ajax_tinhthanh.php',
				type: 'POST',
				data: {level: levell,id:$(this).val(),table:table,type:type},
				success:function(data){
					if(levell=='0'){
						$("#id_dist").html("<option>Quận/Huyện</option>");
						$("#id_ward").html("<option>Phường/Xã</option>");
						$("#id_street").html("<option>Đường</option>");
					}else if(levell=='1'){
						$("#id_ward").html("<option>Phường/Xã</option>");
						$("#id_street").html("<option>Đường</option>");
					}else if(levell=='2'){
						$("#id_street").html("<option>Đường</option>");
					}
					$("#"+child).html(data);
				}
			});
		});
		$('.item_pttt').click(function(){
			$('.item_pttt').removeClass('active');
			$(this).addClass('active');
			var tab = $(this).attr('data-tab');
			var phuongthuc = $(this).attr('data-value');
			$('.content_pttt div').removeClass('active');
			$(tab).addClass('active');
			$("input[name='phuongthuc']").val(phuongthuc);
		})
	});
</script>