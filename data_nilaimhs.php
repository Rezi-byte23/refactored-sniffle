<?php
include 'koneksi_nilai.php';

// Fungsi untuk menjalankan query dan mengambil data
function select($query)
{
    // Panggil koneksi database
    global $conn;

    // Jalankan query
    $result = mysqli_query($conn, $query);
   
    // Jika query gagal, tampilkan pesan error
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    // Simpan hasil query ke dalam array
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    // Kembalikan hasil query
    return $rows;
}
// Contoh penggunaan fungsi select
$table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt1, nilai_huruf, total_nilai FROM table_smt1");


$table_smt2 = select("SELECT kode_mk, nama_mk, sks_smt2, nilai_huruf, total_nilai FROM table_smt2");


// Data tersedia dalam variabel $frs_mhs, bisa digunakan sesuai kebutuhan
// Misalnya, Anda bisa mengembalikan $frs_mhs sebagai respons JSON atau memprosesnya lebih lanjut
// Fungsi untuk menghapus data FRS

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1024">
    <title>[SIAKAD-SP] Data Nilai Kuliah Per Mhs </title>
    <link rel = "icon" type = "image" href = "favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .ComboSmallStyle {
    font-size: 5pt;
    font-family: tahoma;
}
   html, body {
    height: 100%; /* Pastikan body mengambil seluruh tinggi halaman */
    display: flex;
    flex-direction: column; /* Mengatur arah flex menjadi kolom */
    overflow-x: hidden;
}
.navbar-brand, .nav-link, .navbar-text {
        font-size: 0.8em !important; /* Mengatur ukuran font untuk elemen di dalam nav */
    }
body {
 /* Atur lebar body */
 background-color: #ffffff; 
  flex: 1;
    font-family:  Verdana, Arial, Helvetica, sans-serif;
    font-size: 0.9em;
    margin: 0; /* Hapus margin default */
    padding: 0; 
}
.card {
    width: 100px; /* Kecilkan ukuran card */
    margin-bottom: 10px;
    border: none;
    height: 40%;
}

.table {
    font-size: 0.8em; /* Kecilkan ukuran font di dalam tabel */
    width: 100%; /* Kecilkan lebar tabel */
    margin: 0; /* Hapus margin */
            padding: 0; /* Hapus padding */
           
          
}
.table tr:nth-child(even) td {
  background: #e3ebef;
}

.table tr:nth-child(odd) {
    background-color: #ffffff; /* Warna putih untuk baris ganjil */
}

        .card-header {
            padding: 5px; /* Kurangi padding pada header card */
            text-align: center;
        }

        .text-start {
          margin-left: 5px; /* Kurangi margin kiri pada teks */
        }
        .table tr:hover {
    background-color: orange; /* Warna oranye saat hover */
}
        .bg-dodger-blue {
        background-color: dodgerblue; /* Warna Dodger Blue */
        color: white; /* Warna teks putih untuk kontras */
    }
    /* Tambahkan border pada sel */
    
  
    .table th {
    padding: 5px; /* Mengurangi padding untuk mengurangi ketinggian sel */
    
 
}
.table th:last-child, .table td:last-child {
    border-right: none; /* Menghapus garis vertikal di kolom terakhir */
}
@media (max-width: 768px) {
    body {
        font-size: 0.8em; /* Ukuran font lebih kecil di perangkat kecil */
    }
    .card {
        width: 95%; /* Lebar card lebih besar di perangkat kecil */
    }
    .table th, .table td {
        padding: 5px; /* Padding lebih kecil di perangkat kecil */
    }
}
.bg-purple {
        background-color: purple; /* Warna ungu */
        color: white; /* Warna teks putih untuk kontras */
    }
    .bg-custom {
    background-color: #DCDCDC; /* Warna abu-abu */
}

      .bg-warning {
        background-color: #f5deb3; /* Krem */
        color: black; /* Warna teks hitam untuk kontras */
    }
    .bg-purple {
        background-color: #ff80ff; /* Warna ungu */
        color: black; /* Warna teks putih untuk kontras */
        
    }
    .bg-custom {
    background-color: #ece9d8; /* Warna abu-abu */
}

.icon-circle:hover {
    background-color: rgba(255, 255, 255, 1); /* Warna saat hover */
}

.bg-header{
  background-color: #DFE3EB;
}

