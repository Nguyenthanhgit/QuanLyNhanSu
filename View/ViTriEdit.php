<?php include '../View/inc/Header.php'; ?>
<?php include'../Controller/ViTriController.php' ?>
<?php
	$class = new ViTriController();
	
	if (!isset($_GET['ViTriId']) || $_GET['ViTriId'] == NULL)
	{
		echo "<script>window.location='ViTriIndex.php'</script>";
	}
	else
	{
		$id = $_GET['ViTriId'];
	}
	
	if ($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$ten = $_POST['ten'];
		$luongCoBan = $_POST['luongCoBan'];
		$capDo = $_POST['capDo'];
		
		$sua = $class->Update($id, $ten, $luongCoBan, $capDo);
	}
?>
<div class="ViTriAdd" style="text-align: center; font-weight: bold; font-size: 25px;">
	Sửa vị trí
</div>


<h4>
<?php
	if (isset($sua))
	{
		echo $sua;
	}
?>
<?php
	$ViTri = $class->GetViTri($id = $id);
	if ($ViTri)
	{
		while ($result = $ViTri->fetch_assoc())
		{
			
?>
</h4>
<form class="ViTriAdd" action="" method="post">
  <label for="name">Tên:</label>
  <input type="text" id="name" name="ten" value="<?php echo $result['Ten'] ?>" required>

  <label for="basic_salary">Lương cơ bản:</label>
  <input type="number" id="basic_salary" name="luongCoBan" min="0" value="<?php echo $result['LuongCoBan'] ?>" required>

  <label for="level">Cấp độ:</label>
<input type="number" id="level" name="capDo" min="0" value="<?php echo $result['CapDo'] ?>" required>

  <button type="submit">Sửa vị trí</button>
</form>
<?php
		}
	}
?>
<?php include '../View/inc/Footer.php'; ?>