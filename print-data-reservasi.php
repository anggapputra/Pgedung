<style>
	th { color:#000; }
</style>
<body onload="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
	function konversi($x){
   
  $x = abs($x);
  $angka = array ("","satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  $temp = "";
   
  if($x < 12){
   $temp = " ".$angka[$x];
  }else if($x<20){
   $temp = konversi($x - 10)." belas";
  }else if ($x<100){
   $temp = konversi($x/10)." puluh". konversi($x%10);
  }else if($x<200){
   $temp = " seratus".konversi($x-100);
  }else if($x<1000){
   $temp = konversi($x/100)." ratus".konversi($x%100);   
  }else if($x<2000){
   $temp = " seribu".konversi($x-1000);
  }else if($x<1000000){
   $temp = konversi($x/1000)." ribu".konversi($x%1000);   
  }else if($x<1000000000){
   $temp = konversi($x/1000000)." juta".konversi($x%1000000);
  }else if($x<1000000000000){
   $temp = konversi($x/1000000000)." milyar".konversi($x%1000000000);
  }
   
  return $temp;
 }
   
 function tkoma($x){
  $str = stristr($x,".");
  $ex = explode('.',$x);
   
  if(($ex[1]/10) >= 1){
   $a = abs($ex[1]);
  }
  $string = array("nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan",   "sembilan","sepuluh", "sebelas");
  $temp = "";
  
  $a2 = $ex[1]/10;
  $pjg = strlen($str);
  $i =1;
     
   
  if($a>=1 && $a< 12){   
   $temp .= " ".$string[$a];
  }else if($a>12 && $a < 20){   
   $temp .= konversi($a - 10)." belas";
  }else if ($a>20 && $a<100){   
   $temp .= konversi($a / 10)." puluh". konversi($a % 10);
  }else{
   if($a2<1){
     
    while ($i<$pjg){     
     $char = substr($str,$i,1);     
     $i++;
     $temp .= " ".$string[$char];
    }
   }
  }  
  return $temp;
 }
  
 function terbilang($x){
  if($x<0){
   $hasil = "minus ".trim(konversi(x));
  }else{
   $poin = trim(tkoma($x));
   $hasil = trim(konversi($x));
  }
   
if($poin){
   $hasil = $hasil." koma ".$poin;
  }else{
   $hasil = $hasil;
  }
  return $hasil;  
 }
 
?>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td width="65" rowspan="6"><img src="images/logo.png" width="90" height="90"></td>
    <td width="650" align="center">&nbsp;</td>
	
  </tr>
  <tr>
    <td align="center"><strong><p>KEMENTRIAN  KEPENDIDIKAN  DAN  KEBUDAYAAN  <br>
	    BADAN  PENGEMBANGAN  SUMBER  DAYA  MANUSIA  PENDIDIKAN  DAN <br>  KEBUDAYAAN  DAN  PENINGKATAN  MUTU  PENDIDIKAN <br>
	    LEMBAGA  PENJAMINAN  MUTU  PENDIDIKAN  KALIMANTAN  SELATAN</p></strong>
    </td>
  </tr>
  <tr>
    <td align="center"><p>Jl. Gotong Royong, Kode POS 60 Banjar Baru, 707111 Kalsel <br> Telp (0511) 4772384, Fax (0511) 4774184</p></td>
  </tr>   
</table>
<br><br>
<?php	
	$m = mysql_fetch_array(mysql_query("SELECT * FROM rb_trx_reservasi a 
                              JOIN rb_members d ON a.id_members=d.id_members 
                            		JOIN rb_jenis_penerimaan e ON d.kd_jenis_penerimaan=e.kd_jenis_penerimaan
                            		  where a.kd_trx_reservasi='$_GET[id]'"));

	echo "<center><h2>LEMBAR ORDER</h2></center>";
			echo "<form action='' method='POST'>
					<table width=100%> 
						<tr><td width=170px>Ditujukan Kepada</td> 	<td> : $m[nama_lengkap] ($m[jenis_penerimaan])</td></tr>
						<tr><td width=140px>Judul Kegiatan </td> 	<td> : . . . . . . . . . . . . . . . . . . . . . </td></tr>
						<tr><td>Waktu</td> 					<td> : $m[tanggal_pesan]</td></tr>
						<tr><td>Jumlah Peserta</td> 						<td> : . . . . . . . . . . . . . . . . . . . . . Orang </td></tr>
					</table>
			   </form>

			   <table border=1 width=100% cellpadding=7>
               <tr bgcolor=#cecece font-color=#fff>
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
              <td width='160px'>Rp $total $totorder</td>
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
					echo "<table border=1 width=100% cellpadding=7>
							 <tr bgcolor=#cecece font-color=#fff>
								<th>Nama Makanan</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th>Sub Total</th>
							 </tr>";
					$order = mysql_query("SELECT * FROM rb_trx_makanan a JOIN rb_makanan b ON a.kode_makanan=b.kode_makanan where a.kd_trx_reservasi='$_GET[id]'");
					$noo = 1;
					while ($g = mysql_fetch_array($order)){
					$totalm = $g[jumlah] * $g[harga_makanan];
						echo "<tr bgcolor=$warna>
								<td>$g[menu_makanan] </td>
								<td  width=100px>$g[jumlah] Porsi</td>
								<td width=100px>Rp $g[harga_makanan]</td>
								<td width='160px'  bgcolor=lightblue>Rp $totalm</td>
							  </tr>";
						$noo++;
					}
						$to = mysql_fetch_array(mysql_query("SELECT sum(d.total_harga) as total FROM (SELECT a.jumlah, b.harga_makanan, a.jumlah*b.harga_makanan as total_harga FROM rb_trx_makanan a JOIN rb_makanan b ON a.kode_makanan=b.kode_makanan where a.kd_trx_reservasi='$_GET[id]') d"));
						echo "<tr bgcolor=lightblue>
								<td colspan='3'></td>
								<td>Rp ".number_format($to[total],0,',','.')."</td>
							  </tr>";
						echo "</table>";

            echo "<br><table border=1 width=100% cellpadding=7>
               <tr bgcolor=#cecece font-color=#fff>
                <th>Nama Tambahan</th>
                <th>Jumlah</th>
               </tr>";
            $order = mysql_query("SELECT * FROM rb_trx_tambahan a JOIN rb_tambahan b ON a.kode_tambahan=b.kode_tambahan where a.kd_trx_reservasi='$_GET[id]'");
            $noo = 1;
            while ($g = mysql_fetch_array($order)){
            if ($noo % 2 == 1){
              $warna = '#fff';
            }else{
              $warna = '#cecece';
            } 

              echo "<tr bgcolor=$warna>
                  <td>$g[nama_tambahan] </td>
                  <td width='160px' bgcolor=lightblue>$g[jumlah] Unit</td>
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
						echo "<h3>Total Bayar : Rp ".number_format($totalf,0,',','.')." + Rp ".number_format($to[total],0,',','.')." = <b style='color:Red'>Rp $totalsemuarp</b> 
									(<i>".ucwords(terbilang($totalsemua))."</i>) </h3><br>";

?>

<table width=100%>
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td align="center">Menyetujui <br> Kasubbag Umum</td>
    <td align="center">Pernerima Order <br> Kaur Rumah Tangga</td>
    <td align="center">Banjar Baru, <?php echo date("d-m-Y"); ?> <br> Pemberi Order</td>
  </tr>

  <tr>
    <td align="center"><br /><br /><br /><br /><br />
      ( ...................................... )<br /><br />
    </td>

    <td align="center"><br /><br /><br /><br /><br />
      ( ...................................... )<br /><br />
    </td>

    <td align="center"><br /><br /><br /><br /><br />
      ( ...................................... )<br /><br />
    </td>
  </tr>

  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table> 
</body>