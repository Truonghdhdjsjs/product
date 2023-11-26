<?php
echo view('frontend/templates/header.php');
?>

<!-- CONTENT -->
<section>
	<?php echo form_open('cart/form', 'id="myformCart"'); ?>
	<table border="1" align="center">
		<tr>
			<td>STT#</td>
			<td>ID</td>
			<td>Tên sản phẩm</td>
			<td>Giá</td>
			<td>Giảm giá</td>
			<td>Số lượng</td>
			<td>Thành tiền</td>
			<td>Chức năng</td>
		<tr>
			<?php
			$i = 1;
			foreach ($cart as $r) :
			?>
		<tr>
			<td> <?= $i++ ?></td>
			<td><?= $r['id'] ?><input type='hidden' name='cart[]' value='<?= $r['id'] ?>' /></td>
			<td><?= $r['tensp'] ?></td>
			<td><?= number_format($r['gia']) ?></td>
			<td><?= $r['giamgia'] ?></td>
			<td><input type='text' onfocusout='update("<?= $r['id'] ?>")' id='c_"<?= $r['id'] ?>"' name='cart[][]' value='<?= $r['soluong'] ?>' /></td>
			<td><?= number_format(($r['gia'] * $r['soluong']) - ($r['gia'] * $r['soluong'] * $r['giamgia'] / 100)) ?></td>
			<td><a href='/cart/delete/<?= $r['id'] ?> '>Delete</a></td>
		<tr>

		<?php endforeach; ?>

	</table>
	<div class="row" align="center">
		<div class="mb-6"><input type="submit" name="updateCart" value='Cập nhật' /></div>				<div class="mb-6"><input type="submit" name="payment" value='Thanh toán' /></div>
		
	</div>
	<?= form_close(); ?>
</section>
<div class="row ml-1">
	<span><a href="<?= base_url() ?>/products">Tiếp tục mua hàng</a></span>
</div>

<?php include_once("templates/scripts.php") ?>

<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}

	function updateCart(id) {
		var url = '<?php echo base_url() . "/cart/update/" ?>' + id;
		$('#myformCart').attr('action', url);
	}

	function update(id) {
		var url = "cart/update/" + id;
		var soluong = $("#c_" + id).val();
		//console.log(typeof soluong);

		if (isNaN(soluong) == false) {
			var data = {
				sl: soluong
			}

			$.post(url, data, function(result, status) {
				if (result != 1) {
					alert("Cập nhật thất bại");
				} else if (result == 1) {
					alert("Cập nhật thành công");
				}

			}); 
		} else {
			alert("Số lượng phải là số");
		}

	}
</script>

<?php
echo view('frontend/templates/scripts.php');
?>

<?php
echo view('frontend/templates/footer.php');
?>