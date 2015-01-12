<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/desain.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
        <td align="center" class="judul_menu">Input  Data Transaksi </td>
      </tr>
      <tr>
        <td>
		<form id="form1" name="form1" method="post" action="simpan_transaksi.php">
          <table width="100%" border="1" cellspacing="0" cellpadding="3">
            <tr>
              <td width="35%">No Faktur </td>
              <td width="5%" align="center">:</td>
              <td width="60%"><input name="no_faktur" type="text" id="no_faktur" /></td>
            </tr>
            <tr>
              <td>Tgl Faktur </td>
              <td align="center">:</td>
              <td><input name="tgl_faktur" type="text" id="tgl_faktur" placeholder="2015-12-31" /></td>
            </tr>
            <tr>
              <td>Kode Barang </td>
              <td align="center">:</td>
              <td>
					<?php
						
						include 'koneksi.php';
						$sql   		= mysql_query("select * from tbl_barang");
						$jsArray 	= "var prdName = new Array();\n";
						echo '<select name="prdId" onchange="changeValue(this.value)">';  
						echo '<option>--Pilihan--</option>';  
						while ($row = mysql_fetch_array($sql)) 
						{  
							echo '<option value="' . $row['Kode_Barang'] . '">' . $row['Kode_Barang'] . '</option>';  
							$jsArray .= "prdName['" . $row['Kode_Barang'] . "'] = {name:'" . addslashes($row['Nama_Barang']) . "',satuan:'".addslashes($row['Satuan']). "',harga:'".addslashes($row['harga'])."'};\n";   
						} 
						echo '</select>'; 
						
					?>
              </td>
			</tr>
			<tr>
              <td>Nama Barang</td>
              <td align="center">:</td>
              <td><input type="text" name="nama_barang" id="nama_barang"/></td>
            </tr>
			<tr>
              <td>Satuan</td>
              <td align="center">:</td>
              <td><input name="satuan" type="text" id="satuan" /></td>
            </tr>
			<tr>
              <td>Harga</td>
              <td align="center">:</td>
              <td><input name="harga" type="text" id="harga" /></td>
            </tr>
			<tr>
              <td>Jumlah Beli</td>
              <td align="center">:</td>
              <td><input name="jumlah_beli" type="text" id="jumlah_beli" /></td>
            </tr>
			<tr>
			<script language="JavaScript" type="text/javascript">
			<!--
			function hitung(){
			var harga=eval(document.form1.harga.value);
			var jumlah_beli=eval(document.form1.jumlah_beli.value);
			var z = harga * jumlah_beli;
			document.form1.total_harga.value = z;
			}
			function resetForm(){
			document.form1.reset();
			}
			//-->
			</script>
              <td>Total Harga</td>
              <td align="center">:</td>
              <td><input name="total_harga" type="text" id="total_harga" /></td>
            </tr>
			<tr>
              <td colspan="3" align="center">
			    <input name="total" type="button" value="Total Harga" onClick="hitung()"/>
				<input name="simpan" type="submit" value="Simpan" />
                <input type="reset" name="Submit2" value="Reset" /></td>
            </tr>
          </table>
                </form>
			<script type="text/javascript">    
						<?php echo $jsArray; ?>  
						function changeValue(id)
						{  
							document.getElementById('nama_barang').value = prdName[id].name;  
							document.getElementById('satuan').value		 = prdName[id].satuan;
							document.getElementById('harga').value		 = prdName[id].harga;
						};  
					</script> 
        </td>
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

	<!--<div id="txtHint"><b>Person info will be listed here...</b></div> -->
</body>
</html>
