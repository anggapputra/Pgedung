<div style='margin-top:0px' id="header">
        <div id="menu" class="ddsmoothmenu">
            <ul><h1>
              	<li><a href="index.php">Home</a></li>
				<?php if ($_SESSION[level]=='1'){ ?>
					<li><a href="index.php?page=reservasi">Reservasi</a></li>
				<?php } ?>
              	</li>
				<li><a href="index.php?page=infopendaftaran">Info Pendaftaran</a></li>
				<li><a href="#">Katalog</a>
                    <ul>
                        <li><a href="index.php?page=fasilitas&kode=1">Guest House</a></li>
                        <li><a href="index.php?page=fasilitas&kode=2">Wisma</a></li>
                        <li><a href="index.php?page=fasilitas&kode=3">Ruang</a></li>
						<li><a href="index.php?page=tambahan">Tambahan</a></li>
                        <li><a href="index.php?page=makanan&id=1">Menu Makanan</a></li>
                        <li><a href="index.php?page=makanan&id=2">Menu Snack</a></li>
                  	</ul>
              	</li>
              	<li><a href="index.php?page=inforeservasi">Info Reservasi</a></li>
              	<li><a href="index.php?page=kontak">Kontak</a></li>
				<?php if ($_SESSION[level]==''){ ?>
					<li><a href="index.php?page=pendaftaran">Pendaftaran</a></li>
					<li><a href="index.php?page=login">Login</a></li>
				<?php }else{ 
						$pecah = explode(' ', $_SESSION[nama_lengkap]);
					echo "<li><a href='#'>Welcome! <b style='color:red'>".$pecah[0]."</b></a></li>"; ?>
						  <li><a href="logout.php">Logout</a><li>
				<?php } ?>
            </ul></h1>
            <br style="clear: left" />
        </div> <!-- end of menu -->
    </div> <!-- end of header -->
