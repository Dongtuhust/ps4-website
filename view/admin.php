<?php include "../includes/headeradmin.php" ?>
<div class="background-deep admin">

</div>
<div class = "head-title">
	<p>Managenment</p>
</div>
<div class="container" style="display: flex;flex-direction: column;">
	<!-- Quản lý sản phẩm do nhà phân phối cung cấp =========================================-->
	<div class="distributor">
		<div class="hover-effect" style="height: 50px">
			<h2 style="text-align: center;">Quản lý sản phẩm do nhà phân phối cung cấp</h2>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Tên sản phẩm</th>
					<th scope="col">Giá</th>
					<th scope="col">Miêu tả</th>
					<th scope="col">Thể loại</th>
					<th scope="col">Số lượng</th>
					<th scope="col">Nhà cung cấp</th>
					<th scope="col">Trạng thái</th>
					<th scope="col">Sửa</th>
				</tr>
			</thead>
			<tbody>
				<?php require_once("connectdb.php");
				$sql = "SELECT * FROM product";
				$result = mysqli_query($connect,$sql);
				$totalRows = mysqli_num_rows($result);
				if($totalRows>0){
					$i=0;
			// Sử dụng vòng lặp để duyệt kết quả truy vấn
					while ($row = mysqli_fetch_array ($result))
					{
						$i+=1;
						?>
						<tr valign="top">
							<th scope="row"><?=$row["product_id"]?></th>
							<td><?=$row["product_name"]?></td>
							<td ><?=$row["price_buy"]?></td>
							<td ><textarea class="form-control" rows="1"><?=$row["description"]?></textarea></td>
							<td style="text-align: center;"><?=$row["category_id"]?></td>
							<td style="text-align: center;"><?=$row["quantity"]?></td>
							<td style="text-align: center;"><?=$row["distributor_name"]?></td>
							<td style="text-align: center;"><?=$row["product_status"]?></td>
							<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#ModalCenter<?=$row["product_id"]?>" name="<?=$row["product_id"]?>">Sửa</button></td>
							<div class="modal fade" id="ModalCenter<?=$row["product_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa dữ liệu sản phẩm</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post">
											<div class="modal-body">
												<p style="color: blue;font-weight: bold;">product_id : </p><input type="text" class="form-control" name="product_id" value="<?=$row["product_id"]?>" readonly="true">
												<p style="color: blue;font-weight: bold;">product_name : </p><input type="text" class="form-control" name="product_name" value="<?=$row["product_name"]?>">
												<p style="color: blue;font-weight: bold;">price_buy : </p><input type="text" class="form-control" name="price_buy" value="<?=$row["price_buy"]?>">
												<p style="color: blue;font-weight: bold;">description : </p><input type="text" class="form-control" name="description" value="<?=$row["description"]?>">
												<p style="color: blue;font-weight: bold;">category_id : </p><input type="text" class="form-control" name="category_id" value="<?=$row["category_id"]?>">
												<p style="color: blue;font-weight: bold;">quantity : </p><input type="text" class="form-control" name="quantity" value="<?=$row["quantity"]?>">
												<p style="color: blue;font-weight: bold;">distributor_name : </p><input type="text" class="form-control" name="distributor_name" value="<?=$row["distributor_name"]?>">
												<p style="color: blue;font-weight: bold;">
												product_status : </p><select  class="form-control" name="product_status" value="<?=$row["product_status"]?>">
													<option value="Mới">Mới</option>
													<option value="Cũ">Cũ</option>
													<option value="Hot">Hot</option>
													<option value="Quá cũ">Quá cũ</option>
												</select>

											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" name="submited" class="btn btn-primary">Save changes</button>
											</div>
										</form>
									</div>
								</div>
							</div>

						</tr>
						<?php
					}
				}else{
					?>
					<tr valign="top">
						<td >&nbsp;</td>
						<td ><b><font face="Arial" color="#FF0000">
						Khong tim thay thong tin !</font></b></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
	<!-- Quản lý sản phẩm do người dùng đăng bán ========================================================-->
	<div class="product_user" style="margin-top: 50px;">
		<div class="hover-effect" style="height: 50px">
			<h2 style="text-align: center;">Quản lý sản phẩm do người dùng đăng bán</h2>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Tên sản phẩm</th>
					<th scope="col">Giá mua</th>
					<th scope="col">Giá thuê</th>
					<th scope="col">Miêu tả</th>
					<th scope="col">Thể loại</th>
					<th scope="col">Số lượng</th>
					<th scope="col">Email</th>
					<th scope="col">Sửa</th>
				</tr>
			</thead>
			<tbody>
				<?php require_once("connectdb.php");
				$sqlu = "SELECT * FROM product_user";
				$resultu = mysqli_query($connect,$sqlu);
				$totalRowsu = mysqli_num_rows($resultu);
				if($totalRowsu>0){
					$i=0;
			// Sử dụng vòng lặp để duyệt kết quả truy vấn
					while ($row = mysqli_fetch_array ($resultu))
					{
						$i+=1;
						?>
						<tr valign="top">
							<th scope="row"><?=$row["product_id"]?></th>
							<td><?=$row["product_name"]?></td>
							<td ><?=$row["price_buy"]?></td>
							<td ><?=$row["price_rent"]?></td>
							<td ><textarea class="form-control" rows="1"><?=$row["description"]?></textarea></td>
							<td style="text-align: center;"><?=$row["category_id"]?></td>
							<td style="text-align: center;"><?=$row["quantity"]?></td>
							<td style="text-align: center;"><?=$row["user_email"]?></td>
							<td ><button type="button" class="btn btn-light" data-toggle="modal" data-target="#product_user<?=$row["product_id"]?>" name="<?=$row["product_id"]?>">Sửa</button></td>
							<div class="modal fade" id="product_user<?=$row["product_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa dữ liệu sản phẩm</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="post">
											<div class="modal-body">
												<p style="color: blue;font-weight: bold;">product_id : </p><input type="text" class="form-control" name="product_id" value="<?=$row["product_id"]?>" readonly="true">
												<p style="color: blue;font-weight: bold;">product_name : </p><input type="text" class="form-control" name="product_name" value="<?=$row["product_name"]?>">
												<p style="color: blue;font-weight: bold;">price_buy : </p><input type="text" class="form-control" name="price_buy" value="<?=$row["price_buy"]?>">
												<p style="color: blue;font-weight: bold;">price_rent: </p><input type="text" class="form-control" name="price_rent" value="<?=$row["price_rent"]?>">
												<p style="color: blue;font-weight: bold;">description : </p><input type="text" class="form-control" name="description" value="<?=$row["description"]?>">
												<p style="color: blue;font-weight: bold;">category_id : </p><input type="text" class="form-control" name="category_id" value="<?=$row["category_id"]?>">
												<p style="color: blue;font-weight: bold;">quantity : </p><input type="text" class="form-control" name="quantity" value="<?=$row["quantity"]?>">
												<p style="color: blue;font-weight: bold;">user_email : </p><input type="text" class="form-control" name="user_email" value="<?=$row["user_email"]?>">

											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" name="submited_2" class="btn btn-primary">Save changes</button>
											</div>
										</form>
									</div>
								</div>
							</div>

						</tr>
						<?php
					}
				}else{
					?>
					<tr valign="top">
						<td >&nbsp;</td>
						<td ><b><font face="Arial" color="#FF0000">
						Khong tim thay thong tin !</font></b></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
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