<?php
	include '../Library/session.php';
	Session::checkSession();
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link href="../Assets/CSS/Index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
	
  </head>
  <body>
    <div class="Wrapper">

		<div class="Sidebar">
        <ul class="Components">
          <li>
            <p><a href="./Index.php"><?php echo Session::get('userAccount') ?></a></p>
          </li>
		  <?php
				if (Session::get('capDo') == 1)
				{
		  ?>
          <li>
            <a href="../View/ViTriIndex.php">Vị trí</a>
          </li>
          <li>
            <a href="../View/NhanVienIndex.php">Nhân viên</a>
          </li>
		  <?php
				}
		  ?>
		  <?php
			if (isset($_GET['action']) && $_GET['action'] == "LogOut")
			{
				Session::destroy();
			}
		  ?>
		  <li>
            <a href="?action=LogOut">Đăng xuất</a>
          </li>
        </ul>
      </div>

		<div class="RightWrapper">
        <div class="Header">
        </div>
        <div class="Content">
          <div>