<?php include '../View/inc/Header.php' ?>
<?php include'../Controller/ChamCongController.php' ?>
<?php 
	$userId = Session::get('userId');		
	$class = new ChamCongController();	
	$hadChecked = $class->CheckChamCong($userId);	
	
	if ($_SERVER['REQUEST_METHOD'] === "POST")
	{
		if ($hadChecked == false)
		{
			$result = $class->ChamCong($userId);
		}
		
		header("Location: ChamCong.php");
	}
?>
	<div class="form-container">
      <form action="" method="post">
        <div class="form-row">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" value="A" readonly>
        </div>
        <div class="form-row">
          <label for="phone">Phone:</label>
          <input type="text" id="phone" name="phone" value="123123" readonly>
        </div>
        <div class="form-row">
          <label for="mail">Mail:</label>
          <input type="text" id="mail" name="mail" value="qwe@gmail.com" readonly>
        </div>
		<div class="form-row">
			<?php
				if ($hadChecked == false){
			?>
			<button type="submit" id="clock">Chấm công</button>
			<?php
				}
				else{
			?>
			<button type="submit" style="background-color: gray !important" id="clock"></button>
			<?php
				}
			?>
		</div>
      </form>
    </div>
	<div class="button-container">
		<a href="Profile.php?NhanVienId=<?php echo $userId ?>" class="button">Thông tin</a>
  		<a href="#" class="button">Đơn hàng</a>
  		<a href="#" class="button">KPI</a>
  		<a href="#" class="button">Nghỉ phép</a>
  		<a href="#" class="button">Chấm công</a>
	</div>
	<script>
		function updateTime() {
			var clockElement = document.getElementById("clock");
			var hadChecked = <?php echo $hadChecked ? 'true' : 'false'; ?>;
			if (hadChecked == true) {
				var now = new Date();
				var hours = now.getHours();
				var minutes = now.getMinutes();
				var seconds = now.getSeconds();
				clockElement.innerHTML = hours + ":" + minutes + ":" + seconds;
			
				setInterval(updateTime, 1000);
			}
			
		}
		window.onload = updateTime();
	</script>

<?php include '../View/inc/Footer.php' ?>