.font-custom{
  font-size: 0.74em;
  font-weight: normal;
}
.GridStyle {
  width:490px;
    background-color: #ffffff;
    background-image: url(grey-bar.gif);
    background-repeat: repeat-x;
    background-attachment: scroll;
    background-position: 0pt 0pt;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-top-color: #d2d2d2;
    border-right-color: #d2d2d2;
    border-bottom-color: #d2d2d2;
    border-left-color: #d2d2d2;
    border-top-width: 0pt;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    padding-top: 16px;
    padding-right: 11px;
    padding-bottom: 13px;
    padding-left: 14px;
    margin-bottom: 15px;
    display: inline-block;
    position: relative;
    border-collapse: collapse;
    -moz-border-radius: 5px;
}
.font-large {
    font-size: 1.28em; /* Ukuran font untuk Sarjana */
  
}

.font-small {
    font-size: 1em; /* Ukuran font untuk Tahap */
    color: white; /* Warna untuk Tahap */
}
.bg-gray{
    background-color: #cccccc;
}
.navbar-main {
  color: #ffffff;
    background-image: url('back2 (1).gif');
  border: none;
 
  font-size: 1.1em;
  font-weight: bold;
  height: 23px !important;
    }
    .navbar-custom .navbar-brand,
    .navbar-custom .nav-link {
      color: white; /* Warna teks */
    }
    .navbar-custom .nav-link:hover {
      color: #ccc; /* Warna teks saat hover */
    }
    .dropdown-menu {
      width: 250px; /* Atur lebar dropdown menu */
    padding: 10px; /* Atur padding */
    font-size: 0.9em; /* Atur ukuran font */
      background-color: #0d6efd; /* Warna latar belakang dropdown */
      border-radius: 0;
    }
    .dropdown-item {
      color: white; /* Warna teks dropdown */
      padding: 5px 10px; /* Atur padding untuk setiap item */
    font-size: 0.9em; /* Atur ukuran font untuk setiap item */
    }
    .dropdown-item:hover {
      background-color: #1e90ff; /* Warna latar belakang saat hover */
      color: white;
    }
    .navbar {
  padding-top: 0.30rem !important;
  padding-bottom: 0.30rem !important;
}

.navbar-brand, .nav-link {
  font-size: 0.9em; /* Mengurangi ukuran font */
  line-height: 1.2; /* Mengurangi tinggi baris */
}

.nav-link {
  padding-top: 0.25rem; /* Mengurangi padding atas */
  padding-bottom: 0.25rem; /* Mengurangi padding bawah */
}
.bg-gray{
    background-color: #cccccc;
}
.PageTitle {
    color: #0293DB;
    font-size: 18px;
    font-weight: bold;
}

.container-fluid {
    padding-top: 0 !important; /* Hilangkan padding atas */
    padding-bottom: 0 !important; /* Hilangkan padding bawah */
    margin: 0 !important; /* Hilangkan margin */
}
.d-flex.align-items-center {
    margin-left: -10px; /* Geser ke kiri */
}

.navbar-brand {
    margin-left: -10px; /* Sesuaikan margin kiri */
}

.nav-link {
    margin-left: -10px; /* Sesuaikan margin kiri */
}
.d-flex-card {
    display: flex;
    justify-content: center; /* Menengahkan secara horizontal */
    align-items: center; /* Menengahkan secara vertikal */
    /* Menggunakan tinggi viewport untuk memastikan card berada di tengah halaman */
}
.PageTitle {
    color: #0293DB;
    font-size: 18px;
    font-weight: bold;
}
.SubHeaderBGAlt
{
  
	font-size: 11px;
	font-weight: bold;
	padding: 0px 4px;
	height: 22px;
	color:#FFFFFF;
	border-right: 1px solid #fff;
	background: url('back2 (1).gif')/* repeat-x center left*/;
}
.NormalBG
{
 
	background:#ffffff;
	border:none;
  color: black;
}

