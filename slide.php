<head>
    <link rel="stylesheet" href="slide/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="slide/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="slide/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="slide/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="slide/nivo-slider.css" type="text/css" media="screen" />
</head>
<body>
    <div style='width:530px; float:right' id="wrapper">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
				<?php 
					$query = mysql_query("SELECT * FROM rb_slide");
					while ($s = mysql_fetch_array($query)){
                        echo "<img src='images/$s[foto]' data-thumb='images/$s[foto]' alt='$s[keterangan]' title='$s[keterangan]'/>";
                    }
				
				?>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="slide/demo/scripts/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="slide/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</body>
