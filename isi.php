<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
@import url("desain_css.css");
.style2 {font-size: 12}
</style>
</head>

<body>


<!---- Home ----->
<?
	$menu = $_REQUEST["menu"];
	if ($menu ==  "home" )
	{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td align="left" valign="top"><div align="center" class="judul">
      <div align="center">Home</div>
    </div></td>
  </tr>
  <tr>
    <td><p><strong>Selamat Datang di Butik AMMERAZANNA</strong></p>
    <p>Perusahaan saya bergerak di bidang penjualan baju , diantaranya baju abaya, longcardy dll. Toko Ini berdiri sejak 4 juli 2013 yang beralamat dijalan Pemuda No.22 C Tanjungbintang,Lampung Selatan. Sampai saat ini kami memiliki 2 karyawan laki-laki dan 5 karyawan perempuan. Konsep yang kami tawarkan dalam perusahaan kami yaitu baju-baju yang unik yang tentunya hasil design kami sendiri. Uniknya Butik kami ini, dan bisa dibilang beda dari Butik yang lainnya, yaitu baju-baju abaya design kami. Mengapa dikatakan seperti itu ? karena sampai saat ini hanya Butik kami yang menjual baju-baju abaya yang model nya mengikuti tren negara lain seperti tokyo, jepang, dan arab. Dengan perkembangan Butik kami sampai saat ini banyak sekali butik-butik yang mengikuti model dan design dari baju kami, tapi kami tidak pernah takut kalah saing dengan butik lain karena uniknya rangkaian kami akan tetap mempertahakan rangkaian baju-baju yang desainnya sangat cantik dan menarik.</p>    <h4>&nbsp;</h4></td>
  </tr>
</table>
<?
	}
	
	else if ($menu == "entry")
	{ 
		/// AMBILKAN NAME DARI KOMPONEN
		$kode = $_REQUEST["kode"];
		$nama = $_REQUEST["nama"];
		$satuan = $_REQUEST["satuan"];
		$harga = $_REQUEST["harga"];
		$stock = $_REQUEST["stock"];
		
		if (empty($kode))
		{
		$pesan = "kode barang masih kosong";
		}
		else if ($kode == ""|| $nama == "" || $satuan ==""|| $harga =="" || $stock =="" )
		{
		$pesan = "Data Masih Ada Yang Kosong .. !!!";
		}
		else
			{
			$query = "SELECT * FROM tbl_barang WHERE kode_barang ='$kode'";
			$hasil = mysql_query($query);
			if (mysql_num_rows($hasil) == 0)
			{
			$querysimpan = "INSERT INTO tbl_barang VALUES
			('$kode','$nama','$satuan','$harga','$stock')";
			
			$hasilsimpan = mysql_query ($querysimpan);
			
			echo "<script>
			location.href='?menu=viwe';
			</script>";
			}
			}
?>
<!---- Home ----->

<!---- Entry data ----->
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
   
       <td align="left" valign="top"><div align="center" class="judul">
         <div align="center">Entry Data</div>
       </div></td>
     
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td><?php echo $pesan; ?></td>
          </tr>
        <tr>
          <td width="30%">Kode Barang </td>
          <td width="5%">:</td>
          <td width="65%"><input name="kode" type="text" class="WARNA" id="kode" size="15" maxlength="10" /></td>
        </tr>
        <tr>
          <td>Nama Barang </td>
          <td>:</td>
          <td><input name="nama" type="text" class="WARNA" id="nama" size="40" maxlength="30" /></td>
        </tr>
        <tr>
          <td>Satuan Barang </td>
          <td>:</td>
          <td><select name="satuan" class="WARNA" id="satuan">
            <option value="TANGKAI">TANGKAI</option>
            <option value="PAPAN">PAPAN</option>
            <option value="BUCKET">BUCKET</option>
          </select>
          </td>
        </tr>
        <tr>
          <td>Harga Barang </td>
          <td>:</td>
          <td><input name="harga" type="text" class="WARNA" id="harga" size="20" maxlength="10" /></td>
        </tr>
        <tr>
          <td>Stock Barang </td>
          <td>:</td>
          <td><input name="stock" type="text" class="WARNA" id="stock" size="10" maxlength="5" /></td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">
            <input name="SIMPAN" type="submit" class="judul" id="SIMPAN" value="SIMPAN" />
             <input name="Submit2" type="reset" class="judul" value="Reset" />
          </div></td>
          </tr>
      </table>
        </form>
    </td>
  </tr>
</table>

<!---- Entry data ----->
<?
	}
	else if ($menu == "viwe")
	{
		////ambil nilai variable link tbl barang.php
		$kode_barang = $_REQUEST["kode_barang"];
		$act = $_REQUEST["act"];
				if ($act == "hapus")
		{
		$query = "DELETE FROM tbl_barang 
		WHERE kode_barang = '$kode_barang'";
		$hasil = mysql_query($query);
		
		echo "<script>
		location.href='?menu=viwe';
		</script>";
		
		}
			else
			{
			$kode_barang = $_REQUEST["kode_barang"];
			$act = $_REQUEST["act"];
			if ($act == "update")
			{
				
				
			}
			}
?>
<!--viwe data-->
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
   <td align="center">View Data</td>
  </tr>
<tr>
    <td><?php include "tbl_barang.php"; ?></td>
  </tr>
</table>

<!--viwe data-->
<?
}
else if ($menu == "sistem")
{
?>
<!--report-->
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td align="left" valign="top"><div align="center" class="judul">
      <div align="center">Sistem Pemesanan</div>
    </div></td>
  </tr>
  <tr>
    <td><h4>Untuk sistem pemesanan khususnya Bunga Papan harus pesan 3 hari sebelumnya , untuk Bunga Segar bisa pesan 2-3 hari sebelumnya bisa juga ditunggu dan langsung jadi , tergantung rangkaian dan isi dari bunganya. Untuk bunga Meja dan Bunga Sudut jika pesan sesuai keinginan pelanggan, harus pean 5 hari sebelumnya. Akan tetapi jika ingin pesan Bunga Bonsai apalagi dengan ukuran yang super-super jumbo harus pesan 2 minggu sebelumnya.</h4></td>
  </tr>
</table>


<!--report-->
<?

?>
<?
}
else if ($menu == "profil")
{
?>
<!--report-->
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td align="left" valign="top"><div align="center" class="judul">
      <div align="center">Profil</div>
    </div></td>
  </tr>
  <tr>
    <td>
    Gerardes Muhammad 
11311221
Sistem Informasi
SI Ekstensi 4

Ria Reza Restina
11311454
Sistem Informasi
SI Ekstensi 4

Hengki Gunawan
11311226
Sistem Informasi
SI Ekstensi 4</td>
  </tr>
</table>


<!--report-->
<?

}
	
	else if ($menu == "input")
	{ 
		/// AMBILKAN NAME DARI KOMPONEN
		$kode = $_REQUEST["kode"];
		$nama = $_REQUEST["nama"];
		$satuan = $_REQUEST["satuan"];
		$harga = $_REQUEST["harga"];
		$stock = $_REQUEST["stock"];
		$stock = $_REQUEST["stock"];
		$stock = $_REQUEST["stock"];
		
		if (empty($kode))
		{
		$pesan = "kode barang masih kosong";
		}
		else if ($kode == ""|| $nama == "" || $satuan ==""|| $harga =="" || $stock =="" || $stock ==""|| $stock =="" )
		{
		$pesan = "Data Masih Ada Yang Kosong .. !!!";
		}
		else
			{
			$query = "SELECT * FROM tbl_transaksi WHERE kode_barang ='$kode'";
			$hasil = mysql_query($query);
			if (mysql_num_rows($hasil) == 0)
			{
			$querysimpan = "INSERT INTO tbl_transaksi VALUES
			('$kode','$nama','$satuan','$harga','$stock','$stock','$stock')";
			
			$hasilsimpan = mysql_query ($querysimpan);
			
			echo "<script>
			location.href='?menu=transaksi';
			</script>";
			}
			else
			{
			$pesan = "kode barang sudah ada ";
			
			}
		}
?>
<!---- Home ----->

<!---- Entry data ----->
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
   
       <td align="left" valign="top"><div align="center" class="judul">
         <div align="center">Entry Data</div>
       </div></td>
     
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td><?php echo $pesan; ?></td>
          </tr>
        <tr>
          <td width="30%">Nomor Nota </td>
          <td width="5%">:</td>
          <td width="65%"><input name="kode" type="text" class="WARNA" id="kode" size="15" maxlength="10" /></td>
        </tr>
        <tr>
          <td>Tanggal Nota </td>
          <td>:</td>
          <td><input name="nama" type="text" class="WARNA" id="nama" size="40" maxlength="30" /></td>
        </tr>
        <tr>
          <td>Kode Barang </td>
          <td>:</td>
          <td><select name="satuan" class="WARNA" id="satuan">
          <option value="B001">B001</option>
            <option value="B002">B002</option>
            <option value="B003">B003</option>
            <option value="B004">B004</option>
          </select>
          </td>
        </tr>
        <tr>
          <td>Nama Pelanggan </td>
          <td>:</td>
          <td><input name="harga" type="text" class="WARNA" id="harga" size="20" maxlength="10" /></td>
        </tr>
        <tr>
          <td>Almat Pelanggan </td>
          <td>:</td>
          <td><input name="stock" type="text" class="WARNA" id="stock" size="10" maxlength="5" /></td>
        </tr>
        <tr>
         <td>Jumalah Beli </td>
          <td>:</td>
          <td><input name="stock" type="text" class="WARNA" id="stock" size="10" maxlength="5" /></td>
        </tr>
        <tr>
         <td>Total Harga </td>
          <td>:</td>
          <td><input name="stock" type="text" class="WARNA" id="stock" size="10" maxlength="5" /></td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">
            <input name="SIMPAN" type="submit" class="judul" id="SIMPAN" value="SIMPAN" />
             <input name="Submit2" type="reset" class="judul" value="Reset" />
          </div></td>
          </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
<!---- Entry data ----->
<?
	}
	else if ($menu == "transaksi")
	{
		$No_nota = $_REQUEST["No_nota"];
		$act = $_REQUEST["act"];
				if ($act == "hapus")
		{
		$query = "DELETE FROM tbl_transaksi
		WHERE No_nota = '$No_nota'";
		$hasil = mysql_query($query);
		
		echo "<script>
		location.href='?menu=transaksi';
		</script>";
		
		}
?>

<!--report-->

<!--report-->
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
   <td align="center">View Data Transaksi</td>
  </tr>
<tr>
    <td><?php include "tbl_transaksi.php"; ?></td>
  </tr>
</table>
</td>
  </tr>
</table>


<!--report-->
<?
}
?>

</body>
</html>