.AlternateBG 
{
  
	background: #e3ebef;
	border:none;
  color: black;
}
.GridStyle th, .GridStyle td {
    font-size: 0.75em; /* Sesuaikan ukuran font sesuai kebutuhan */
}
/* Menambahkan gaya hover pada tabel tr */
.GridStyle tr:hover {
    background-color: orange;
}
a.button {
    background: url(button.gif);
    display: block;
    color: #555555;
    font-weight: bold;
    height: 30px;
    line-height: 29px;
    text-decoration: none;
    width: 191px;
    text-align: center;
    font-size: 0.8em;
    display: inline-block;
  margin-right: 5px;
}
.button:hover {
  background: url(buttonhover.gif); /* ganti dengan gambar yang diinginkan */
  cursor: pointer;
  color:  #0d6efd;
  font-size: 0.8em;
  
}
.refresh {
    background: url(icq2.png) no-repeat 10px 8px;
    display: block;
   
}
a.button-off {
    background: url(buttonoff.gif);
    display: block;
    color: #555555;
    font-weight: bold;
    height: 30px;
    line-height: 29px;
    text-decoration: none;
    width: 191px;
    text-align: center;
    font-size: 0.8em;
    display: inline-block;
  margin-right: 5px;
}
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-submenu-right {
  position: absolute;
  top: 0;
  left: 100%;
  background-color:  #0d6efd;;
  
  padding: 10px;
  display: none;
  width: 250px;
}

.dropdown-submenu .dropdown-submenu-right li {
  margin-bottom: 10px;
}

.dropdown-submenu .dropdown-submenu-right li:last-child {
  margin-bottom: 0;
}

.dropdown-submenu .dropdown-submenu-right a {
  color: white;
  text-decoration: none;
}

.dropdown-submenu .dropdown-submenu-right a:hover {
  color: #ccc;
  text-decoration: none;
}

.dropdown-submenu:hover .dropdown-submenu-right {
  display: block;
}
.combo {
    font-family: "Courier New";
    font-size: 1em;
}
</style>

  </head>
<body>

<div class="d-flex align-items-center justify-content-between mt-1">
<img src="header.png" alt="Gambar 1" style="width: 1000px; height: auto; margin-right: 10px; margin-left : 10px;">
       
    </div>
   
    <nav class="navbar navbar-expand-lg navbar-main">
    <div class="container-fluid">
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Menu Navigasi -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <!-- Menu Utama -->
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Dashboard Classroom.php" style = "color: white">Home</a>
          </li>
          <!-- Dropdown Menu -->
          <li class="nav-item dropdown">
            <a  style = "color : white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="dropdown-submenu">
            <a class="dropdown-item" href="#">
   Biodata <img src="left_m.gif">
</a>
    <ul class="dropdown-menu dropdown-submenu-right">
    
      <li><a class="dropdown-item" href="data_update_biodata.php">Verifikasi Biodata</a></li>
      
    </ul>
  </li>
              <li><a class="dropdown-item" href = "data_mhswisuda.php">Update Data Wisuda</a></li>
              <li class="dropdown-submenu">
            <a class="dropdown-item" href="#">
   Lain-lain <img src="left_m.gif">
</a>
    <ul class="dropdown-menu dropdown-submenu-right">
    
      <li><a class="dropdown-item" href="ekivalensi.php">Ekivalensi</a></li>
      <li><a class="dropdown-item" href="rekap_ekivalensi.php">Rekapitulasi Ekivalensi</a></li>
      
    </ul>
  </li>
             
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a  style = "color : white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Laporan
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		
		
            <li class="dropdown-submenu">
            <a class="dropdown-item" href="#">
   Nilai <img src="left_m.gif">
</a>
    <ul class="dropdown-menu dropdown-submenu-right">
    
      <li><a class="dropdown-item" href="data_nilaimhs.php">Nilai Per Mahasiswa</a></li>
      <li><a class="dropdown-item" href="data_nilai_persem.php">Nilai Per Semester</a></li>
    </ul>
  </li>
  <li class="dropdown-submenu">
            <a class="dropdown-item" href="#">
   Transkrip <img src="left_m.gif">
</a>
    <ul class="dropdown-menu dropdown-submenu-right">
    
      <li><a class="dropdown-item" href="xrep_transkrip_utama.php">Transkrip</a></li>
      <li><a class="dropdown-item" href="xrep_transkrip_sementara.php">Transkrip Sementara</a></li>
    </ul>
  </li>
              <li><a class="dropdown-item" href="grafik_perkembangan_ipk_ips.php">Perkembangan IPK dan IPS</a></li>
              <li><a class="dropdown-item" href="xrep_cetak_khs.php">Kartu Hasil Studi (KHS)</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a  style = "color : white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Proses
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="list_frs.php">Formulir Rencana Studi</a></li>
            <li><a class="dropdown-item" href = "ipd_kuesionermk.php">Kuesioner Dosen dan MK</a></li>
              <li><a class="dropdown-item" href="data_kur.php">Kurikulum Semester</a></li>
              <li class="dropdown-submenu">
            <a class="dropdown-item" href="#">
   Mata Kuliah <img src="left_m.gif">
