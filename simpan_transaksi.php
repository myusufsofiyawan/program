<?
	//koneksi database
	include "koneksi.php";
	
	//mengambil data dari input barang
	$nomor 		 = $_POST['no_faktur'];
	$tgl_faktur  = $_POST['tgl_faktur'];
	$kode		 = $_POST['prdId'];
	$jumlah_beli = $_POST['jumlah_beli'];
	$total_harga = $_POST['total_harga'];
	
	//query sql
	$sql = "INSERT INTO tbl_transaksi VALUES ('$nomor','$tgl_faktur','$kode','$jumlah_beli','$total_harga')";
	
	mysql_query($sql);
	//kondisi jika berhasil disimpan
	if ($sql) 
	{
	?>
    	<script type="text/javascript">
		alert("Data Transaksi Berhasil Disimpan")
		document.location.href="input_transaksi.php";
		</script>
    <?	
	}
	else
	{
		mysql_query();
	}
		mysql_close();
?>