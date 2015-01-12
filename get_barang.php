<?php
$q = $_GET['q'];

include "koneksi.php";
$sql="SELECT * FROM tbl_barang WHERE Kode_Barang = '".$q."'";
$result = mysql_query($sql);


while($row = mysql_fetch_array($result)) {

echo 		'<table>
			<tr>
              <td>Nama Barang </td>
              <td align="center">:</td>
              <td><input name="nama_barang" type="text" id="nama_barang" value="'. $row['Nama_Barang'] .'" /></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td align="center">:</td>
              <td><input name="harga" type="text" id="harga"  value="'. $row['Satuan'] .'"  /></td>
            </tr>
            <tr>
              <td>Jumlah Beli </td>
              <td align="center">:</td>
              <td><input name="jumlah_beli" type="text" id="jumlah_beli"  value="'. $row['harga'] .'"  /></td>
            </tr>
            <tr>
              <td>Total Harga </td>
              <td align="center">:</td>
              <td><input name="total_harga" type="text" id="total_harga"  value="'. $row['Stock'] .'"  /></td>
            </tr> </table>';
			}
?>