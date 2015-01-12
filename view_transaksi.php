<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/desain.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?
  //panggil koneksi database
  include "koneksi.php";
  //ambil nilai dari textfield "cari"
  $cari = $_REQUEST["cari"];
  //jika cari sama dengan kosong
  if (empty($cari))
  {
    
	$pencarian = "";
	$cari_data ="select * from tbl_transaksi order by No_Faktur";
  }
  else //jika cari ada nilainya
  {
    $pencarian = $_REQUEST["cari"];
	
	$cari_data = "select * from tbl_transaksi where 
	No_faktur like '%$pencarian%' order by No_Faktur"; 
  }
  //eksekusi perintah SQL
  $hasil = mysql_query($cari_data);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td colspan="3"><h5><img src="img/TranscodedWallpaper.jpg" width="100%" height="200" /></h5></td>
  </tr>
  <tr>
    <td width="20%" height="500" valign="top" class="garis_utama"><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td align="center" class="judul_menu">Menu Utama </td>
      </tr>
      <tr>
        <td><?php include "menu_kiri.php"; ?></td>
      </tr>
    </table></td>
    <td width="60%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td align="center" class="judul_menu">View Data Transaksi </td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td width="70%"><form id="form1" name="form1" method="post" action="">
              Pencarian Data (No Faktur) 
              <input name="cari" type="text" id="cari" size="20" />
                        <input type="submit" name="Submit" value="Pencarian" />
            </form>
            </td>
            <td width="30%" align="right"><a href="input_transaksi.php">Input Data Transaksi</a> </td>
          </tr>
          <tr>
            <td colspan="2"><table width="100%" border="1" cellspacing="0" cellpadding="3">
              <tr>
				<td width="20%" align="center">No</td>
                <td width="20%" align="center">No Faktur </td>
                <td width="20%" align="center">Tgl Faktur </td>
                <td width="20%" align="center">Kode Barang </td>
                <td width="20%" align="center">Jumlah</td>
                <td width="20%" align="center">Total Harga </td>
				<td width="20%" align="center">Aksi</td>
              </tr>
			  <?php 
			  	$no = 1;
			  	while($data = mysql_fetch_array($hasil))
				{
				  $No_Faktur 	= $data[0];
				  $Tgl_Faktur 	= $data[1];
				  $Kode_Barang 	= $data[2];
				  $Jumlah 		= $data[3];
				  $Total_Harga 	= $data[4];
			  ?>
              <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $No_Faktur;?></td>
                <td><?php echo $Tgl_Faktur;?></td>
                <td><?php echo $Kode_Barang;?></td>
                <td><?php echo $Jumlah;?></td>
                <td><?php echo $Total_Harga;?></td>
                <td align="center"><a href="?view_transaksi.php&amp;No_Faktur=<? echo $No_Faktur; ?>&amp;act=hapus">Hapus</a></td>
              </tr>
              <?php
				}
              ?>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="20%" valign="top" class="garis_utama"><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td align="center" class="judul_menu">Halaman Link </td>
      </tr>
      <tr>
        <td><?php include "menu_kanan.php"; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="garis_footer">Copy Right(C) 2014 Desain Web By : Nama Anda </td>
  </tr>
</table>
<?
  //ambil nilai dari variabel link
  $No_Faktur = $_REQUEST["No_Faktur"];
  $act = $_REQUEST["act"];
  if ($act=="hapus")
  {
    //hapus record barang berdasarkan kode_barang
	$hapus = "delete from tbl_transaksi where No_Faktur='$No_Faktur'";
	$hasil = mysql_query($hapus);
	//refresh halalaman
	echo "<script> location.href='view_transaksi.php';</script>";
  }
?>
</body>
</html>