</a>
    <ul class="dropdown-menu dropdown-submenu-right">
    
      <li><a class="dropdown-item" href="list_prasyarat.php">MK Prasyarat</a></li>
      <li><a class="dropdown-item" href="list_peminatan.php">MK Peminatan</a></li>
    </ul>
  </li>
            
              <li><a class="dropdown-item" href = "kalenderpendidikan.php">Kalender Pendidikan ITS</a></li>
             
            </ul>
          </li>
         
          <li class="nav-item dropdown">
            <a  style = "color : white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Mahasiswa
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="list_mhsjadwal.php">Jadwal Kuliah Mhs</a></li>
              <li><a class="dropdown-item" href="data_akademikmhs.php">Akademik Mahasiswa</a></li>
              <li><a class="dropdown-item" href="ktm_virtual.php">KTM Virtual</a></li>
              <li><a class="dropdown-item" href="data_mhs.php">Biodata Mahasiswa</a></li>
              <li><a class="dropdown-item" href="data_kuliah.php">Perkuliahan Mahasiswa</a></li>
              <li><a class="dropdown-item" href="list_mhsmk.php">Daftar Mhs &amp; Matakuliah</a></li>
              <li><a class="dropdown-item" href="list_mhsstatang.php">Status Per Angkatan</a></li>
             
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a  style = "color : white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Lain-lain
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="css_bio_puas.php">Survei Kepuasan Mahasiswa</a></li>
             
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a  style = "color : white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Yudisium
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="yudisium_nilai_bahasa_asing.php">Unggah Nilai Bahasa Asing</a></li>
             
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a  style = "color : white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              SKPI
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="draft skpi.php">Draft SKPI</a></li>
              <li class="dropdown-submenu">
            <a class="dropdown-item" href="#">
  Panduan Pengguna <img src="left_m.gif">
</a>
    <ul class="dropdown-menu dropdown-submenu-right">
    
      <li><a class="dropdown-item" href="download\panduan_umum_pengisian_skpi.pdf">Panduan Umum (pdf)</a></li>
      <li><a class="dropdown-item" href="download\user_manual_skpi_akad_mhs_v01.pdf">Sebagai Mahasiswa</a></li>
    </ul>
  </li>
             
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a  style = "color : white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Biaya Pendidikan
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="data_histori_pembayaran.php">Historis Pembayaran SPP</a></li>
              <li><a class="dropdown-item" href="data_tagihan_pendidikan.php">Tagihan Biaya Pendidikan</a></li>
              
              <li><a class="dropdown-item" href="data_pembayaran_wisuda.php">Pembayaran Wisuda</a></li>
           

             
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a  style = "color : white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Surat Mahasiswa
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="surat_mahasiswa.php">Layanan Surat Mahasiswa</a></li>
              <li><a class="dropdown-item" href="download\panduan_layanan_surat_mahasiswa.pdf">Panduan Layanan (PDF)</a></li>
           
           

             
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a  style = "color : yellow;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Keluar
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="https://my.its.ac.id">Kembali Ke Menu</a></li>
            <li><a style = "color: yellow;" class="dropdown-item" href="https://my.its.ac.id/logout?logout_request_id=1eaf03b2-1a41-4889-b540-db5e83af2a39">Logout</a></li>
            </ul>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>





  <table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
					
<tr height="20" style="font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 8pt; background-color:#ece9d8; ">
	<td nowrap="" style="padding-left:5">
  <?php
                date_default_timezone_set('Asia/Jakarta'); // Ganti dengan zona waktu yang sesuai
                ?>
		Periode: Semester Genap 2024/2025		Tanggal:   <?php echo date('D, d M Y H:i:s' . ' +0700'); ?> 	</td>
	
		
	
  	<td align="right" nowrap="" style="padding-right:5;color:#666;padding-right:5px">
    <?php
function tampilkan_id() {
    date_default_timezone_set('Asia/Jakarta'); // Ganti dengan zona waktu yang sesuai
    $jam = date('H'); // Ambil jam saat ini

    if ($jam >= 6 && $jam < 12) { // Pagi (06:00 - 11:59)
        return 'n135';
    } elseif ($jam >= 12 && $jam < 18) { // Siang sampai sore (12:00 - 17:59)
        return 'n134';
    } else { // Malam (18:00 - 05:59)
        return 'n137';
    }
}


