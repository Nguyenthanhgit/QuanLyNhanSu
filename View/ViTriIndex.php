<?php 
	include '../View/inc/Header.php'; 
	include '../Controller/ViTriController.php';
?>
<?php
	$class = new ViTriController();
	
	if (isset($_GET['XoaId']))
	{
		$id = $_GET['XoaId'];
		$result = $class->Del($id);
	}
?>

<div class="ViTriIndex">
<div id="addViTri">
	<a href="ViTriAdd.php" style="display: inline-block; padding: 0.5rem 1rem; font-size: 1rem; font-weight: bold; text-align: center; text-decoration: none; background-color: white; color: black; border-radius: 0.25rem ; border: 1px solid black; cursor: pointer;">
		Thêm sản phẩm
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
    <th>Lương cơ bản</th>
	<th>Cấp độ</th>
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
    <td><?php echo $result['Ten']; ?></td>
    <td><?php echo $result['LuongCoBan']; ?></td>
	<td><?php echo $result['CapDo']; ?></td>
	<td>
		<a href="ViTriEdit.php?ViTriId=<?php echo $result['Id'] ?>">Sửa</a> || <a onClick="window.confirm('Bạn muốn xóa chứ?')" href="?XoaId=<?php echo $result['Id'] ?>">Xóa</a>
	</td>
	</tr>
	<?php 
		} 
			}
	?>
</table>
</div>
<?php include '../View/inc/Footer.php'; ?>	