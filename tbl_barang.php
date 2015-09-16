<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
/// nilai komponen dari cari textfild
     $cari = $_REQUEST ["cari"];
/// JIKA CARI BERNILAI KOSONG
if (empty($cari))
{
$pencarian ="";
$query = "SELECT * FROM tbl_barang
WHERE kode_barang LIKE '%$pencarian%' OR
nama_barang LIKE '%$pencarian'";
}
else
{
$pencarian = $_REQUEST["cari"];

$query = "SELECT * FROM tbl_barang
WHERE kode_barang LIKE '%$pencarian%' OR
nama_barang LIKE '%$pencarian'";
}
$hasil = mysql_query($query);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><form name="form1" method="post" action="">
      Pencarain berdasarkan Kode / Nama Barang
 :
 <input name="cari" type="text" id="cari" value="<? echo $pencarian; ?>" size="45" maxlength="40">    
 <input name="Search" type="submit" id="Search" value="Search">
    </form>    </td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
        <td width="15%">Kode</td>
        <td width="25%">Nama</td>
        <td width="10%">Satuan</td>
        <td width="15%">Harga</td>
        <td width="10%">Stock</td>
        <td width="25%" colspan="2">Action		</td>
      </tr>
	  <?php
	  //// tampilin rocord tbl barangdengan loping
	  While($data=mysql_fetch_array($hasil))
	  	  {
	  	$kode_barang = $data [0];
		$nama_barang = $data [1];
		$satuan_barang = $data [2];
		$harga_barang = $data [3];
		$stock_barang = $data [4];
	  ?>
      <tr>
        <td><?php echo $kode_barang; ?></td>
        <td><?php echo $nama_barang; ?></td>
        <td><?php echo $satuan_barang; ?></td>
        <td><?php echo $harga_barang; ?></td>
        <td><?php echo $stock_barang; ?></td>
        <td><a href="?menu=viwe&kode_barang=<? echo $kode_barang; ?>&act=Edit">Update</a></td>
        <td><a href="?menu=viwe&kode_barang=<? echo $kode_barang; ?>&act=hapus">Delete</a></td>
      </tr>
	  <?php
	  }
	  ?>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