?>
    		<b>[<?php echo tampilkan_id(); ?>] User ID: </b>5033241070, Wendy Achmad Fahrezi &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 		<b>Hak Akses:</b> 
	
	
        
        <select id="sRoles" name="sRoles" class="comboSmallStyle" onchange="do_changeRoles();" style="width:100px">
	<option value="">- Pilih Hak Akses -</option>
	<option value="10" selected="">Mahasiswa</option>
  <option value="20" >Admin TU</option>
	</select>

	<select id="sFak" name="sFak" class="comboSmallStyle" onchange="do_changeFak()" style="width:100px;background-color:#ff80ff">
	<option value="">- Pilih Fakultas -</option>
	<option value="9" selected="" style="background-color:#ff80ff">CREABIZ</option>
	</select>

	<select id="sJur" name="sJur" class="comboSmallStyle" onchange="do_changeUnit()" style="background-color:#cccccc">
	<option value="">- Pilih Prodi -</option>
	<option value="93100" selected="" style="background-color:#cccccc">93100 - 09314000 - S-1 STUDI PEMBANGUNAN</option>
	</select>

	</td>
	
</tr>
</tbody></table>


<div class = "mt-3">

<h6 style = "text-align : center; "><b class  = "PageTitle">Data Nilai Kuliah Per Mahasiswa</b></h6>
<div class="container d-flex justify-content-center">
<div class="container d-flex justify-content-center font-custom">
<div class="bg-header text-black p-3" style="width: 29%; margin: auto; border: 1px solid #d2d2d2; ">
  <table style="width: 100%; border: none; ">
    <tr>
      <td style="text-align: left; border: none;"><b>Mahasiswa :</b></td>
      <td style="text-align: left; border: none;"> 5033241070 - Wendy Achmad Fahrezi</td>
    </tr>
   
  </table>
</div>
</div>
</div>




<div class="container d-flex-card justify-content-center align-items-center mt-2" > 

<table border="0" cellspacing="0" cellpadding="3" class="GridStyle">
	<tbody style = "width: 490px"><tr>
		<td align="center" class="SubHeaderBGAlt" colspan="3">Perkuliahan pada: <font size="2" color="#FFFF99">2024/GASAL</font></td>
			</tr>
	<tr>
		<td width="390" align="center" class="SubHeaderBGAlt">Mata Kuliah</td>
		<td width="40" align="center" class="SubHeaderBGAlt">Kelas</td>
		<td width="40" align="center" class="SubHeaderBGAlt">Nilai</td>
			</tr>
      <?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt1, nilai_huruf, total_nilai FROM table_smt1 WHERE id = 1");
      foreach ($table_smt1 as $row) {
    ?>
	<tr valign="top" class="AlternateBG">
		<td>DB234105 - Berpikir Desain untuk Inovasi (2 sks) </td>
				<td align="center">J</td>
				<td align="center"><?php echo $row['nilai_huruf']; ?></td>
			</tr>
       <?php
  }
  ?>
  <?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt1, nilai_huruf, total_nilai FROM table_smt1 WHERE id = 4");
      foreach ($table_smt1 as $row) {
    ?>
	<tr valign="top" class="NormalBG">
		<td>DS234103 - Dasar-dasar Ilmu Politik (2 sks) </td>
				<td align="center">A</td>
				<td align="center"><?php echo $row['nilai_huruf']; ?></td>
			</tr>
       <?php
  }
  ?>

  <?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt1, nilai_huruf, total_nilai FROM table_smt1 WHERE id = 7");
      foreach ($table_smt1 as $row) {
    ?>
	<tr valign="top" class="AlternateBG">
		<td>DS234107 - Demografi (2 sks) </td>
				<td align="center">A</td>
				<td align="center"><?php echo $row['nilai_huruf']; ?></td>
			</tr>
       <?php
  }
  ?>
	<tr valign="top" class="NormalBG">
		<td>SM234152 - Matematika  (2 sks) </td>
				<td align="center">2</td>
        <?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt1, nilai_huruf, total_nilai FROM table_smt1 WHERE id = 8");
      foreach ($table_smt1 as $row) {
    ?>
				<td align="center"> <?php echo $row['nilai_huruf']; ?></td>
			</tr>
      <?php
  }
  ?>
	<tr valign="top" class="AlternateBG">
		<td>DS234106 - Pemikiran Ekonomi (2 sks) </td>
				<td align="center">A</td>
         <?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt1, nilai_huruf, total_nilai FROM table_smt1 WHERE id = 6");
      foreach ($table_smt1 as $row) {
    ?>
				<td align="center"><?php echo $row['nilai_huruf']; ?></td>
			</tr>
        <?php
  }
  ?>
	<tr valign="top" class="NormalBG">
		<td>DS234105 - Pengantar Administrasi Publik (2 sks) </td>
				<td align="center">A</td>
         <?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt1, nilai_huruf, total_nilai FROM table_smt1 WHERE id = 5");
      foreach ($table_smt1 as $row) {
    ?>
				<td align="center"><?php echo $row['nilai_huruf']; ?> </td>
			</tr>
        <?php
  }
  ?>
	<tr valign="top" class="AlternateBG">
		<td>DS234102 - Pengantar Sosiologi dan Antropologi (3 sks) </td>
				<td align="center">A</td>
				<td align="center">B </td>
			</tr>
	<tr valign="top" class="NormalBG">
		<td>DS234101 - Pengantar Studi Pembangunan (3 sks) </td>
				<td align="center">A</td>
				<td align="center">AB</td>
			</tr>
