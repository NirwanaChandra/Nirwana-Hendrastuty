<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
$query = "SELECT * FROM tbl_transaksi
WHERE No_nota LIKE '%$pencarian%' OR
Nama_pelanggan LIKE '%$pencarian'";
}
else
{
$pencarian = $_REQUEST["cari"];

$query = "SELECT * FROM tbl_transaksi
WHERE No_nota LIKE '%$pencarian%' OR
Nama_pelanggan LIKE '%$pencarian'";
}
$hasil = mysql_query($query);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><form name="form1" method="post" action="">
      Pencarain berdasarkan 
 :
 <input name="cari" type="text" id="cari" value="<? echo $pencarian; ?>" size="45" maxlength="40">    
 <input name="Search" type="submit" id="Search" value="Search">
    </form>    </td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
        <td width="9%">No_nota</td>
        <td width="9%">Tgl_nota</td>
        <td width="15%">Nama_pelanggan</td>
        <td width="16%">Alamat_pelanggan</td>
        <td width="13%">Kode_barang</td>
        <td width="11%">Jumlah_beli</td>
        <td width="11%">Total_harga</td>
        <td colspan="2">Action		</td>
        </tr>
     <?php
	  //// tampilin rocord tbl barangdengan loping
	  While($data=mysql_fetch_array($hasil))
	  	  {
	  	$No_nota = $data [0];
		$Tgl_nota = $data [1];
		$Nama_pelanggan = $data [2];
		$Alamat_pelanggan = $data [3];
		$Kode_barang = $data [4];
		$Jumlah_beli = $data [5];
		$Total_harga = $data [6];
	  ?>
      <tr>
        <td><?php echo $No_nota; ?></td>
        <td><?php echo $Tgl_nota; ?></td>
        <td><?php echo $Nama_pelanggan; ?></td>
        <td><?php echo $Alamat_pelanggan; ?></td>
        <td><?php echo $Kode_barang; ?></td>
        <td><?php echo $Jumlah_beli; ?></td>
        <td><?php echo $Total_harga; ?></td>
        <td width="4%">Update</td>
       <td><a href="?menu=transaksi&No_nota=<? echo $No_nota; ?>&act=hapus">Delete</a></td>
      </tr>
	  <?php
	  }
	  ?>
    </table></td>
  </tr>
</table>
</body>
</html>
