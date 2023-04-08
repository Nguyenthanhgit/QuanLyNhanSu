<?php
    include 'inc/Header.php';
    include '../Controller/ChamCongController.php';
	//include '../Controller/NhanVienController.php';
?>

<?php
    
	$classChamCong = new ChamCongController();

	if (!isset($_GET['NhanVienId']) || $_GET['NhanVienId'] == NULL)
	{
		echo "<script>window.location='NhanVienIndex.php'</script>";
	}
	else
	{
		$id = $_GET['NhanVienId'];
	}
?>

<div class="ViTriIndex">
<div id="addViTri">
</div>

<table  id="customers">
	<tr class="Search">
    <th><input></th>
    <th><input></th>
  </tr>
  <tr class="TableHead">
    <th>Id</th>
	<th>Ngày Chấm công</th>
  </tr>
  
	<?php
		$list = $classChamCong->GetChamCong($id);
		if ($list)
		{
			$i = 0;
			while ($result = $list->fetch_assoc())
			{
				$i++;
	?>
	<tr>
    <td><?php echo $i; ?></td>

    <td><?php echo $result['NgayLam'] ?></td>
	</tr>
	<?php 
		} 
			}
	?>
</table>
</div>

<?php
    include 'inc/Footer.php';
?>