<?php
	include_once('../config/database.php');
	$mahd=$_GET['mahd'];
	$sql="select * from chitiethoadon where MaHD=$mahd ";
	$rs=mysqli_query($conn,$sql);
	$sql2="select * from nguoinhan where MaHD=$mahd ";
	$rs2=mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_array($rs2);
?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
        	<br>
			<h4 class="m-auto" > HÓA ĐƠN</h4>
			<br>
			<hr>
			
			<br>
			<hr>
			
			<table class="table table-hover m-auto text-center" style="font-size: 13px;">
				<thead class="badge-info">
					<tr>
						<th>Tên Sản Phẩm</th><th>Số Lượng </th><th>Đơn Giá</th><th>Thành Tiền</th><th>Size</th><th>Màu</th>
					</tr>
				</thead>
				<tbody >
			 <?php $so=0;
				 while ($row=mysqli_fetch_array($rs)) {
					 $maSp= $row['MaSP'];
					 $sqlsp = "SELECT * FROM `sanpham` WHERE `MaSP`= $maSp";
					 $querysp = mysqli_query($conn,$sqlsp);
					 $datasp = mysqli_fetch_array($querysp);
					 $so=$so+$row['ThanhTien']; ?>
					<tr>
						<td><?php echo $datasp['TenSP']; ?></td>
						<td><?php echo $row['SoLuong']; ?></td>
						<td><?php echo number_format($row['DonGia']).' đ'; ?></td>
						<td><?php echo number_format($row['ThanhTien']).' đ'; ?></td>
						<td><?php echo $row['Size']; ?></td><td><?php echo $row['MaMau']; ?></td>
						
					</tr>
			 <?php	} ?>
					
				</tbody>
			</table><br><hr>
			<h5 class="m-auto" style="font-family: Alata;">Tổng : <?php echo number_format($so).' đ'; ?></h5>
			<br><hr>
			
		</div>

	</div>

		<div class="col-12" >
			<center>
				<button type="sub" name="dk" value="đã duyệt"class="btn btn-primary" style="font-family: Comfortaa;">In hóa Đơn</button>
			</center>
		</div>
				
</div>



<?php 


?>