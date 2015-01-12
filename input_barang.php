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
        <td align="center" class="judul_menu">Input Data Barang </td>
      </tr>
      <tr>
        <td><form id="form1" name="form1" method="post" action="simpan_barang.php">
          <table width="100%" border="1">
            <tr>
              <td width="27%">Kode Barang</td>
              <td width="12%">:</td>
              <td width="61%"><label for="ed_kode"></label>
                <input type="text" name="ed_kode" id="ed_kode" /></td>
            </tr>
            <tr>
              <td>Nama Barang</td>
              <td>:</td>
              <td><input type="text" name="ed_namabarang" id="ed_namabarang" /></td>
            </tr>
            <tr>
              <td>Satuan</td>
              <td>:</td>
              <td><input type="text" name="ed_satuan" id="ed_satuan" /></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td>:</td>
              <td><input type="text" name="ed_harga" id="ed_harga" /></td>
            </tr>
            <tr>
              <td>Stock</td>
              <td>:</td>
              <td><input type="text" name="ed_stock" id="ed_stock" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="button" id="button" value="Simpan" />
                <input type="reset" name="button2" id="button2" value="Bersih" /></td>
            </tr>
          </table>
        </form></td>
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
</body>
</html>
