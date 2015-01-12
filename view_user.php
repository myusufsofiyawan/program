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
    //maka tampilkan seluruh record tbl_barang
	$pencarian = "";
	$cari_data ="select * from tbl_barang order by kode_barang";
  }
  else //jika cari ada nilainya
  {
    $pencarian = $_REQUEST["cari"];
	//cari data berdasarkan kode barang / nama barang
	$cari_data = "select * from tbl_barang where 
	kode_barang like '%$pencarian%' or 
	nama_barang like '%$pencarian%' order by kode_barang"; 
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
        <td><? include "menu_kiri.php"; ?></td>
      </tr>
    </table></td>
    <td width="60%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td align="center" class="judul_menu">View Data Barang </td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td width="70%"><form id="form1" name="form1" method="post" action="">
              Cari Data (Kode/Nama) 
              <input name="cari" type="text" id="cari" />
              <input type="submit" name="Submit" value="Pencarian" />
                                    </form>
            </td>
            <td><a href="input_barang.php">Input Data Barang</a></td>
          </tr>
          <tr>
            <td colspan="2"><table width="100%" border="1" cellspacing="0" cellpadding="3">
              <tr>
              	<td>No</td>
                <td width="15%" align="center">ID User</td>
                <td width="25%" align="center">Nama </td>
                <td width="15%" align="center">Alamat</td>
                <td width="15%" align="center">Telepn</td>
                <td width="15%" align="center">Password</td>
                <td width="15%" align="center">Action</td>
              </tr>
              <? 
			  	$no = 1;
			  	while($data = mysql_fetch_array($hasil))
				{
				  $kode_barang = $data[0];
				  $nama_barang = $data[1];
				  $satuan = $data[2];
				  $harga = $data[3];
				  $stock = $data[4];
			  ?>
              <tr>
                <td><? echo $no++;?></td>
                <td><? echo $kode_barang;?></td>
                <td><? echo $nama_barang;?></td>
                <td><? echo $satuan;?></td>
                <td><? echo $harga;?></td>
                <td><? echo $stock;?></td>
                <td align="center"><a href="">Hapus</a></td>
              </tr>
              <?
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
        <td><? include "menu_kanan.php"; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="garis_footer">Copy Right(C) 2014 Desain Web By : Nama Anda </td>
  </tr>
</table>
<?
  //ambil nilai dari variabel link
  $kode_barang = $_REQUEST["kode_barang"];
  $act = $_REQUEST["act"];
  if ($act=="hapus")
  {
    //hapus record barang berdasarkan kode_barang
	$hapus = "delete from tbl_barang where kode_barang='$kode_barang'";
	$hasil = mysql_query($hapus);
	//refresh halalaman
	echo "<script> location.href='view_barang.php';</script>";
  }
?>
</body>
</html>