</tbody></table>
</div>




<div class="container d-flex-card justify-content-center align-items-center mt-2" > 

<table border="0" cellspacing="0" cellpadding="3" class="GridStyle" id="tabel">
	<tbody style = "width: 490px"><tr>
		<td align="center" class="SubHeaderBGAlt" colspan="3">Perkuliahan pada: <font size="2" color="#FFFF99">2024/GENAP</font></td>
			</tr>
	<tr>
		<td width="390" align="center" class="SubHeaderBGAlt">Mata Kuliah</td>
		<td width="40" align="center" class="SubHeaderBGAlt">Kelas</td>
		<td width="40" align="center" class="SubHeaderBGAlt">Nilai</td>
			</tr>
      <?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt2, nilai_huruf, total_nilai FROM table_smt2 WHERE id = 3");
      foreach ($table_smt1 as $row) {
    ?>
      <tr valign="top" class="AlternateBG">
		<td>DS234210 - 	Dasar-dasar Komunikasi (2 sks)</td>
				<td align="center" >A</td>
				<td align="center" ><?php echo $row['nilai_huruf']; ?></td>
			</tr>
       <?php
  }
  ?>

  <?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt2, nilai_huruf, total_nilai FROM table_smt2 WHERE id = 2");
      foreach ($table_smt1 as $row) {
    ?>
      <tr valign="top" class="NormalBG">
		<td>DS234209 - Ekonomi Mikro (2 sks)</td>
				<td align="center" >A</td>
				<td align="center" ><?php echo $row['nilai_huruf']; ?></td>
			</tr>
       <?php
  }
  ?>

  <?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt2, nilai_huruf, total_nilai FROM table_smt2 WHERE id = 8");
      foreach ($table_smt1 as $row) {
    ?>
      <tr valign="top" class="AlternateBG">
		<td>DS234215 - Geografi Pembangunan (3 sks)</td>
				<td align="center">A</td>
				<td align="center"><?php echo $row['nilai_huruf']; ?></td>
			</tr>
       <?php
  }
  ?>

<?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt2, nilai_huruf, total_nilai FROM table_smt2 WHERE id = 1");
      foreach ($table_smt1 as $row) {
    ?>
	<tr valign="top" class="NormalBG">
		<td>DS234208 - Pengantar Ilmu Lingkungan (2 sks)</td>
				<td align="center">A</td>
				<td align="center"><?php echo $row['nilai_huruf']; ?></td>
			</tr>
       <?php
  }
  ?>

<?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt2, nilai_huruf, total_nilai FROM table_smt2 WHERE id = 5");
      foreach ($table_smt1 as $row) {
    ?>
      <tr valign="top" class="AlternateBG">
		<td>DS234212 - Sistem Hukum Indonesia (2 sks)</td>
				<td align="center" >A</td>
				<td align="center"><?php echo $row['nilai_huruf']; ?></td>
			</tr>
         <?php
  }
  ?>

  <?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt2, nilai_huruf, total_nilai FROM table_smt2 WHERE id = 7");
      foreach ($table_smt1 as $row) {
    ?>
      <tr valign="top" class="NormalBG">
		<td>DS234214 - Sosiologi Pembangunan (3 sks)</td>
				<td align="center" >A</td>
				<td align="center" ><?php echo $row['nilai_huruf']; ?></td>
			</tr>
        <?php
  }
  ?>


