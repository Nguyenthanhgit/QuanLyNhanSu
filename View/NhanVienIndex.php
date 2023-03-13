<?php 
	include '../View/inc/Header.php'; 
	include '../Controller/NhanVienController.php';
?>
<?php
	$class = new NhanVienController();
	
	if (isset($_GET['XoaId']))
	{
		$id = $_GET['XoaId'];
		$result = $class->Del($id);
	}
?>

<div class="ViTriIndex">
<div id="addViTri">
	<a href="NhanVienAdd.php" style="display: inline-block; padding: 0.5rem 1rem; font-size: 1rem; font-weight: bold; text-align: center; text-decoration: none; background-color: white; color: black; border-radius: 0.25rem ; border: 1px solid black; cursor: pointer;">
		Thêm nhân viên
	</a>
</div>

<h4>
<?php
	if (isset($result))
	{
		echo $result;
	}
?>
</h4>

<table  id="customers">
	<tr class="Search">
    <th><input></th>
    <th><input></th>
    <th><input></th>
  </tr>
  <tr class="TableHead">
    <th>Id</th>
    <th>Tên</th>
	<th>Email</th>
	<th>Vị Trí</th>
	<th>Chức năng</th>
  </tr>
  
	<?php
		$list = $class->Read();
		if ($list)
		{
			$i = 0;
			while ($result = $list->fetch_assoc())
			{
				$i++;
	?>
	<tr>
    <td><?php echo $i; ?></td>
	<?php $ten = $result['HoVaTenDem']." ".$result['Ten'] ?>
    <td><?php echo $ten ?> </td>
    <td><?php echo $result['Email'] ?></td>
	<td><?php echo $result['IdViTri'] ?></td>
	<td>
		<a href="NhanVienEdit.php?NhanVienId=<?php echo $result['Id'] ?>">Sửa</a> || <a onClick="return.confirm('Bạn muốn xóa chứ?')" href="?XoaId=<?php echo $result['Id'] ?>">Xóa</a>
	</td>
	</tr>
	<?php 
		} 
			}
	?>
</table>
</div>
<?php include '../View/inc/Footer.php'; ?>	