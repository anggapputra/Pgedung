<?php 
function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

if ($_GET[page]==''){ 
         include "slide.php"; ?>

            <h3 style='line-height:30px;'>Selamat Datang <?php echo "<b style='color:red'>$_SESSION[nama_lengkap]</b>"; ?> di System Informasi Penyewaan Fasilitas Gedung Lembaga Penjaminan Mutu Pendidikan (LPMP) Provinsi Kalimantan Selatan</h3>
      		<p>Silahkan Melakukan Pendaftaran Terlebih dahulu sebelum melakukan Pemesanan atau Penyewaan Fasilitas Gedung Lembaga Penjaminan Mutu Pendidikan (LPMP) Provinsi Kalimantan Selatan</p>
      <div class="cleaner"></div>

<?php 
}elseif ($_GET[page]=='pendaftaran'){ 
	if (isset($_POST[daftar])){
		$tgldaftar = date("Y-m-d H:i:s");
		$pass = md5($_POST[pass]);
		mysql_query("INSERT INTO rb_members (kd_jenis_penerimaan, username, password, nama_lengkap, nama_instansi, no_telpon, alamat_email, alamat_lengkap, tanggal_daftar) 
					 VALUES ('$_POST[a]','$_POST[user]','$pass','$_POST[b]','$_POST[bb]','$_POST[c]','$_POST[d]','$_POST[e]','$tgldaftar')");
echo "<script>window.alert('Sukses Mendaftar.');
								window.location='index.php?page=login'</script>";
	}
	echo "<h2>Silahkan Mendaftar Pada Form Dibawah ini</h2>
               <form action='' method='POST'>
					<table width=100%> 
						<tr><td style='width:130px'>Jenis </td> <td><select name='a'><option value='0' selected>- Pilih -</option>";
							$jenis = mysql_query("SELECT * FROM rb_jenis_penerimaan");
							while ($j = mysql_fetch_array($jenis)){
								echo "<option value='$j[kd_jenis_penerimaan]'>$j[jenis_penerimaan]</option>";
							} 
						echo "</select></td></tr>
						<tr><td>Username</td> <td><input type='text' name='user' style='width:30%; background:#e3e3e3'></td></tr>
						<tr><td>Password</td> <td><input type='text' name='pass' style='width:30%; background:#e3e3e3'></td></tr>
						<tr><td>Nama Lengkap</td> <td><input type='text' name='b' style='width:40%'></td></tr>
						<tr><td>Nama Instansi</td> <td><input type='text' name='bb' style='width:80%'></td></tr>
						<tr><td>No Telpon</td> <td><input type='text' name='c'></td></tr>
						<tr><td>Alamat Email</td> <td><input type='text' name='d' style='width:40%'></td></tr>
						<tr><td valign=top>Alamat Lengkap</td> <td><textarea name='e' style='width:100%; height:120px'></textarea></td></tr>
						<tr><td></td> <td><input type='submit' name='daftar' value='Daftar Sekarang'></td></tr>
					</table>
			   </form>";

}elseif ($_GET[page]=='login'){ 
				if (isset($_POST[login])){
							$userlogin = $_POST[user];
							$passlogin = md5($_POST[pass]);
								$login = mysql_query("SELECT * FROM rb_members 
								where username='$userlogin' AND password='$passlogin'");
					$cek = mysql_num_rows($login);
					$r = mysql_fetch_assoc($login);
						if ($cek >= 1){
							$_SESSION[id] 			= $r[id_members];
							$_SESSION[nama_lengkap] = $r[nama_lengkap];
							$_SESSION[alamat_email] = $r[alamat_email];
							$_SESSION[level] 		= 1;
							
							echo "<script>window.alert('Anda Sukses Login.');
								window.location='index.php'</script>";
						}else{
							echo "<script>window.alert('Maaf, anda Gagal Login.');
								window.location='index.php'</script>";
						}
					}
				
				echo "<h2>Silahkan Login Melalui Form Berikut</h2>
				<center><br><table width=300px>
				<form action='' method='POST'>	
					<tr><td><input type='text' style='width:100%; padding:4px;' name='user' placeholder='Username....'></td></tr>
					<tr><td><input style='width:100%; padding:4px;' type='password' name='pass' placeholder='Password....'></td></tr>
					<tr><td><input style='float:right; margin-top:5px; padding:4px 10px 4px 10px' type='submit' name='login' value='Masuk'></td></tr>
				</form>
				</table></center>";


}elseif ($_GET[page]=='infopendaftaran'){ 
$i2 = mysql_fetch_array(mysql_query("SELECT * FROM rb_halaman where kd_halaman='1'"));
	echo "<h2>$i2[judul_halaman]</h2>
          <p>".nl2br($i2[isi_halaman])."</p>";

}elseif ($_GET[page]=='inforeservasi'){ 
$i2 = mysql_fetch_array(mysql_query("SELECT * FROM rb_halaman where kd_halaman='2'"));
	echo "<h2>$i2[judul_halaman]</h2>
          <p>".nl2br($i2[isi_halaman])."</p>";

}elseif ($_GET[page]=='kontak'){ 
	if (isset($_POST[kirim])){
		$waktu = date("Y-m-d H:i:s");
		mysql_query("INSERT INTO rb_kontak (nama_lengkap, alamat_email, isi_pesan, waktu) 
					 VALUES ('$_POST[a]','$_POST[b]','$_POST[c]','$waktu')");
					echo "<script>window.alert('Sukses Kirimkan Pesan.');
								window.location='index.php?page=kontak&status=1'</script>";
	}
	echo "<h2>Kirimkan Pesan Anda Melalui Form dibawah ini</h2>";
				if ($_GET[status]=='1'){
					echo "<center style='color:red; margin:3% 0 3% 0;'>Pesan anda Telah Terkirim, dan akan segera kami respon..</center>";
				}
               echo "<form action='' method='POST'>
					<table width=100%> 
						<tr><td width=130px>Nama Lengkap</td> <td><input type='text' name='a' value='$_SESSION[nama_lengkap]' style='width:40%'></td></tr>
						<tr><td>Alamat Email</td> <td><input type='text' name='b' value='$_SESSION[alamat_email]' style='width:40%'></td></tr>
						<tr><td valign=top>Isi Pesan</td> <td><textarea name='c' style='width:100%; height:120px'></textarea></td></tr>
						<tr><td></td> <td><input type='submit' name='kirim' value='Kirimkan Pesan'></td></tr>
					</table>
			   </form>";

}elseif ($_GET[page]=='fasilitas'){ 
	$kat = mysql_fetch_array(mysql_query("SELECT * FROM rb_kategori where kode_kategori='$_GET[kode]'"));
	echo "<h2>Halaman Semua Data $kat[nama_kategori]</h2>
		  <table width=100%>";
	$fasilitas = mysql_query("SELECT * FROM rb_fasilitas where kode_kategori='$_GET[kode]' ORDER BY kode_fasilitas DESC");
	$no = 1;
	while ($g = mysql_fetch_array($fasilitas)){
	if ($no % 2 == 1){
		$warna = '#cecece';
	}else{
		$warna = '#ffffff';
	}	
		echo "<tr bgcolor=$warna><td rowspan='7' width=40% align=center><img style='width:97%; height:150px; border-radius:5px; padding:5px; 0px 5px 0px'src='foto/$g[namafoto]'></td></tr>
				<tr bgcolor=$warna><td width=210px><b>Nama $kat[nama_kategori]</b></td>		<td>$g[nama_fasilitas]</td></tr>
				<tr bgcolor=$warna><td><b>Harga Non Kemendikbud</b></td>	<td>Rp ".format_rupiah($g[hrg_nonkemendikbud])."</td></tr>
				<tr bgcolor=$warna><td><b>Harga Kemendikbud</b></td>		<td>Rp ".format_rupiah($g[hrg_kemendikbud])."</td></tr>
				<tr bgcolor=$warna><td><b>Harga Yayasan Sosial</b></td>	<td>Rp ".format_rupiah($g[hrg_yayasansosial])."</td></tr>
				<tr bgcolor=$warna><td><b>Jumlah Kamar</b></td>			<td>$g[jml_kmr]</td></tr>
				<tr bgcolor=$warna><td valign=top><b>Kapasitas</b></td>				<td>$g[kapasitas] Orang <br><br></td></tr>";
		$no++;
	}
		echo "</table>";

}elseif ($_GET[page]=='tambahan'){ 

	echo "<h2>Halaman Semua Data Fasilitas Tambahan</h2>
		  <table width=100% cellpadding=7>
			 <tr bgcolor=#000 font-color=#fff>
				<th>No</th>
				<th>Nama Tambahan</th>
				<th>Jumlah Tambahan</th>
			 </tr>";
	$tambah = mysql_query("SELECT * FROM rb_tambahan ORDER by kode_tambahan DESC");
	$no = 1;
	while ($g = mysql_fetch_array($tambah)){
	if ($no % 2 == 1){
		$warna = '#cecece';
	}else{
		$warna = '#ffffff';
	}	
		echo "<tr bgcolor=$warna>
				<td>$no</td>
				<td>$g[nama_tambahan]</td>
				<td align=center>$g[jml_tambahan]</td>
			  </tr>";
		$no++;
	}
		echo "</table>";

}elseif ($_GET[page]=='makanan'){ 
	if ($_GET[id]=='1'){
		$jenis = 'Makanan';
	}else{
		$jenis = 'Snack';
	}
	echo "<h2>Halaman Semua Data Menu $jenis</h2>
		  <table width=100% cellpadding=7>
			 <tr bgcolor=#000 font-color=#fff>
				<th>No</th>
				<th>Harga</th>
				<th>Nama $jenis</th>
			 </tr>";
	$makan = mysql_query("SELECT * FROM rb_makanan where kode_jenis_makanan='$_GET[id]' ORDER by kode_makanan DESC");
	$no = 1;
	while ($g = mysql_fetch_array($makan)){
	if ($no % 2 == 1){
		$warna = '#cecece';
	}else{
		$warna = '#ffffff';
	}	
		echo "<tr bgcolor=$warna>
				<td>$no</td>
				<td>Rp ".format_rupiah($g[harga_makanan])."</td>
				<td>$g[menu_makanan]</td>
			  </tr>";
		$no++;
	}
		echo "</table>";

}elseif ($_GET[page]=='reservasi'){ 
	echo "<h2>Halaman Reservasi <a href='index.php?page=datareservasi'><input style='float:right' type='button' value='History Data Reservasi Anda'></a></h2>";
	if (isset($_POST[daftar])){
		$waktu_pesan = date("Y-m-d H:i:s");
			mysql_query("UPDATE rb_trx_reservasi SET tanggal_pesan	=  '$_POST[tgl1]',
													 sampai_tanggal =  '$_POST[tgl2]',
													 keterangan 	=  '$_POST[b]' where kd_trx_reservasi='$_GET[id]'");

			echo "<script>window.alert('Sukses Melakukan Pemesanan.');
						  window.location='index.php?page=detailreservasi&id=$_GET[id]'</script>";
	}


	$m = mysql_fetch_array(mysql_query("SELECT * FROM rb_members a JOIN rb_jenis_penerimaan b ON a.kd_jenis_penerimaan=b.kd_jenis_penerimaan where a.id_members='$_SESSION[id]'"));
	
					if ($_GET[status]=='1'){
						echo "<p align=center style='color:red'>Sukses Melakukan Pemesanan, dan Akan Segera kami Proses,..!!! ---> <a href='index.php?page=datareservasi'>Lihat Pesanan</a></p>";
					}
			echo "<form action='' method='POST'>
					<table width=100%> 
						<tr><td>Jenis Penerimaan</td> <td><input type='text' style='width:60%; color:red' value='$m[jenis_penerimaan]' disabled></td></tr>
						<tr><td>Nama Lengkap</td> <td><input type='text' style='width:40%;' value='$m[nama_lengkap]'></td></tr>
						<tr><td>No Telpon</td> <td><input type='text' style='width:20%;' value='$m[no_telpon]'</td></tr>
						<tr><td>Alamat Email<br><br></td> <td><input type='text' style='width:50%;' value='$m[alamat_email]'><br><br></td></tr>
						
						<tr><td style='width:140px'>Fasilitas </td> <td>"; ?> <select name='a' ONCHANGE="location = this.options[this.selectedIndex].value;"><?php echo "<option value='0' selected>- Pilih Fasilitas yang Anda Inginkan -</option>";
							$fasilitas = mysql_query("SELECT * FROM rb_fasilitas a JOIN rb_kategori b ON a.kode_kategori=b.kode_kategori");
							while ($j = mysql_fetch_array($fasilitas)){
								echo "<option value='index.php?page=reservasi&fasilitas=$j[kode_fasilitas]&aksi=simpanfasilitas&id=$_GET[id]'>$j[nama_kategori] - $j[nama_fasilitas] ($j[jml_kmr] kamar, dan Kapasitas $j[kapasitas] Orang)</option>";
							}
						echo "</select></td></tr>
					</table>";

					if ($_GET[aksi]=='simpanfasilitas'){
						if ($_GET[id]==''){
							$waktu_pesann = date("Y-m-d H:i:s");
							mysql_query("INSERT INTO rb_trx_reservasi (id_members, tanggal_pesan, sampai_tanggal, keterangan, waktu_pesan)
											VALUES ('$_SESSION[id]','0000-00-00 00:00:00','0000-00-00 00:00:00','','$waktu_pesann')");
							$idpesan = mysql_insert_id();
							mysql_query("INSERT INTO rb_trx_reservasi_detail (kd_trx_reservasi, kode_fasilitas, jml_orang)
											VALUES ('$idpesan','$_GET[fasilitas]','0')");
							echo "<script>window.alert('Sukses Menyimpan Fasilitas.');
								window.location='index.php?page=reservasi&id=$idpesan'</script>";
						}else{
							mysql_query("INSERT INTO rb_trx_reservasi_detail (kd_trx_reservasi, kode_fasilitas, jml_orang)
											VALUES ('$_GET[id]','$_GET[fasilitas]','0')");
							echo "<script>window.alert('Sukses Menyimpan Fasilitas.');
								window.location='index.php?page=reservasi&id=$_GET[id]'</script>";
						}
					}
			if ($_GET[id]!=''){
				echo "<form action='' method='POST'><table width=85% style='float:right; border:1px solid #8a8a8a' cellpadding=4>
						 <tr bgcolor=#000 font-color=#fff>
							<th width=20px>No</th>
							<th>Fasilitas</th>
							<th>Jumlah</th>
							<th>Harga Perhari</th>
							<th>Action</th>
						 </tr>";
				$order = mysql_query("SELECT * FROM rb_trx_reservasi a 
								JOIN rb_trx_reservasi_detail n ON a.kd_trx_reservasi=n.kd_trx_reservasi
									JOIN rb_fasilitas b ON n.kode_fasilitas=b.kode_fasilitas 
										JOIN rb_kategori c ON b.kode_kategori=c.kode_kategori 
											JOIN rb_members d ON a.id_members=d.id_members
												JOIN rb_jenis_penerimaan e ON d.kd_jenis_penerimaan=e.kd_jenis_penerimaan 
													where a.kd_trx_reservasi='$_GET[id]'");
				$no = 1;
				while ($g = mysql_fetch_array($order)){
				if ($no % 2 == 1){
					$warna = '#cecece';
				}else{
					$warna = '#ffffff';
				}	

				if ($g[kd_jenis_penerimaan]=='1'){
					$harga = $g[hrg_nonkemendikbud];
				}elseif($g[kd_jenis_penerimaan]=='2'){
					$harga = $g[hrg_kemendikbud];
				}else{
					$harga = $g[hrg_yayasansosial];
				}

					echo "<tr bgcolor=$warna>
							<td>$no</td>
							<td>$g[nama_kategori] $g[nama_fasilitas]</td><input type='hidden' value='$g[id]' name='idd[$no]'>
							<td width=110px><input type='text' style='width:50px' value='$g[jml_orang]' name='jmla[$no]'> Orang</td>
							<td width=150px>Rp ".number_format($harga,0,',','.')." </td>
							<td width=120px>
								<a href='index.php?page=reservasi&id=$_GET[id]&hapusorder=1&hapus=$g[id]'><input type='button' value='Batal'></a>
								<input type='submit' name='update' value='Update'></td>
						  </tr>";
					$no++;
				}
						echo "</form></table><br>";
			}

			if (isset($_POST[update])){
				  $id       = $_POST[idd];
				  $jml_data = count($id);
				  $jumlah  = $_POST[jmla];
				  for ($i=1; $i <= $jml_data; $i++){
				    mysql_query("UPDATE rb_trx_reservasi_detail SET jml_orang = '".$jumlah[$i]."'
				                                      WHERE id = '".$id[$i]."'");
				  }
				echo "<script>window.alert('Sukses Update Jumlah Orang.');
								window.location='index.php?page=reservasi&id=$_GET[id]'</script>"; 
			}

			if ($_GET[hapusorder]=='1'){
				mysql_query("DELETE FROM rb_trx_reservasi_detail where id='$_GET[hapus]'");
				echo "<script>window.alert('Sukses Batalkan Fasilitas.');
								window.location='index.php?page=reservasi&id=$_GET[id]'</script>";
			}
					echo "<table width=100%> 	
						<tr><td style='width:140px'>Dari Tanggal</td> <td><input type='datetime-local' name='tgl1' style='width:30%;'></td></tr>
						<tr><td>Sampai Tanggal</td> <td><input type='datetime-local' name='tgl2' style='width:30%;'></td></tr>
						<tr><td valign=top>Keterangan</td> <td><textarea name='b' style='width:100%; height:120px'></textarea></td></tr>
						<tr><td></td> <td><input type='submit' name='daftar' value='Pesan Sekarang'></td></tr>
					</table>
			   </form>";

}elseif ($_GET[page]=='datareservasi'){ 
	echo "<h2>Halaman Semua Data Reservasi</h2>
		  <table width=100% cellpadding=7>
			 <tr bgcolor=#000 font-color=#fff>
				<th>No</th>
				<th>Tanggal Booking</th>
				<th>Sampai Tanggal</th>
				<th>Keterangan</th>
				<th>Action</th>
			 </tr>";
	$order = mysql_query("SELECT * FROM rb_trx_reservasi a where a.id_members='$_SESSION[id]' ORDER by a.kd_trx_reservasi DESC");
	$no = 1;
	while ($g = mysql_fetch_array($order)){
	if ($no % 2 == 1){
		$warna = '#cecece';
	}else{
		$warna = '#ffffff';
	}	
		echo "<tr bgcolor=$warna>
				<td>$no</td>
				<td>$g[tanggal_pesan]</td>
				<td>$g[sampai_tanggal]</td>
				<td>$g[keterangan]</td>
				<td width='170px'><a href='index.php?page=detailreservasi&id=$g[kd_trx_reservasi]'><input type='button' value='Lihat Detail'></a>
					<a target='_BLANK' href='print-data-reservasi.php?id=$g[kd_trx_reservasi]'><input type='button' value='Print Nota'></a></td>
			  </tr>";
		$no++;
	}
		echo "</table>";

}elseif ($_GET[page]=='detailreservasi'){ 
	if (isset($_POST[daftar])){
		$waktu_pesan = date("Y-m-d H:i:s");
		mysql_query("INSERT INTO rb_trx_reservasi (kode_fasilitas, id_members, dari, sampai, keterangan, waktu_pesan)
										   VALUES ('$_POST[a]','$_SESSION[id]','$_POST[tgl1]','$_POST[tgl2]','$_POST[b]','$waktu_pesan')");
		echo "<script>window.alert('Sukses Melakukan Pemesanan.');
					  window.location='index.php?page=reservasi&status=1'</script>";
	}

	$m = mysql_fetch_array(mysql_query("SELECT * FROM rb_trx_reservasi a JOIN rb_members d ON a.id_members=d.id_members 
				                            		JOIN rb_jenis_penerimaan e ON d.kd_jenis_penerimaan=e.kd_jenis_penerimaan
				                            			where a.kd_trx_reservasi='$_GET[id]'"));

	echo "<h2>Detail Data Reservasi </h2>";
			echo "<form action='' method='POST'>
					<table width=100%> 
						<tr><td width=140px>Jenis Penerimaan</td> <td><input type='text' style='width:60%; color:red' value='$m[jenis_penerimaan]' disabled></td></tr>
						<tr><td>Nama Lengkap</td> <td><input type='text' style='width:40%;' value='$m[nama_lengkap]'></td></tr>
						<tr><td>No Telpon</td> <td><input type='text' style='width:20%;' value='$m[no_telpon]'</td></tr>
						<tr><td>Alamat Email<br><br></td> <td><input type='text' style='width:50%;' value='$m[alamat_email]'><br><br></td></tr>
					</table>
			   </form>

			   <table width=100% cellpadding=7>
						 <tr bgcolor=#000 font-color=#fff>
							<th width=20px>No</th>
							<th>Fasilitas</th>
							<th>Tanggal Booking</th>
							<th>Sampai Tanggal</th>
							<th>Hari</th>
							<th>Harga Perhari</th>
						 </tr>";
				$order = mysql_query("SELECT * FROM rb_trx_reservasi a 
								JOIN rb_trx_reservasi_detail n ON a.kd_trx_reservasi=n.kd_trx_reservasi
									JOIN rb_fasilitas b ON n.kode_fasilitas=b.kode_fasilitas 
										JOIN rb_kategori c ON b.kode_kategori=c.kode_kategori 
											JOIN rb_members d ON a.id_members=d.id_members
												JOIN rb_jenis_penerimaan e ON d.kd_jenis_penerimaan=e.kd_jenis_penerimaan 
													where a.kd_trx_reservasi='$_GET[id]'");
				$no = 1;
				while ($g = mysql_fetch_array($order)){
				if ($no % 2 == 1){
					$warna = '#cecece';
				}else{
					$warna = '#ffffff';
				}	

				$date1=$g[tanggal_pesan];
				$date2=$g[sampai_tanggal];
				$datetime1 = new DateTime($date1);
				$datetime2 = new DateTime($date2);
				$difference = $datetime1->diff($datetime2);
				$hari = $difference->days;

				if ($g[kd_jenis_penerimaan]=='1'){
					$harga = $g[hrg_nonkemendikbud];
					$total = $harga * $hari;
				}elseif($g[kd_jenis_penerimaan]=='2'){
					$harga = $g[hrg_kemendikbud];
					$total = $harga * $hari;
				}else{
					$harga = $g[hrg_yayasansosial];
					$total = $harga * $hari;
				}

					echo "<tr bgcolor=$warna>
							<td>$no</td>
							<td>$g[nama_kategori] $g[nama_fasilitas]</td>
							<td>$g[tanggal_pesan]</td>
							<td>$g[sampai_tanggal]</td>
							<td>$hari Hari</td>
							<td>Rp $total $totorder</td>
						  </tr>";
					$no++;
				}
				$mtt = mysql_fetch_array(mysql_query("SELECT sum(z.tot_nonkemendikbud) as a1, sum(z.tot_kemendikbud) as a2, sum(z.tot_yayasansosial) as a3, z.kd_jenis_penerimaan as kode 
																	FROM (SELECT a.id_members, a.tanggal_pesan, a.sampai_tanggal, (TO_DAYS(a.sampai_tanggal) - TO_DAYS(a.tanggal_pesan)) AS hari, a.kd_trx_reservasi, b.nama_fasilitas,
																	((TO_DAYS(a.sampai_tanggal) - TO_DAYS(a.tanggal_pesan))* hrg_nonkemendikbud) as tot_nonkemendikbud, 
																	((TO_DAYS(a.sampai_tanggal) - TO_DAYS(a.tanggal_pesan))* hrg_kemendikbud) as tot_kemendikbud, 
																	((TO_DAYS(a.sampai_tanggal) - TO_DAYS(a.tanggal_pesan))* hrg_yayasansosial) as tot_yayasansosial, 
																	b.hrg_nonkemendikbud, b.hrg_kemendikbud, b.hrg_yayasansosial, e.kd_jenis_penerimaan 
																		FROM rb_trx_reservasi a 
																			JOIN rb_trx_reservasi_detail n ON a.kd_trx_reservasi=n.kd_trx_reservasi
																				JOIN rb_fasilitas b ON n.kode_fasilitas=b.kode_fasilitas 
																					JOIN rb_kategori c ON b.kode_kategori=c.kode_kategori 
																						JOIN rb_members d ON a.id_members=d.id_members
																							JOIN rb_jenis_penerimaan e ON d.kd_jenis_penerimaan=e.kd_jenis_penerimaan 
																								where a.kd_trx_reservasi='$_GET[id]') z"));

							
							if ($mtt[kode]=='1'){
								$totalft = $mtt[a1];
							}elseif($mtt[kode]=='2'){
								$totalft = $mtt[a2];
							}else{
								$totalft = $mtt[a3];
							}

					echo "<tr bgcolor=lightblue>
							<td colspan=5></td>
							<td>Rp ".number_format($totalft,0,',','.')."</td>
						  </tr>
						</table><br>";


						if ($_GET[aksi]==''){
							echo "<a style='margin-right:7px' href='index.php?page=detailreservasi&id=$_GET[id]&aksi=tambah'><input type='button' value='Snack atau Makanan'></a>";
							echo "<a href='index.php?page=detailreservasi&id=$_GET[id]&aksi=tambahan'><input type='button' value='Tambahan'></a>";
						}elseif ($_GET[aksi]=='tambahan'){
							echo "<table width=100%>
									<form action='' method='POST'>
										<tr><td><select style='width:100%' name='a'>
													<option value='0'>- Pilih Nama Jenis Tambahan -</option>";
													$tambahan = mysql_query("SELECT * FROM rb_tambahan");
													while ($m = mysql_fetch_array($tambahan)){
														echo "<option value='$m[kode_tambahan]'>$m[nama_tambahan]</option>";
													}
												echo "</select></td>  
											
											<td style='width:90px'><input name='b' style='width:100%' placeholder='Jumlah' type='text'></td>
											<td  style='width:130px'><input style='width:100%' type='submit' name='tambahanaksi' value='Tambahkan'></td>
											<td  style='width:80px'><a href='index.php?page=detailreservasi&id=$_GET[id]'>
																	<input style='width:100%' type='button' value='Batal'></a></td></tr>
									</form>
								  </table>";

								  if (isset($_POST[tambahanaksi])){
								  	 $waktus = date("Y-m-d H:i:s");
								  	 mysql_query("INSERT INTO rb_trx_tambahan (kd_trx_reservasi, kode_tambahan, jumlah, waktu)
								  	 							 	  VALUES ('$_GET[id]','$_POST[a]','$_POST[b]','$waktus')");
								  	 echo "<script>window.alert('Sukses Tambah Data Tambahan.');
					  							   window.location='index.php?page=detailreservasi&id=$_GET[id]'</script>";
								  }
						}elseif ($_GET[aksi]=='tambah'){
							echo "<table width=100%>
									<form action='' method='POST'>
										<tr><td><select style='width:100%' name='a'>
													<option value='0'>- Pilih Nama Menu Makanan -</option>";
													$makanan = mysql_query("SELECT * FROM rb_makanan");
													while ($m = mysql_fetch_array($makanan)){
														if ($m[kode_jenis_makanan]==1){
															$makan = 'Makanan';
														}else{
															$makan = 'Snack';
														}
														echo "<option value='$m[kode_makanan]'>$makan - Rp $m[harga_makanan] - $m[menu_makanan]</option>";
													}
												echo "</select></td> 
												<td><select style='width:120px' name='ket'>
													<option value='0' selected>- Keterangan -</option>
													<option value='Pagi'>Pagi</option>
													<option value='Siang'>Siang</option>
													<option value='Malam'>Malam</option>
												</select> </td>  
											<td style='width:90px'><input name='b' style='width:100%' placeholder='Jumlah' type='text'></td>
											<td  style='width:130px'><input style='width:100%' type='submit' name='makan' value='Tambahkan'></td>
											<td  style='width:80px'><a href='index.php?page=detailreservasi&id=$_GET[id]'>
																	<input style='width:100%' type='button' value='Batal'></a></td></tr>
									</form>
								  </table>";

								  if (isset($_POST[makan])){
								  	 $waktus = date("Y-m-d H:i:s");
								  	 mysql_query("INSERT INTO rb_trx_makanan (kd_trx_reservasi, kode_makanan, jumlah, ket, waktu_pesan)
								  	 							 	  VALUES ('$_GET[id]','$_POST[a]','$_POST[b]','$_POST[ket]','$waktus')");
								  	 echo "<script>window.alert('Sukses Tambahkan Snack atau Makanan.');
					  							   window.location='index.php?page=detailreservasi&id=$_GET[id]'</script>";
								  }
						}
						
					echo "<table width=100% cellpadding=7>
							 <tr bgcolor=#000 font-color=#fff>
								<th width=20px>No</th>
								<th>Nama Makanan</th>
								<th>Keterangan</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th>Sub Total</th>
								<th>Action</th>
							 </tr>";
						$order = mysql_query("SELECT * FROM rb_trx_makanan a JOIN rb_makanan b ON a.kode_makanan=b.kode_makanan where a.kd_trx_reservasi='$_GET[id]'");
						$noo = 1;
						while ($g = mysql_fetch_array($order)){
						if ($noo % 2 == 1){
							$warna = '#cecece';
						}else{
							$warna = '#ffffff';
						}	

						$totalm = $g[jumlah] * $g[harga_makanan];
							echo "<tr bgcolor=$warna>
									<td>$noo</td>
									<td width='450px'>$g[menu_makanan] </td>
									<td align=center style='color:red'>$g[ket]</td>
									<td>$g[jumlah] Porsi</td>
									<td>Rp $g[harga_makanan]</td>
									<td>Rp $totalm</td>
									<td width='50px'><a href='index.php?page=detailreservasi&id=$_GET[id]&kodee=$g[kd_trx_makanan]'><input type='button' value='Batal'></a></td>
								  </tr>";
							$noo++;
						}

						if (isset($_GET[kodee])){
							mysql_query("DELETE FROM rb_trx_makanan where kd_trx_makanan='$_GET[kodee]'");
							echo "<script>window.alert('Sukses Batalkan Snack atau Makanan.');
						  							   window.location='index.php?page=detailreservasi&id=$_GET[id]'</script>";
						}
							$to = mysql_fetch_array(mysql_query("SELECT sum(d.total_harga) as total FROM (SELECT a.jumlah, b.harga_makanan, a.jumlah*b.harga_makanan as total_harga FROM rb_trx_makanan a JOIN rb_makanan b ON a.kode_makanan=b.kode_makanan where a.kd_trx_reservasi='$_GET[id]') d"));
							echo "<tr bgcolor=lightblue>
									<td colspan='5'></td>
									<td>Rp ".number_format($to[total],0,',','.')."</td>
									<td></td>
								  </tr>";
						echo "</table>";

						echo "<table width=100% cellpadding=7>
							 <tr bgcolor=#000 font-color=#fff>
								<th width=20px>No</th>
								<th>Nama Tambahan</th>
								<th>Jumlah</th>
								<th>Action</th>
							 </tr>";
						$order = mysql_query("SELECT * FROM rb_trx_tambahan a JOIN rb_tambahan b ON a.kode_tambahan=b.kode_tambahan where a.kd_trx_reservasi='$_GET[id]'");
						$noo = 1;
						while ($g = mysql_fetch_array($order)){
						if ($noo % 2 == 1){
							$warna = '#cecece';
						}else{
							$warna = '#ffffff';
						}	

							echo "<tr bgcolor=$warna>
									<td>$noo</td>
									<td width='550px'>$g[nama_tambahan] </td>
									<td>$g[jumlah] Unit</td>
									<td width='50px'><a href='index.php?page=detailreservasi&id=$_GET[id]&kodee=$g[kd_trx_makanan]'><input type='button' value='Batal'></a></td>
								  </tr>";
							$noo++;
						}
						echo "</table>";
							$mt = mysql_fetch_array(mysql_query("SELECT sum(z.tot_nonkemendikbud) as a1, sum(z.tot_kemendikbud) as a2, sum(z.tot_yayasansosial) as a3, z.kd_jenis_penerimaan as kode 
																	FROM (SELECT a.id_members, a.tanggal_pesan, a.sampai_tanggal, (TO_DAYS(a.sampai_tanggal) - TO_DAYS(a.tanggal_pesan)) AS hari, a.kd_trx_reservasi, b.nama_fasilitas,
																	((TO_DAYS(a.sampai_tanggal) - TO_DAYS(a.tanggal_pesan))* hrg_nonkemendikbud) as tot_nonkemendikbud, 
																	((TO_DAYS(a.sampai_tanggal) - TO_DAYS(a.tanggal_pesan))* hrg_kemendikbud) as tot_kemendikbud, 
																	((TO_DAYS(a.sampai_tanggal) - TO_DAYS(a.tanggal_pesan))* hrg_yayasansosial) as tot_yayasansosial, 
																	b.hrg_nonkemendikbud, b.hrg_kemendikbud, b.hrg_yayasansosial, e.kd_jenis_penerimaan 
																		FROM rb_trx_reservasi a 
																			JOIN rb_trx_reservasi_detail n ON a.kd_trx_reservasi=n.kd_trx_reservasi
																				JOIN rb_fasilitas b ON n.kode_fasilitas=b.kode_fasilitas 
																					JOIN rb_kategori c ON b.kode_kategori=c.kode_kategori 
																						JOIN rb_members d ON a.id_members=d.id_members
																							JOIN rb_jenis_penerimaan e ON d.kd_jenis_penerimaan=e.kd_jenis_penerimaan 
																								where a.kd_trx_reservasi='$_GET[id]') z"));

							
							if ($mt[kode]=='1'){
								$totalf = $mt[a1];
							}elseif($mt[kode]=='2'){
								$totalf = $mt[a2];
							}else{
								$totalf = $mt[a3];
							}
							$totalsemua = $totalf + $to[total];
							$totalsemuarp = number_format($totalsemua,0,',','.');
						echo "<br><h3>Total Bayar : Rp ".number_format($totalf,0,',','.')." + Rp ".number_format($to[total],0,',','.')." = <b style='color:Red'>Rp $totalsemuarp</b></h3>";


}elseif ($_GET[page]=='admindatareservasi'){ 
	echo "<h2>Halaman Semua Data Reservasi</h2>
		  <table width=100% cellpadding=7>
			 <tr bgcolor=#000 font-color=#fff>
				<th>No</th>
				<th>Tanggal Booking</th>
				<th>Sampai Tanggal</th>
				<th>Keterangan</th>
				<th>Action</th>
			 </tr>";
	$order = mysql_query("SELECT * FROM rb_trx_reservasi a ORDER by a.kd_trx_reservasi DESC");
	$no = 1;
	while ($g = mysql_fetch_array($order)){
	if ($no % 2 == 1){
		$warna = '#cecece';
	}else{
		$warna = '#ffffff';
	}	
		echo "<tr bgcolor=$warna>
				<td>$no</td>
				<td>$g[tanggal_pesan]</td>
				<td>$g[sampai_tanggal]</td>
				<td>$g[keterangan]</td>
				<td width='170px'><a href='index.php?page=detailreservasi&id=$g[kd_trx_reservasi]'><input type='button' value='Detail'></a>
					<a target='_BLANK' href='print-data-reservasi.php?id=$g[kd_trx_reservasi]'><input type='button' value='Print'></a>
					<a  target='_BLANK' href='index.php?page=admindatareservasi&aksi=hapus&id=$g[kd_trx_reservasi]'><input style='color:red' type='button' value='Hapus'></a></td>
			  </tr>";
		$no++;
	}

	if ($_GET[aksi]=='hapus'){
		mysql_query("DELETE FROM rb_trx_reservasi where kd_trx_reservasi='$_GET[id]'");
		mysql_query("DELETE FROM rb_trx_makanan where kd_trx_reservasi='$_GET[id]'");
		echo "<script>window.alert('Sukses Hapus Data Pemesanan.');
					  window.location='index.php?page=admindatareservasi'</script>";
	}

		echo "</table>";

}elseif ($_GET[page]=='admininfopendaftaran'){ 
$i2 = mysql_fetch_array(mysql_query("SELECT * FROM rb_halaman where kd_halaman='1'"));
	if ($_POST[update]){
		mysql_query("UPDATE rb_halaman SET judul_halaman = '$_POST[a]',
										   isi_halaman 	 = '$_POST[b]' where kd_halaman='$_POST[id]'");
		echo "<script>window.alert('Sukses Update Halaman Info Pendaftaran.');
					  window.location='index.php?page=admininfopendaftaran'</script>";
	}
	echo "<form action='' method='POST'>
				<h2>Edit Informasi Pendaftaran</h2>
					<table width=100%> <input type='hidden' name='id' value='$i2[kd_halaman]'>
						<tr><td width=120px>Judul Informasi</td> <td><input type='text' style='width:60%;' value='$i2[judul_halaman]' name='a'></td></tr>
						<tr><td valign=top>Isi Informasi</td> <td><textarea name='b' style='width:100%; height:420px'>$i2[isi_halaman]</textarea></td></tr>
						<tr><td></td> <td><input type='submit' name='update' value='Update Data'></td></tr>
					</table>
			   </form>";

}elseif ($_GET[page]=='admininforeservasi'){ 
$i2 = mysql_fetch_array(mysql_query("SELECT * FROM rb_halaman where kd_halaman='2'"));
	if ($_POST[update]){
		mysql_query("UPDATE rb_halaman SET judul_halaman = '$_POST[a]',
										   isi_halaman 	 = '$_POST[b]' where kd_halaman='$_POST[id]'");
		echo "<script>window.alert('Sukses Update Halaman Info Reservasi.');
					  window.location='index.php?page=admininforeservasi'</script>";
	}
	echo "<form action='' method='POST'>
				<h2>Edit Informasi Reservasi</h2>
					<table width=100%> <input type='hidden' name='id' value='$i2[kd_halaman]'>
						<tr><td width=120px>Judul Informasi</td> <td><input type='text' style='width:60%;' value='$i2[judul_halaman]' name='a'></td></tr>
						<tr><td valign=top>Isi Informasi</td> <td><textarea name='b' style='width:100%; height:420px'>$i2[isi_halaman]</textarea></td></tr>
						<tr><td></td> <td><input type='submit' name='update' value='Update Data'></td></tr>
					</table>
			   </form>";

}elseif ($_GET[page]=='adminkontak'){ 
	echo "<h2>Halaman Semua Pesan Masuk</h2>
		  <table width=100% cellpadding=7>
			 <tr bgcolor=#000 font-color=#fff>
				<th>No</th>
				<th>Nama Lengkap</th>
				<th>Alamat Email</th>
				<th>Isi Pesan</th>
				<th>Action</th>
			 </tr>";
	$order = mysql_query("SELECT * FROM rb_kontak ORDER BY kd_kontak DESC");
	$no = 1;
	while ($g = mysql_fetch_array($order)){
	if ($no % 2 == 1){
		$warna = '#cecece';
	}else{
		$warna = '#ffffff';
	}	
		echo "<tr bgcolor=$warna>
				<td>$no</td>
				<td>$g[nama_lengkap]</td>
				<td>$g[alamat_email]</td>
				<td>$g[isi_pesan]</td>
				<td width='60px'><a href=''><input type='button' value='Hapus'></a></td>
			  </tr>";
		$no++;
	}
		echo "</table>";

}elseif ($_GET[page]=='adminfasilitas'){ 
	$kat = mysql_fetch_array(mysql_query("SELECT * FROM rb_kategori where kode_kategori='$_GET[kode]'"));
	echo "<h2>Halaman Semua Data $kat[nama_kategori] 
		  <a href='index.php?page=tambahfasilitas&kode=$_GET[kode]'><input style='float:right; padding:5px' type='button' value='Tambahkan $kat[nama_kategori]'></a></h2>
		  <table width=100%>";
	$fasilitas = mysql_query("SELECT * FROM rb_fasilitas where kode_kategori='$_GET[kode]' ORDER BY kode_fasilitas DESC");
	$no = 1;
	while ($g = mysql_fetch_array($fasilitas)){
	if ($no % 2 == 1){
		$warna = '#cecece';
	}else{
		$warna = '#ffffff';
	}	
		echo "<tr bgcolor=$warna><td rowspan='7' width=40% align=center><img style='width:97%; height:150px; border-radius:5px; padding:5px; 0px 5px 0px'src='foto/$g[namafoto]'></td></tr>
				<tr bgcolor=$warna><td width=210px><b>Nama $kat[nama_kategori]</b></td>		<td>$g[nama_fasilitas]</td>
								   <td bgcolor=lightblue rowspan='2' align=center><a href='index.php?page=editfasilitas&kode=$_GET[kode]&id=$g[kode_fasilitas]'><b>Edit</b></a></td></tr>
				<tr bgcolor=$warna><td><b>Harga Non Kemendikbud</b></td>	<td>Rp ".format_rupiah($g[hrg_nonkemendikbud])."</td></tr>
				<tr bgcolor=$warna><td><b>Harga Kemendikbud</b></td>		<td>Rp ".format_rupiah($g[hrg_kemendikbud])."</td>
									<td bgcolor=lightblue rowspan='2' align=center><a href='index.php?page=adminfasilitas&kode=$_GET[kode]&hapus=1&id=$g[kode_fasilitas]'><b>Delete</b></a></td></tr>
				<tr bgcolor=$warna><td><b>Harga Yayasan Sosial</b></td>	<td>Rp ".format_rupiah($g[hrg_yayasansosial])."</td></tr>
				<tr bgcolor=$warna><td><b>Jumlah Kamar</b></td>			<td>$g[jml_kmr]</td></tr>
				<tr bgcolor=$warna><td valign=top><b>Kapasitas</b></td>				<td>$g[kapasitas] Orang <br><br></td></tr>";
		$no++;
	}

	if ($_GET[hapus]){
		$kat = mysql_fetch_array(mysql_query("SELECT * FROM rb_kategori where kode_kategori='$_GET[kode]'"));
		mysql_query("DELETE FROM rb_fasilitas where kode_fasilitas='$_GET[id]'");
		echo "<script>window.alert('Sukses Hapus $kat[nama_kategori].');
									window.location='index.php?page=adminfasilitas&kode=$_GET[kode]'</script>";
	}

		echo "</table>";

}elseif ($_GET[page]=='tambahfasilitas'){ 
	$kat = mysql_fetch_array(mysql_query("SELECT * FROM rb_kategori where kode_kategori='$_GET[kode]'"));
	if (isset($_POST[tambah])){
		$dir_gambar = 'foto/';
			$filename = basename($_FILES['g']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['g']['tmp_name'], $uploadfile)) {
						mysql_query("INSERT INTO rb_fasilitas (kode_kategori, nama_fasilitas, hrg_nonkemendikbud, hrg_kemendikbud, hrg_yayasansosial, jml_kmr, kapasitas, namafoto) 
					 				VALUES ('$_GET[kode]','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$filename')");
										
										echo "<script>window.alert('Sukses Tambahkan $kat[nama_kategori] Baru.');
												window.location='index.php?page=adminfasilitas&kode=$_GET[kode]'</script>";

					}else{
										echo "<script>window.alert('Gagal Tambahkan $kat[nama_kategori] Baru.');
												window.location='index.php?page=adminfasilitas&kode=$_GET[kode]'</script>";
					}
				}else{
						mysql_query("INSERT INTO rb_fasilitas (kode_kategori, nama_fasilitas, hrg_nonkemendikbud, hrg_kemendikbud, hrg_yayasansosial, jml_kmr, kapasitas) 
					 				VALUES ('$_GET[kode]','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]')");
										
										echo "<script>window.alert('Sukses Tambahkan $kat[nama_kategori] Baru.');
												window.location='index.php?page=adminfasilitas&kode=$_GET[kode]'</script>";
				}
	}
	
	echo "<h2>Tambahkan $kat[nama_kategori] Baru</h2>";
               echo "<form action='' method='POST' enctype='multipart/form-data'>
					<table width=100%> 
						<tr><td width=190px>Nama $kat[nama_kategori]</td> <td><input type='text' name='a' style='width:80%'></td></tr>
						<tr><td>Harga Non Kemendikbud</td> <td><input type='text' name='b' style='width:40%'></td></tr>
						<tr><td>Harga Kemendikbud</td> <td><input type='text' name='c' style='width:40%'></td></tr>
						<tr><td>Harga Yayasan Sosial</td> <td><input type='text' name='d' style='width:40%'></td></tr>
						<tr><td>Jumlah Kamar</td> <td><input type='text' name='e' style='width:10%'></td></tr>
						<tr><td>Kapasitas</td> <td><input type='text' name='f' style='width:10%'></td></tr>
						<tr><td>Foto $kat[nama_kategori]</td> <td><input type='file' name='g'></td></tr>
						<tr><td></td> <td><br><br><input type='submit' name='tambah' value='Tambahkan $kat[nama_kategori]'></td></tr>
					</table>
			   </form>";

}elseif ($_GET[page]=='editfasilitas'){ 
	$kat = mysql_fetch_array(mysql_query("SELECT * FROM rb_kategori where kode_kategori='$_GET[kode]'"));
	if (isset($_POST[edit])){
		$dir_gambar = 'foto/';
			$filename = basename($_FILES['g']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['g']['tmp_name'], $uploadfile)) {
						mysql_query("UPDATE rb_fasilitas SET kode_kategori		= '$_GET[kode]',
															 nama_fasilitas		= '$_POST[a]',
															 hrg_nonkemendikbud	= '$_POST[b]',
															 hrg_kemendikbud 	= '$_POST[c]',
															 hrg_yayasansosial	= '$_POST[d]',
															 jml_kmr			= '$_POST[e]',
															 Kapasitas 			= '$_POST[f]',
															 namafoto 			= '$filename' where kode_fasilitas='$_GET[id]'");
										
										echo "<script>window.alert('Sukses Update $kat[nama_kategori].');
												window.location='index.php?page=adminfasilitas&kode=$_GET[kode]'</script>";

					}else{
										echo "<script>window.alert('Gagal Update $kat[nama_kategori].');
												window.location='index.php?page=adminfasilitas&kode=$_GET[kode]'</script>";
					}
				}else{
						mysql_query("UPDATE rb_fasilitas SET kode_kategori		= '$_GET[kode]',
															 nama_fasilitas		= '$_POST[a]',
															 hrg_nonkemendikbud	= '$_POST[b]',
															 hrg_kemendikbud 	= '$_POST[c]',
															 hrg_yayasansosial	= '$_POST[d]',
															 jml_kmr			= '$_POST[e]',
															 Kapasitas 			= '$_POST[f]' where kode_fasilitas='$_GET[id]'");
										
										echo "<script>window.alert('Sukses Update $kat[nama_kategori].');
												window.location='index.php?page=adminfasilitas&kode=$_GET[kode]'</script>";
				}
	}
	
	$g = mysql_fetch_array(mysql_query("SELECT * FROM rb_fasilitas where kode_fasilitas='$_GET[id]'"));
	echo "<h2>Edit Data $kat[nama_kategori]</h2>";
               echo "<form action='' method='POST' enctype='multipart/form-data'>
					<table width=100%> 
						<tr><td width=190px>Nama $kat[nama_kategori]</td> <td><input type='text' name='a' value='$g[nama_fasilitas]' style='width:80%'></td></tr>
						<tr><td>Harga Non Kemendikbud</td> <td><input type='text' name='b' value='$g[hrg_nonkemendikbud]' style='width:40%'></td></tr>
						<tr><td>Harga Kemendikbud</td> <td><input type='text' name='c' value='$g[hrg_kemendikbud]' style='width:40%'></td></tr>
						<tr><td>Harga Yayasan Sosial</td> <td><input type='text' name='d' value='$g[hrg_yayasansosial]' style='width:40%'></td></tr>
						<tr><td>Jumlah Kamar</td> <td><input type='text' name='e' value='$g[jml_kmr]' style='width:10%'></td></tr>
						<tr><td>Kapasitas</td> <td><input type='text' name='f' value='$g[kapasitas]' style='width:10%'></td></tr>
						<tr><td>Foto $kat[nama_kategori]</td> <td><img style='width:450px; border-radius:5px;'src='foto/$g[namafoto]'></td></tr>
						<tr><td>Ganti Foto </td> <td><input type='file' name='g'></td></tr>
						<tr><td></td> <td><br><br><input type='submit' name='edit' value='Update $kat[nama_kategori]'></td></tr>
					</table>
			   </form>";

}elseif ($_GET[page]=='adminmakanan'){ 
	if ($_GET[id]=='1'){
		$jenis = 'Makanan';
	}else{
		$jenis = 'Snack';
	}
	echo "<h2>Halaman Semua Data Menu $jenis 
		  <a href='index.php?page=tambahmakanan&id=$_GET[id]'><input style='float:right; padding:5px' type='button' value='Tambahkan $jenis'></a></h2>
		  <table width=100% cellpadding=7>
			 <tr bgcolor=#000 font-color=#fff>
				<th>No</th>
				<th>Harga</th>
				<th>Nama $jenis</th>
				<th>Action</th>
			 </tr>";
	$makan = mysql_query("SELECT * FROM rb_makanan where kode_jenis_makanan='$_GET[id]' ORDER BY kode_makanan DESC");
	$no = 1;
	while ($g = mysql_fetch_array($makan)){
	if ($no % 2 == 1){
		$warna = '#cecece';
	}else{
		$warna = '#ffffff';
	}	
		echo "<tr bgcolor=$warna>
				<td>$no</td>
				<td width='85px'>Rp ".format_rupiah($g[harga_makanan])."</td>
				<td>$g[menu_makanan]</td>
				<td width='100px'><a href='index.php?page=editmakanan&id=$_GET[id]&kode=$g[kode_makanan]'>Edit</a> | 
								  <a href='index.php?page=adminmakanan&hapus=1&id=$_GET[id]&kode=$g[kode_makanan]'>Delete</a></td>
			  </tr>";
		$no++;
	}

	if ($_GET[hapus]=='1'){
		if ($_GET[id]=='1'){ $jenis = 'Makanan'; }else{ $jenis = 'Snack'; }
		mysql_query("DELETE FROM rb_makanan where kode_makanan='$_GET[kode]'");
		echo "<script>window.alert('Sukses Delete $jenis.');
									window.location='index.php?page=adminmakanan&id=$_GET[id]'</script>";
	}
		echo "</table>";

}elseif ($_GET[page]=='tambahmakanan'){ 
	if ($_GET[id]=='1'){ $jenis = 'Makanan'; }else{ $jenis = 'Snack'; }

	if (isset($_POST[tambah])){
						mysql_query("INSERT INTO rb_makanan (kode_jenis_makanan, harga_makanan, menu_makanan) 
					 				VALUES ('$_GET[id]','$_POST[b]','$_POST[a]')");
										
										echo "<script>window.alert('Sukses Tambahkan $jenis Baru.');
												window.location='index.php?page=adminmakanan&id=$_GET[id]'</script>";
	}
	
	echo "<h2>Tambahkan $jenis Baru</h2>";
               echo "<form action='' method='POST' enctype='multipart/form-data'>
					<table width=100%> 
						<tr><td width=190px valign=top>Nama $jenis</td> <td><textarea name='a' style='width:100%; height:120px'></textarea></td></tr>
						<tr><td>Harga Makanan</td> <td><input type='text' name='b' style='width:40%'></td></tr>
						
						<tr><td></td> <td><br><br><input type='submit' name='tambah' value='Tambahkan $jenis'></td></tr>
					</table>
			   </form>";

}elseif ($_GET[page]=='editmakanan'){ 
	if ($_GET[id]=='1'){ $jenis = 'Makanan'; }else{ $jenis = 'Snack'; }
	$g = mysql_fetch_array(mysql_query("SELECT * FROM rb_makanan where kode_makanan='$_GET[id]'"));

	if (isset($_POST[update])){
						 mysql_query("UPDATE rb_makanan SET kode_jenis_makanan	= '$_GET[id]',
															harga_makanan		= '$_POST[b]',
															menu_makanan 		= '$_POST[a]' where kode_makanan='$_GET[kode]'");
										
										echo "<script>window.alert('Sukses Update $jenis.');
												window.location='index.php?page=adminmakanan&id=$_GET[id]'</script>";
	}
	
	echo "<h2>Edit $jenis</h2>";
               echo "<form action='' method='POST' enctype='multipart/form-data'>
					<table width=100%> 
						<tr><td width=190px valign=top>Nama $jenis</td> <td><textarea name='a' style='width:100%; height:120px'>$g[menu_makanan]</textarea></td></tr>
						<tr><td>Harga Makanan</td> <td><input type='text' name='b' value='$g[harga_makanan]' style='width:40%'></td></tr>
						
						<tr><td></td> <td><br><br><input type='submit' name='update' value='Update $jenis'></td></tr>
					</table>
			   </form>";

}elseif ($_GET[page]=='admintambahan'){ 
	echo "<h2>Halaman Semua Data Fasilitas Tambahan 
	<a href='index.php?page=tambah'><input style='float:right; padding:5px' type='button' value='Tambahkan Data'></a></h2>
		  <table width=100% cellpadding=7>
			 <tr bgcolor=#000 font-color=#fff>
				<th>No</th>
				<th>Nama Tambahan</th>
				<th>Jumlah Tambahan</th>
				<th>Action</th>
			 </tr>";
	$tambah = mysql_query("SELECT * FROM rb_tambahan ORDER by kode_tambahan DESC");
	$no = 1;
	while ($g = mysql_fetch_array($tambah)){
	if ($no % 2 == 1){
		$warna = '#cecece';
	}else{
		$warna = '#ffffff';
	}	
		echo "<tr bgcolor=$warna>
				<td>$no</td>
				<td>$g[nama_tambahan]</td>
				<td align=center>$g[jml_tambahan]</td>
				<td width='100px'><a href='index.php?page=edittambahan&id=$g[kode_tambahan]'>Edit</a> | 
								  <a href='index.php?page=admintambahan&hapus=1&id=$g[kode_tambahan]'>Delete</a></td>
			  </tr>";
		$no++;
	}
	if ($_GET[hapus]=='1'){
		mysql_query("DELETE FROM rb_tambahan where kode_tambahan='$_GET[id]'");
		echo "<script>window.alert('Sukses Delete Data.');
									window.location='index.php?page=admintambahan'</script>";
	}
		echo "</table>";

}elseif ($_GET[page]=='tambah'){ 
	if (isset($_POST[tambah])){
						mysql_query("INSERT INTO rb_tambahan (nama_tambahan, jml_tambahan) 
					 				VALUES ($_POST[a]','$_POST[b]')");
										
										echo "<script>window.alert('Sukses Tambahkan Data.');
												window.location='index.php?page=admintambahan'</script>";
	}
	
	echo "<h2>Tambahkan Data Baru</h2>";
               echo "<form action='' method='POST' enctype='multipart/form-data'>
					<table width=100%> 
						<tr><td width=190px valign=top>Nama Tambahan</td> <td><textarea name='a' style='width:100%; height:90px'></textarea></td></tr>
						<tr><td>Jumlah</td> <td><input type='text' name='b' style='width:40%'></td></tr>
						
						<tr><td></td> <td><br><br><input type='submit' name='tambah' value='Tambahkan Data'></td></tr>
					</table>
			   </form>";

}elseif ($_GET[page]=='edittambahan'){ 
	if (isset($_POST[update])){
						mysql_query("UPDATE rb_tambahan SET nama_tambahan = '$_POST[a]', jml_tambahan = '$_POST[b]' where kode_tambahan='$_GET[id]'");
										
										echo "<script>window.alert('Sukses Update Data.');
												window.location='index.php?page=admintambahan'</script>";
	}
	$g = mysql_fetch_array(mysql_query("SELECT * FROM rb_tambahan where kode_tambahan='$_GET[id]'"));
	echo "<h2>Edit Data Tambahan</h2>";
               echo "<form action='' method='POST' enctype='multipart/form-data'>
					<table width=100%> 
						<tr><td width=190px valign=top>Nama Tambahan</td> <td><textarea name='a' style='width:100%; height:90px'>$g[nama_tambahan]</textarea></td></tr>
						<tr><td>Jumlah</td> <td><input type='text' name='b' style='width:40%' value='$g[jml_tambahan]'></td></tr>
						
						<tr><td></td> <td><br><br><input type='submit' name='update' value='Update Data'></td></tr>
					</table>
			   </form>";

}elseif ($_GET[page]=='admindatamembers'){ 
	echo "<h2>Halaman Semua Data Members</h2>
		  <table width=100% cellpadding=7>
			 <tr bgcolor=#000 font-color=#fff>
				<th>No</th>
				<th>Nama Lengkap</th>
				<th>Nama Instansi</th>
				<th>No Telpon</th>
				<th>Alamat Email</th>
				<th>Alamat Lengkap</th>
				<th>Action</th>
			 </tr>";
	$members = mysql_query("SELECT * FROM rb_members ORDER by id_members DESC");
	$no = 1;
	while ($g = mysql_fetch_array($members)){
	if ($no % 2 == 1){
		$warna = '#cecece';
	}else{
		$warna = '#ffffff';
	}	
		echo "<tr bgcolor=$warna>
				<td>$no</td>
				<td>$g[nama_lengkap]</td>
				<td>$g[nama_instansi]</td>
				<td>$g[no_telpon]</td>
				<td>$g[alamat_email]</td>
				<td>$g[alamat_lengkap]</td>
				<td width='50px'><a href='index.php?page=admindatamembers&hapus=1&&id=$g[id_members]'>Delete</a></td>
			  </tr>";
		$no++;
	}
		echo "</table>";
	if ($_GET[hapus]=='1'){
		mysql_query("DELETE FROM rb_members where id_members='$_GET[id]'");
		echo "<script>window.alert('Sukses Hapus Data Members.');
												window.location='index.php?page=admindatamembers'</script>";
	}
}elseif ($_GET[page]=='adminslide'){ 
	echo "<h2>Semua Data Foto Slide</h2>
		  <table width=100% cellpadding=7>
			 <tr bgcolor=#000 font-color=#fff>
				<th width='20px'>No</th>
				<th>Foto Slide</th>
				<th>Keterangan Foto</th>
				<th>Action</th>
			 </tr>";
	$tambah = mysql_query("SELECT * FROM rb_slide");
	$no = 1;
	while ($g = mysql_fetch_array($tambah)){
	if ($no % 2 == 1){
		$warna = '#cecece';
	}else{
		$warna = '#ffffff';
	}	
		echo "<tr bgcolor=$warna>
				<td>$no</td>
				<td width='180px'><img src='images/$g[foto]' width=170px></td>
				<td>$g[keterangan]</td>
				<td width='60px' align=center><a href='index.php?page=editslide&id=$g[id_slide]'>Edit</a></td>
			  </tr>";
		$no++;
	}
	if ($_GET[hapus]=='1'){
		mysql_query("DELETE FROM rb_tambahan where kode_tambahan='$_GET[id]'");
		echo "<script>window.alert('Sukses Delete Data.');
									window.location='index.php?page=admintambahan'</script>";
	}
		echo "</table>";

}elseif ($_GET[page]=='editslide'){ 
	if (isset($_POST[update])){
		$dir_gambar = 'foto/';
			$filename = basename($_FILES['b']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['b']['tmp_name'], $uploadfile)) {
						mysql_query("UPDATE rb_slide SET keterangan = '$_POST[a]', foto = '$filename' where id_slide='$_GET[id]'");
										
										echo "<script>window.alert('Sukses Update Data Slide.');
												window.location='index.php?page=adminslide'</script>";

					}else{
										echo "<script>window.alert('Gagal Update Data Slide.');
												window.location='index.php?page=adminslide'</script>";
					}
				}else{
						mysql_query("UPDATE rb_slide SET keterangan = '$_POST[a]' where id_slide='$_GET[id]'");
										
										echo "<script>window.alert('Sukses Update Data Slide.');
												window.location='index.php?page=adminslide'</script>";
				}
						
	}
	$g = mysql_fetch_array(mysql_query("SELECT * FROM rb_slide where id_slide='$_GET[id]'"));
	echo "<h2>Edit Data Slide</h2>";
               echo "<form action='' method='POST' enctype='multipart/form-data'>
					<table width=100%> 
						<tr><td width=190px valign=top>Keterangan Slide</td> <td><textarea name='a' style='width:100%; height:90px'>$g[keterangan]</textarea></td></tr>
						<tr><td>Foto Slide</td> <td><img width='300px' src='images/$g[foto]'></td></tr>
						<tr><td>Ganti Foto</td> <td><input type='file' name='b'></td></tr>
						
						<tr><td></td> <td><br><br><input type='submit' name='update' value='Update Data Slide'></td></tr>
					</table>
			   </form>";

}
?>