<?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt2, nilai_huruf, total_nilai FROM table_smt2 WHERE id = 6");
      foreach ($table_smt1 as $row) {
    ?>
	<tr valign="top" class="AlternateBG">
		<td>DS234213 - Statistik Deskriptif (2 sks)</td>
				<td align="center" >A</td>
				<td align="center" ><?php echo $row['nilai_huruf']; ?></td>
			</tr>
       <?php
  }
  ?>
	
  <?php
  // Contoh penggunaan fungsi select
  $table_smt1 = select("SELECT kode_mk, nama_mk, sks_smt2, nilai_huruf, total_nilai FROM table_smt2 WHERE id = 4");
      foreach ($table_smt1 as $row) {
    ?>
	<tr valign="top" class="NormalBG">
		<td> DS234211 - TIK dalam Pembangunan (2 sks)</td>
				<td align="center">A</td>
				<td align="center"><?php echo $row['nilai_huruf']; ?></td>
			</tr>
       <?php
  }
  ?>
	
	

</tbody></table>
</div>



<script>
  function do_changeRoles() {
  var hakAkses = document.getElementById("sRoles").value;
  var formNilai = document.getElementById("form-nilai");
  
  if (hakAkses == "20") {
    // Tampilkan form jika hak akses adalah Admin TU
    formNilai.style.display = "block";
  } else {
    // Sembunyikan form jika hak akses bukan Admin TU
    formNilai.style.display = "none";
  }
}

// Jalankan fungsi do_changeRoles() saat halaman dimuat
window.onload = do_changeRoles;
  // Fungsi untuk mendisable input dan fungsi onclick
function disableInputOnclick() {
  // Dapatkan tanggal saat ini
  var tanggalSaatIni = new Date();
  
  // Tanggal yang diinginkan untuk meng-enable input dan fungsi onclick
  var tanggalTarget = new Date('2025-02-02T00:00:00');
  
  // Periksa apakah tanggal saat ini sudah melebihi tanggal target
  if (tanggalSaatIni < tanggalTarget) {
    // Mendisable input
    document.getElementById('mata-kuliah').disabled = true;
    document.getElementById('nilai').disabled = true;
    document.getElementById('save').disabled = true;
    document.getElementById('finalisasi-nilai').disabled = true;
    document.getElementById('reset-nilai').disabled = true;
    
    // Menonaktifkan fungsi onclick
    document.getElementById('save').onclick = function() {
      alert(' Belum saatnya untuk mengisi nilai evaluasi.');
    };
    document.getElementById('finalisasi-nilai').onclick = function() {
      alert('Finalisasi belum bisa dilakukan.');
    };
    document.getElementById('reset-nilai').onclick = function() {
      alert('Reset nilai belum bisa dilakukan.');
    };
  } else {
    // Meng-enable input
    document.getElementById('mata-kuliah').disabled = false;
    document.getElementById('nilai').disabled = false;
    document.getElementById('save').disabled = false;
    document.getElementById('finalisasi-nilai').disabled = false;
    document.getElementById('reset-nilai').disabled = false;
    
    // Meng-enable fungsi onclick
    document.getElementById('save').onclick = saveData;
    document.getElementById('finalisasi-nilai').onclick = finalisasiNilai;
    document.getElementById('reset-nilai').onclick = resetNilai;
  }
}

// Jalankan fungsi pada saat halaman dimuat
window.onload = disableInputOnclick;
</script>



<script>
var currentMataKuliah = 1;

function saveData() {
  // Ambil nilai dari form
  var nilai = document.getElementById("nilai").value;

  // Ambil tabel
  var tabel = document.getElementById("tabel");

  // Update tabel
  for (var i = 1; i < tabel.rows.length; i++) {
    if (tabel.rows[i].cells[2].id == "nilai_" + currentMataKuliah) {
      tabel.rows[i].cells[2].innerHTML = nilai;
      localStorage.setItem("nilai_" + currentMataKuliah, nilai);
      break; // tambahkan break untuk menghentikan loop
    }
  }

  // Kosongkan form
  document.getElementById("nilai").value = "";

  // Berlanjut ke mata kuliah selanjutnya
  currentMataKuliah++;
  if (currentMataKuliah <= 8) {
    // Tidak perlu melakukan apa-apa karena mata kuliah tidak dapat diubah
  } else {
    alert("Semua mata kuliah telah diisi");
    document.getElementById("finalisasi-nilai").style.display = "block";
  }
}

