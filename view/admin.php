<?php include "../includes/headeradmin.php" ?>
<script>
	$('distributor').click(function(){
		$.$.ajax({
			url: 'product.php',
			type: 'post',
			dataType: 'text',
			data: {},
			success : function(result){
				$('#distributor-pro').html(result);
			}
		});
	});
	$('user').click(function(){
		$.$.ajax({
			url: 'product_user.php',
			type: 'post',
			dataType: 'text',
			data: {},
			success : function(result){
				$('#product_user').html(result);
			}
		});
	});
</script>
<div class="background-deep admin">

</div>
<div class = "head-title">
	<p>Managenment</p>
</div>
<div class="container" style="display: flex;flex-direction: column;">
	<div class="tab">
		<button type="button" class="btn btn-success distributor" data-dismiss="modal">Nhà phân phối</button>
		<button type="submit" name="btn btn-primary user" class="btn btn-primary">Người dùng</button>
	</div>
	<!-- Quản lý sản phẩm do nhà phân phối cung cấp =========================================-->
	<div id="distributor-pro">

	</div>
	<!-- Quản lý sản phẩm do người dùng đăng bán ========================================================-->
	<div id="product_user" style="margin-top: 50px;">
		
	</div>
</div>
<!-- Modal -->
<?php
if (isset($_POST["submited"])) {
	$product_id = $_POST["product_id"];
	$product_name = $_POST["product_name"];
	$price_buy = $_POST["price_buy"];
	$description = $_POST["description"];
	$category_id = $_POST["category_id"];
	$quantity = $_POST["quantity"];
	$distributor_name = $_POST["distributor_name"];
	$product_status = $_POST["product_status"];
	$sqlupdate="update product set product_name='$product_name',price_buy='$price_buy',description='$description',category_id='$category_id',quantity='$quantity',distributor_name='$distributor_name',product_status='$product_status' Where product_id='$product_id'";
	$resultupdate = mysqli_query($connect, $sqlupdate);
	if ($resultupdate){
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thành công. Nhấn \'OK\' để quay về trang ADMIN." ?>');
		</script>

		<?php 
		$url="admin.php";
		echo "<meta http-equiv='refresh' content='0;url=$url' />";
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
if (isset($_POST["submited_2"])) {
	$product_id = $_POST["product_id"];
	$product_name = $_POST["product_name"];
	$price_buy = $_POST["price_buy"];
	$price_rent = $_POST["price_rent"];
	$description = $_POST["description"];
	$category_id = $_POST["category_id"];
	$quantity = $_POST["quantity"];
	$user_email = $_POST["user_email"];
	$sqlupdate="update product_user set product_name='$product_name',price_buy='$price_buy',
	price_rent='$price_rent',description='$description',category_id='$category_id',quantity='$quantity',user_email='$user_email' Where product_id='$product_id'";
	$resultupdate = mysqli_query($connect, $sqlupdate);
	if ($resultupdate){
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thành công. Nhấn \'OK\' để quay về trang ADMIN." ?>');
		</script>

		<?php 
		$url="admin.php";
		echo "<meta http-equiv='refresh' content='0;url=$url' />";
	} else {
		?>

		<script language="javascript">
			alert('<?php echo "Cập nhật dữ liệu thất bại." ?>');
		</script>

		<?php
	}
}
?>
<?php include "../includes/footer.php" ?>