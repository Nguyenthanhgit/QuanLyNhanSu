<?php
	include '../Library/session.php';
	Session::checkSession();
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
	<link href="../Assets/CSS/Index.css" rel="stylesheet">
  </head>
  <body>
    <div class="Wrapper">
      <div class="Sidebar">
        <ul class="Components">
          <li>
            <p><?php echo Session::get('userAccount') ?></p>
          </li>
          <li>
            <a href="../View/ViTriIndex.php">Vị trí</a>
          </li>
          <li>
            <a href="#">sdf123123</a>
          </li>
          <li class="CollapseMenu">
            <a href="#homeSubmenu" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false">Home<span class="fa fa-chevron-down"></span></a>
            <ul class="collapse" id="homeSubmenu">
              <li>
                <a href="#">qweqwe</a>
              </li>
              <li>
                <a href="#">sdf123123</a>
              </li>
              <li>
                <a href="#">sdf123123</a>
              </li>
            </ul>
          </li>
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