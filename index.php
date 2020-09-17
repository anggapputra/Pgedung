<?php 
session_start();
error_reporting(0); 
include "koneksi.php";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Penyewaan Fasilitas Gedung LPMP Prov.Kal-SEL</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript">
	var flashvars = {};
	flashvars.xml_file = "photo_list.xml";
	var params = {};
	params.wmode = "transparent";
	var attributes = {};
	attributes.id = "slider";
	swfobject.embedSWF("flash_slider.swf", "flash_grid_slider", "480", "360", "9.0.0", false, flashvars, params, attributes);
</script>
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
</script>
<style>th { color:#fff }</style> 
</head>
<body id="home">
<div id="wrapper">  
				<?php include "menu.php"; ?>  
<div id="main">
    	<div id="content">
			<div class="col_fw">
				<?php include "middle.php"; ?>
			</div>
		</div>
				<?php include "footer.php"; ?>
</div>
</div> <!-- end of wrapper -->
</body>
</html>