// Load nilai dari localStorage
for (var i = 1; i <= 8; i++) {
  var nilai = localStorage.getItem("nilai_" + i);
  if (nilai != null) {
    document.getElementById("tabel").rows[i+1].cells[2].innerHTML = nilai; // tambahkan +1 untuk mengakses baris yang benar
  }
}

// Fungsi finalisasi nilai
function finalisasiNilai() {
  // Lakukan proses finalisasi nilai
  alert("Nilai telah difinalisasi");
  // Redirect ke halaman lain
  window.location.href = "data_nilaimhs.php";
}
</script>
<script>
// Ambil tabel
var tabel = document.getElementById("tabel");

// Buat header tabel tidak dapat diubah
for (var i = 0; i < tabel.rows.length; i++) {
  if (tabel.rows[i].cells[0].className == "SubHeaderBGAlt") {
    tabel.rows[i].cells[0].contentEditable = "false";
    tabel.rows[i].cells[1].contentEditable = "false";
    tabel.rows[i].cells[2].contentEditable = "false";
  }
}

// Buat tabel dengan class AlternateBG dan NormalBG dapat diubah
for (var i = 1; i < tabel.rows.length; i++) {
  if (tabel.rows[i].cells[0].className == "AlternateBG" || tabel.rows[i].cells[0].className == "NormalBG") {
    tabel.rows[i].cells[1].contentEditable = "true";
    tabel.rows[i].cells[2].contentEditable = "true";
  }
}
</script>

<script>
 // Ambil tabel
var tabel = document.getElementById("tabel");
var finalisasi = localStorage.getItem("finalisasi") === "true";

// Fungsi finalisasi nilai
function finalisasiNilai() {
  if (confirm("Sebelum finalisasi nilai pastikan seluruh nilai sudah terinput. Apakah Anda yakin ingin memfinalisasi nilai?")) {
    alert("Nilai telah difinalisasi");
    localStorage.setItem("finalisasi", "true");
    finalisasi = true;
    document.getElementById("mata-kuliah").disabled = true;
    document.getElementById("nilai").disabled = true;
    document.getElementById("save").disabled = true;
    document.getElementById("finalisasi-nilai").disabled = true;
  }
}

// Fungsi reset nilai
function resetNilai() {
  if (confirm("Apakah Anda yakin ingin menghapus seluruh nilai?")) {
    for (var i = 1; i <= 8; i++) {
      localStorage.removeItem("nilai_" + i);
      document.getElementById("tabel").rows[i+1].cells[2].innerHTML = "_";
    }
    localStorage.removeItem("finalisasi");
    document.getElementById("mata-kuliah").disabled = false;
    document.getElementById("nilai").disabled = false;
    document.getElementById("save").disabled = false;
    document.getElementById("finalisasi-nilai").disabled = false;
  }
}

// Periksa status finalisasi nilai
if (finalisasi) {
  alert("Nilai sudah difinalisasi dan tidak diperkenankan mengubah data. Jika ingin mengubah data, klik Reset Nilai.");
  document.getElementById("mata-kuliah").disabled = true;
  document.getElementById("nilai").disabled = true;
  document.getElementById("save").disabled = true;
  document.getElementById("finalisasi-nilai").disabled = true;
}
</script>
<script>
  function saveData() {
  var nilai = document.getElementById("nilai").value;
  var idNilai = document.getElementById("mata-kuliah").value;
  document.getElementById(idNilai).innerHTML = nilai;
  localStorage.setItem(idNilai, nilai);
  document.getElementById("nilai").value = "";
  document.getElementById("mata-kuliah").value = "";
}</script>
<script type = "text/javascript">
  document.querySelectorAll('.table tr').forEach(row => {
    row.addEventListener('click', function() {
        // Menghapus warna oranye dari semua sel
        document.querySelectorAll('.table td').forEach(cell => cell.style.backgroundColor = '');
        // Mengubah warna latar belakang sel yang ditekan
        this.querySelectorAll('td').forEach(cell => cell.style.backgroundColor = 'orange');
    });

    // Menambahkan event listener untuk mouseover
    row.addEventListener('mouseover', function() {
        this.querySelectorAll('td').forEach(cell => cell.style.backgroundColor = 'orange');
    });

    // Menambahkan event listener untuk mouseout
    row.addEventListener('mouseout', function() {
        // Hanya menghapus warna oranye jika baris tidak ditekan
        if (!this.classList.contains('active')) {
            this.querySelectorAll('td').forEach(cell => cell.style.backgroundColor = '');
        }
    });
});
</script>

<br>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>