<?
	//koneksi database
	include "koneksi.php";
	
	//mengambil data dari input barang
	$kode 		 = $_POST['ed_kode'];
	$nama_barang = $_POST['ed_namabarang'];
	$satuan		 = $_POST['ed_satuan'];
	$harga 		 = $_POST['ed_harga'];
	$stock 		 = $_POST['ed_stock'];
	
	//query sql
	$sql = "INSERT INTO tbl_barang VALUES ('$kode','$nama_barang','$satuan','$harga','$stock')";
	
	mysql_query($sql);
	//kondisi jika berhasil disimpan
	if ($sql) 
	{
	?>
    	<script type="text/javascript">
		alert("Data Barang Berhasil Disimpan")
		document.location.href="input_barang.php";
		</script>
    <?	
	}
	else
	{
		mysql_query();
	}
		mysql_close();
?>