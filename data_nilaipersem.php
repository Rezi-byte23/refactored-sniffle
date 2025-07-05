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
    <title>[SIAKAD-SP] Nilai Per Semester </title>
    <link rel = "icon" type = "image" href = "favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      
      .combo {
    font-family: "Courier New";
    font-size: 0.95em;
}
body {
 /* Atur lebar body */
 background-color: #ffffff; 
  flex: 1;
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size: 0.9em;
    margin: 0; /* Hapus margin default */
    padding: 0; 
    overflow-x : hidden;
}
.card {
    width: 80px; /* Kecilkan ukuran card */
    margin-bottom: 10px;
    border: none;
}

.table {
    font-size: 0.77em; /* Kecilkan ukuran font di dalam tabel */
    width: 100%; /* Kecilkan lebar tabel */
    margin: 0; 
    border-bottom: 0.3px solid  #e3ebef;;
    height: 10px;
}
.bg-custom-footer{
  background: #e3ebef;
  font-size: 0.8em;
  margin-bottom: 10px;
}
.table tr:nth-child(even) td {
  background: #e3ebef;
}

.table tr:nth-child(odd) {
    background-color: #ffffff;
    border-bottom: 0.3px solid  #ffffff; /* Warna putih untuk baris ganjil */
}

        .card-header {
            padding: 5px; /* Kurangi padding pada header card */
            text-align: center;
        }

        .text-start {
          margin-left: 5px; /* Kurangi margin kiri pada teks */
        }
     
        .bg-dodger-blue {
        background-color: dodgerblue; /* Warna Dodger Blue */
        color: white; /* Warna teks putih untuk kontras */
    }
    /* Tambahkan border pada sel */
    
    .table th {
      border-bottom: 1px solid #ddd;
       vertical-align: middle;
    padding: 5px; /* Mengurangi padding untuk mengurangi ketinggian sel */
   
}
    .table th, .table td {
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
        background-color: #ff80ff; /* Warna ungu */
        color: black; /* Warna teks putih untuk kontras */
       
    }
    .bg-custom {
    background-color: #ece9d8; /* Warna abu-abu */
    padding-top: 0.30rem !important;
  padding-bottom: 0.30rem !important;
}


      
.table td {
   
    vertical-align: middle; /* Menempatkan teks di tengah secara vertikal */
}

.bg-header{
  background-color: #e3ebef;
  border-top: none;
}
.table th{
  background-color: rgb(221,221,221)
}
.font-custom{
  font-size: 0.75em;
  font-weight: normal;
}

.navbar-main {
  color: #ffffff;
    background-image: url('back2 (2).gif');
  border: none;
 
  font-size: 1.1em;
  font-weight: bold;
 
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
.d-flex-card {
    display: flex;
    justify-content: center; /* Menengahkan secara horizontal */
    align-items: center; /* Menengahkan secara vertikal */
    /* Menggunakan tinggi viewport untuk memastikan card berada di tengah halaman */
}
.navbar-custom {
    padding-top: 0 !important; /* Hilangkan padding atas */
    padding-bottom: 0 !important; /* Hilangkan padding bawah */
    margin: 0 !important; /* Hilangkan margin */
    align-items: flex-start !important; /* Mepet ke atas */
}

.navbar-brand, .nav-link, .navbar-text {
    font-size: 0.8em !important; /* Kurangi ukuran font */
    line-height: 1 !important; /* Kurangi line height */
    padding-top: 0 !important; /* Hilangkan padding atas */
    padding-bottom: 0 !important; /* Hilangkan padding bawah */
    margin: 0 !important; /* Hilangkan margin */
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
.PageTitle {
    color: #0293DB;
    font-size: 18px;
    font-weight: bold;
}
.NormalBG
{
	background:#ffffff;
	border:none;
  color: black;
  border-bottom : none;

}
.NormalBG td {
  border-bottom: none;
}
.AlternateBG 
{
	background: #e3ebef;
	border:none;
  color: black;
 
}
.ComboSmallStyle {
    font-size: 5pt;
    font-family: tahoma;
}
.table th, .table td {
  padding: 2px; /* Mengurangi padding untuk mengurangi ketinggian sel */
  line-height: 1.29; /* Mengurangi line height untuk mengurangi ketinggian sel */
  
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
.overlay {
 
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1;
}

#confirm-finalisasi {
  z-index: 2;
}
#tidak-finalisasi {
  margin-left: 10px;
}
hr {
    display: block;
    margin-block-start: 0.5em;
    margin-block-end: 0.5em;
    margin-inline-start: auto;
    margin-inline-end: auto;
    unicode-bidi: isolate;
    overflow: hidden;
    overflow-x: ;
    overflow-y: ;
    border-style: inset;
    border-top-style: ;
    border-right-style: ;
    border-bottom-style: ;
    border-left-style: ;
    border-width: 1px;
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
					
<tr height="20"style="font-family: Verdana, Arial, Helvetica, sans-serif;
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
	
	
        
        <select id="sRoles" name="sRoles" class="comboSmallStyle" onchange="tampilkanTabelEdit()" style="width:100px">
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
 



<div class = "mt-2">

<h6 style = "text-align : center;color :#1E90FF "><b class = "PageTitle">Data Nilai Per Semester </b></h6>
<div class="container d-flex justify-content-center font-custom">
<div class="bg-header text-black p-3" style="width: 29%; margin: auto;  border: 1px solid #d2d2d2; ">
  <table style="width: 100%; border: none; ">
    <tr>
      <td style="text-align: left; border: none;"><b>Mahasiswa</b></td>
      <td style="text-align: left; border: none;">: 5033241070 - Wendy Achmad Fahrezi</td>
    </tr>
   
  </table>
</div>
</div>
</div>





  
<div class="container d-flex-card justify-content-center align-items-center mt-3" >
<div class = "GridStyle"  id="tabelGanjil" > 
  <div class="card" style="width: 640px; "> <!-- Menambahkan lebar card -->
  
    <div class="text-start" style="margin-left: 0px;">
    <table class="table"  id="tabelGanjil"  style="margin-bottom: 0;">
        <thead class="bg-primary text-white">
          <tr>
            <th colspan="6" style="text-align: center;border-bottom:1px solid #ccc">2024 - Gasal<em style = "font-weight: normal;">/Odd</em></th>
          </tr>
          <tr>
            <th style="width: 10%;text-align: center; ">Kode<br>
          <em style = "font-weight: normal;">Code</em></th>
            <th style="width: 20%; text-align: center;">Mata Kuliah<br>
            <em style = "font-weight: normal;">Subject</em></th>
            <th style="width: 10%; text-align: center;">SKS<br>
            <em style = "font-weight: normal;">Credit</em></th>
            <th style=" width: 10%; text-align: center;">N. Huruf<br>
            <em style = "font-weight: normal;">Grade</em></th>
            <th style="text-align: center;font-weight: normal;width: 10%;">S*N</th>
        
          </tr>
        </thead>
        <tbody>
        <?php
// Ambil data dari database
$table_smt1 = select("SELECT kode_mk, nama_mk, mk_english, sks_smt1, nilai_huruf, total_nilai FROM table_smt1");


// Jika data tidak ada, maka isi dengan data default

// Loop untuk menampilkan data
foreach ($table_smt1 as $index => $row) {
    // Tentukan class berdasarkan indeks (ganjil atau genap)
    $class = ($index % 2 == 0) ? 'AlternateBG' : 'NormalBG';
    ?>
    <tr valign="top" class="<?php echo $class; ?>">
        <td><?php echo $row['kode_mk']; ?></td>
        <td><?php echo $row['nama_mk']; ?> <br>
      <em> <?php echo $row ['mk_english']; ?> </em></td>
        <td align="center"><?php echo $row['sks_smt1']; ?></td>
        <td align="center"><?php echo $row['nilai_huruf']; ?></td>
        <td align="right"><?php echo $row['total_nilai']; ?></td>
     
      
     
       
      
    </tr>
<?php
}
?>
</tbody>
      </table>
     
</div>
  
  </div>
</div>



</div>
<div class="bg-header text-black" style="width: 11%;margin: auto;font-size: 0.77em; margin-top: -10px; padding-top: 0; border-top:  #e3ebef;">
  <table style="width: 100%; border: none;  ">
    <tr>
      <th style="text-align: right; border: none;">Jumlah SKS<br>
      <em style = "font-weight: normal;">Total of Credits</em>
      </th>
      <?php
$total_sks = 0;
foreach ($table_smt1 as $row) {
    $total_sks += $row['sks_smt1'];
}
?>
      <td style="text-align: right; border: none;"> <span style = "margin-right: 2px;"><?php echo $total_sks; ?> SKS</span></td>
    </tr>
    <tr>
      <th style="text-align: right; border: none;">IPS<br>
      <em style = "font-weight: normal;">GPA</em> </th>
      <?php
      function hitung_nilai_keseluruhansmt1($nilai_huruf, $sks_smt1) {
  $nilai_angka = array(
    'A' => 4.0,
    'AB' => 3.5,
    'B' => 3.0,
    'BC' => 2.5,
    'C' => 2.0,
    'D' => 1.0,
    'E' => 0.0
  );
  $total_nilai = 0;
  $total_sks = 0;
  foreach ($nilai_huruf as $row) {
    $nilai = $nilai_angka[$row['nilai_huruf']];
    $total_nilai += $nilai * $row['sks_smt1'];
    $total_sks += $row['sks_smt1'];
  }
  $nilai_keseluruhansmt1 = $total_nilai / $total_sks;
  return $nilai_keseluruhansmt1;
}
     
?>
      <td style="text-align: right; border: none;  "> <span style = "margin-right: 2px;"><?php echo number_format(hitung_nilai_keseluruhansmt1($table_smt1, $total_sks), 2); ?></span></td>
    </tr>
    
  </table>
</div>


<br>
<div class="container d-flex-card justify-content-center align-items-center" >
<div class = "GridStyle"  id="tabelGanjil" > 
  <div class="card" style="width: 640px;  "> <!-- Menambahkan lebar card -->
  
    <div class="text-start" style="margin-left: 0px;">
    <table class="table"  id="tabelGanjil"  style="margin-bottom: 0;">
        <thead class="bg-primary text-white">
          <tr>
            <th colspan="6" style="text-align: center; border-bottom:1px solid #ccc">2024 - Genap<em style = "font-weight: normal;">/Even</em></th>
          </tr>
          
          <tr>
            <th style="width: 10%;text-align: center; ">Kode<br>
          <em style = "font-weight: normal;">Code</em></th>
            <th style="width: 20%; text-align: center;">Mata Kuliah<br>
            <em style = "font-weight: normal;">Subject</em></th>
            <th style="width: 10%; text-align: center;">SKS<br>
            <em style = "font-weight: normal;">Credit</em></th>
            <th style="text-align: center; width: 10%;">N. Huruf<br>
            <em style = "font-weight: normal;">Grade</em></th>
            <th style="text-align: center;font-weight: normal;width: 10%;">S*N</th>
                <th id="tabelEdit" style="text-align: center;font-weight: normal;width: 10%; display : none;">Edit</th>
          </tr>
        </thead>
        <tbody>
     

         <?php
// Ambil data dari database
$table_smt2 = select("SELECT kode_mk, nama_mk, mk_english, sks_smt2, nilai_huruf, total_nilai FROM table_smt2");


// Jika data tidak ada, maka isi dengan data default

// Loop untuk menampilkan data
foreach ($table_smt2 as $index => $row) {
    // Tentukan class berdasarkan indeks (ganjil atau genap)
    $class = ($index % 2 == 0) ? 'AlternateBG' : 'NormalBG';
    ?>
    <tr valign="top" class="<?php echo $class; ?>">
        <td><?php echo $row['kode_mk']; ?></td>
        <td><?php echo $row['nama_mk']; ?> <br>
      <em> <?php echo $row ['mk_english']; ?> </em></td>
        <td align="center"><?php echo $row['sks_smt2']; ?> </td>
        <td align="center"><?php echo $row['nilai_huruf']; ?></td>
        <td align="right"><?php echo $row['total_nilai']; ?></td>
        <td align="center" id = tabelEdit style = "display : none;">
        <a href="edit_nilai.php?kode=<?php echo $row['kode_mk']; ?>" onclick="tampilkanPopUp('edit_nilai.php?kode=<?php echo $row['kode_mk']; ?>', 'Edit FRS', 600, 800);return false;">
        <i class="fa fa-edit"></i>
    </a>
</td>
     
       
      
    </tr>
<?php
}
?>
</tbody>
      </table>
     
</div>
  
  </div>
</div>



</div>
<div class="bg-header text-black" style="width: 11%;margin: auto;font-size: 0.77em; margin-top: -10px; padding-top: 0; ">
  <table style="width: 100%; border: none;  ">
    <tr>
      <th style="text-align: right; border: none;">Jumlah SKS<br>
      <em style = "font-weight: normal;">Total of Credits</em>
      </th>
      <?php
$total_sks = 0;
foreach ($table_smt2 as $row) {
    $total_sks += $row['sks_smt2'];
}
?>
      <td style="text-align: right; border: none;"> <span  style = "margin-right: 2px;"><?php echo $total_sks; ?> SKS</span></td>
    </tr>
    <tr>
      <th style="text-align: right; border: none;">IPS<br>
      <em style = "font-weight: normal;">GPA</em> </th>
       <?php
      function hitung_nilai_keseluruhansmt2($nilai_huruf, $sks__smt2) {
  $nilai_angka = array(
    'A' => 4.0,
    'AB' => 3.5,
    'B' => 3.0,
    'BC' => 2.5,
    'C' => 2.0,
    'D' => 1.0,
    'E' => 0.0,
    '-' => 0.0,
    '_' => 0.0
);
  $total_nilai = 0;
  $total_sks = 0;
  foreach ($nilai_huruf as $row) {
    $nilai = $nilai_angka[$row['nilai_huruf']];
    $total_nilai += $nilai * $row['sks_smt2'];
    $total_sks += $row['sks_smt2'];
  }
  $nilai_keseluruhansmt2 = $total_nilai / $total_sks;
  return $nilai_keseluruhansmt2;
}
     
?>
      <td style="text-align: right; border: none;  "> <span style = "margin-right: 2px;" ><?php echo number_format(hitung_nilai_keseluruhansmt2($table_smt2, $total_sks), 2); ?></span></td>
    </tr>
    
  </table>
</div>

<br>
<div class="container d-flex-card justify-content-center align-items-center" >
<div class = "GridStyle"  id="tabelGanjil" > 
  <div class="card" style="width: 640px;  "> <!-- Menambahkan lebar card -->
  
    <div class="text-start" style="margin-left: 0px;">
    <table class="table"  id="tabelGanjil"  style="margin-bottom: 0;">
        <thead class="bg-primary text-white">
          <tr>
            <th colspan="5" style="text-align: center; border-bottom:1px solid #ccc">2025 - Ganjil<em style = "font-weight: normal;">/Odd</em></th>
          </tr>
          
          <tr>
            <th style="width: 10%;text-align: center; ">Kode<br>
          <em style = "font-weight: normal;">Code</em></th>
            <th style="width: 20%; text-align: center;">Mata Kuliah<br>
            <em style = "font-weight: normal;">Subject</em></th>
            <th style="width: 10%; text-align: center;">SKS<br>
            <em style = "font-weight: normal;">Credit</em></th>
            <th style="text-align: center; width: 10%;">N. Huruf<br>
            <em style = "font-weight: normal;">Grade</em></th>
            <th style="text-align: center;font-weight: normal;width: 10%;">S*N</th>
            
          </tr>
        </thead>
        <tbody>
     
<?php
// Ambil data dari database
$table_smt3 = select("SELECT kode_mk, nama_mk, mk_english, sks_smt3, nilai_huruf, total_nilai FROM table_smt3");


// Jika data tidak ada, maka isi dengan data default

// Loop untuk menampilkan data
foreach ($table_smt3 as $index => $row) {
    // Tentukan class berdasarkan indeks (ganjil atau genap)
    $class = ($index % 2 == 0) ? 'AlternateBG' : 'NormalBG';
    ?>
    <tr valign="top" class="<?php echo $class; ?>">
        <td><?php echo $row['kode_mk']; ?></td>
        <td><?php echo $row['nama_mk']; ?> <br>
      <em> <?php echo $row ['mk_english']; ?> </em></td>
        <td align="center"><?php echo $row['sks_smt3']; ?> </td>
        <td align="center"><?php echo $row['nilai_huruf']; ?></td>
        <td align="right"><?php echo $row['total_nilai']; ?></td>
       
      
     
       
      
    </tr>
<?php
}
?>

        </tbody>
      </table>
     
</div>
  
  </div>
</div>



</div>
<div class="bg-header text-black" style="width: 11%;margin: auto;font-size: 0.77em; margin-top: -10px; padding-top: 0; ">
  <table style="width: 100%; border: none;  ">
    <tr>
      <th style="text-align: right; border: none;">Jumlah SKS<br>
      <em style = "font-weight: normal;">Total of Credits</em>
      </th>
  <?php
$total_sks = 0;
foreach ($table_smt3 as $row) {
    $total_sks += $row['sks_smt3'];
}
?>
      <td style="text-align: right; border: none;"> <span  style = "margin-right: 2px;"><?php echo $total_sks; ?> SKS</span></td>
    </tr>
    <tr>
      <th style="text-align: right; border: none;">IPS<br>
      <em style = "font-weight: normal;">GPA</em> </th>
 <?php
    function hitung_nilai_keseluruhansmt3($nilai_huruf, $sks__smt3) {
    $nilai_angka = array(
        'A' => 4.0,
        'AB' => 3.5,
        'B' => 3.0,
        'BC' => 2.5,
        'C' => 2.0,
        'D' => 1.0,
        'E' => 0.0,
        '-' => 0.0
    );
    $total_nilai = 0;
    $total_sks = 0;
    foreach ($nilai_huruf as $row) {
        $nilai = $nilai_angka[$row['nilai_huruf']] ?? 0;
        $total_nilai += $nilai * $row['sks_smt3'];
        $total_sks += $row['sks_smt3'];
    }
    $nilai_keseluruhansmt3 = ($total_sks != 0) ? $total_nilai / $total_sks : 0;
    return $nilai_keseluruhansmt3;
}
?>
       <td style="text-align: right; border: none;  "> <span style = "margin-right: 2px;" ><?php echo number_format(hitung_nilai_keseluruhansmt3($table_smt3, $total_sks), 2); ?></span></td>
    </tr>
    
  </table>
</div>

<br>
<div class="container d-flex-card justify-content-center align-items-center" >
<div class = "GridStyle"  id="tabelGanjil" > 
  <div class="card" style="width: 640px;  "> <!-- Menambahkan lebar card -->
  
    <div class="text-start" style="margin-left: 0px;">
    <table class="table"  id="tabelGanjil"  style="margin-bottom: 0;">
        <thead class="bg-primary text-white">
          <tr>
            <th colspan="5" style="text-align: center; border-bottom:1px solid #ccc">2025 - Genap<em style = "font-weight: normal;">/Even</em></th>
          </tr>
          
          <tr>
            <th style="width: 10%;text-align: center; ">Kode<br>
          <em style = "font-weight: normal;">Code</em></th>
            <th style="width: 20%; text-align: center;">Mata Kuliah<br>
            <em style = "font-weight: normal;">Subject</em></th>
            <th style="width: 10%; text-align: center;">SKS<br>
            <em style = "font-weight: normal;">Credit</em></th>
            <th style="text-align: center; width: 10%;">N. Huruf<br>
            <em style = "font-weight: normal;">Grade</em></th>
            <th style="text-align: center;font-weight: normal;width: 10%;">S*N</th>
            
          </tr>
        </thead>
        <tbody>
     
<?php
// Ambil data dari database
$table_smt4 = select("SELECT kode_mk, nama_mk, mk_english, sks_smt4, nilai_huruf, total_nilai FROM table_smt4");


// Jika data tidak ada, maka isi dengan data default

// Loop untuk menampilkan data
foreach ($table_smt4 as $index => $row) {
    // Tentukan class berdasarkan indeks (ganjil atau genap)
    $class = ($index % 2 == 0) ? 'AlternateBG' : 'NormalBG';
    ?>
    <tr valign="top" class="<?php echo $class; ?>">
        <td><?php echo $row['kode_mk']; ?></td>
        <td><?php echo $row['nama_mk']; ?> <br>
      <em> <?php echo $row ['mk_english']; ?> </em></td>
        <td align="center"><?php echo $row['sks_smt4']; ?> </td>
        <td align="center"><?php echo $row['nilai_huruf']; ?></td>
        <td align="right"><?php echo $row['total_nilai']; ?></td>
       
      
     
       
      
    </tr>
<?php
}
?>

        </tbody>
      </table>
     
</div>
  
  </div>
</div>



</div>
<div class="bg-header text-black" style="width: 11%;margin: auto;font-size: 0.77em; margin-top: -10px; padding-top: 0; ">
  <table style="width: 100%; border: none;  ">
    <tr>
      <th style="text-align: right; border: none;">Jumlah SKS<br>
      <em style = "font-weight: normal;">Total of Credits</em>
      </th>
  <?php
$total_sks = 0;
foreach ($table_smt4 as $row) {
    $total_sks += $row['sks_smt4'];
}
?>
      <td style="text-align: right; border: none;"> <span  style = "margin-right: 2px;"><?php echo $total_sks; ?> SKS</span></td>
    </tr>
    <tr>
      <th style="text-align: right; border: none;">IPS<br>
      <em style = "font-weight: normal;">GPA</em> </th>
 <?php
    function hitung_nilai_keseluruhansmt4($nilai_huruf, $sks__smt4) {
    $nilai_angka = array(
        'A' => 4.0,
        'AB' => 3.5,
        'B' => 3.0,
        'BC' => 2.5,
        'C' => 2.0,
        'D' => 1.0,
        'E' => 0.0,
        '-' => 0.0
    );
    $total_nilai = 0;
    $total_sks = 0;
    foreach ($nilai_huruf as $row) {
        $nilai = $nilai_angka[$row['nilai_huruf']] ?? 0;
        $total_nilai += $nilai * $row['sks_smt4'];
        $total_sks += $row['sks_smt4'];
    }
    $nilai_keseluruhansmt4 = ($total_sks != 0) ? $total_nilai / $total_sks : 0;
    return $nilai_keseluruhansmt4;
}
?>
       <td style="text-align: right; border: none;  "> <span style = "margin-right: 2px;" ><?php echo number_format(hitung_nilai_keseluruhansmt4($table_smt4, $total_sks), 2); ?></span></td>
    </tr>
    
  </table>
</div>

<br>
<div class="container d-flex-card justify-content-center align-items-center" >
<div class = "GridStyle"  id="tabelGanjil" > 
  <div class="card" style="width: 640px;  "> <!-- Menambahkan lebar card -->
  
    <div class="text-start" style="margin-left: 0px;">
    <table class="table"  id="tabelGanjil"  style="margin-bottom: 0;">
        <thead class="bg-primary text-white">
          <tr>
            <th colspan="5" style="text-align: center; border-bottom:1px solid #ccc">2026 - Ganjil<em style = "font-weight: normal;">/Odd</em></th>
          </tr>
          
          <tr>
            <th style="width: 10%;text-align: center; ">Kode<br>
          <em style = "font-weight: normal;">Code</em></th>
            <th style="width: 20%; text-align: center;">Mata Kuliah<br>
            <em style = "font-weight: normal;">Subject</em></th>
            <th style="width: 10%; text-align: center;">SKS<br>
            <em style = "font-weight: normal;">Credit</em></th>
            <th style="text-align: center; width: 10%;">N. Huruf<br>
            <em style = "font-weight: normal;">Grade</em></th>
            <th style="text-align: center;font-weight: normal;width: 10%;">S*N</th>
            
          </tr>
        </thead>
        <tbody>
     
<?php
// Ambil data dari database
$table_smt5 = select("SELECT kode_mk, nama_mk, mk_english, sks_smt5, nilai_huruf, total_nilai FROM table_smt5");


// Jika data tidak ada, maka isi dengan data default

// Loop untuk menampilkan data
foreach ($table_smt5 as $index => $row) {
    // Tentukan class berdasarkan indeks (ganjil atau genap)
    $class = ($index % 2 == 0) ? 'AlternateBG' : 'NormalBG';
    ?>
    <tr valign="top" class="<?php echo $class; ?>">
        <td><?php echo $row['kode_mk']; ?></td>
        <td><?php echo $row['nama_mk']; ?> <br>
      <em> <?php echo $row ['mk_english']; ?> </em></td>
        <td align="center"><?php echo $row['sks_smt5']; ?> </td>
        <td align="center"><?php echo $row['nilai_huruf']; ?></td>
        <td align="right"><?php echo $row['total_nilai']; ?></td>
       
      
     
       
      
    </tr>
<?php
}
?>

        </tbody>
      </table>
     
</div>
  
  </div>
</div>



</div>
<div class="bg-header text-black" style="width: 11%;margin: auto;font-size: 0.77em; margin-top: -10px; padding-top: 0; ">
  <table style="width: 100%; border: none;  ">
    <tr>
      <th style="text-align: right; border: none;">Jumlah SKS<br>
      <em style = "font-weight: normal;">Total of Credits</em>
      </th>
  <?php
$total_sks = 0;
foreach ($table_smt5 as $row) {
    $total_sks += $row['sks_smt5'];
}
?>
      <td style="text-align: right; border: none;"> <span  style = "margin-right: 2px;"><?php echo $total_sks; ?> SKS</span></td>
    </tr>
    <tr>
      <th style="text-align: right; border: none;">IPS<br>
      <em style = "font-weight: normal;">GPA</em> </th>
 <?php
    function hitung_nilai_keseluruhansmt5($nilai_huruf, $sks__smt5) {
    $nilai_angka = array(
        'A' => 4.0,
        'AB' => 3.5,
        'B' => 3.0,
        'BC' => 2.5,
        'C' => 2.0,
        'D' => 1.0,
        'E' => 0.0,
        '-' => 0.0
    );
    $total_nilai = 0;
    $total_sks = 0;
    foreach ($nilai_huruf as $row) {
        $nilai = $nilai_angka[$row['nilai_huruf']] ?? 0;
        $total_nilai += $nilai * $row['sks_smt5'];
        $total_sks += $row['sks_smt5'];
    }
    $nilai_keseluruhansmt5 = ($total_sks != 0) ? $total_nilai / $total_sks : 0;
    return $nilai_keseluruhansmt5;
}
?>
       <td style="text-align: right; border: none;  "> <span style = "margin-right: 2px;" ><?php echo number_format(hitung_nilai_keseluruhansmt5($table_smt5, $total_sks), 2); ?></span></td>
    </tr>
    
  </table>
</div>

<br>
<div class="container d-flex-card justify-content-center align-items-center" >
<div class = "GridStyle"  id="tabelGanjil" > 
  <div class="card" style="width: 640px;  "> <!-- Menambahkan lebar card -->
  
    <div class="text-start" style="margin-left: 0px;">
    <table class="table"  id="tabelGanjil"  style="margin-bottom: 0;">
        <thead class="bg-primary text-white">
          <tr>
            <th colspan="5" style="text-align: center; border-bottom:1px solid #ccc">2026 - Genap<em style = "font-weight: normal;">/Even</em></th>
          </tr>
          
          <tr>
            <th style="width: 10%;text-align: center; ">Kode<br>
          <em style = "font-weight: normal;">Code</em></th>
            <th style="width: 20%; text-align: center;">Mata Kuliah<br>
            <em style = "font-weight: normal;">Subject</em></th>
            <th style="width: 10%; text-align: center;">SKS<br>
            <em style = "font-weight: normal;">Credit</em></th>
            <th style="text-align: center; width: 10%;">N. Huruf<br>
            <em style = "font-weight: normal;">Grade</em></th>
            <th style="text-align: center;font-weight: normal;width: 10%;">S*N</th>
            
          </tr>
        </thead>
        <tbody>
     
<?php
// Ambil data dari database
$table_smt6 = select("SELECT kode_mk, nama_mk, mk_english, sks_smt6, nilai_huruf, total_nilai FROM table_smt6");


// Jika data tidak ada, maka isi dengan data default

// Loop untuk menampilkan data
foreach ($table_smt6 as $index => $row) {
    // Tentukan class berdasarkan indeks (ganjil atau genap)
    $class = ($index % 2 == 0) ? 'AlternateBG' : 'NormalBG';
    ?>
    <tr valign="top" class="<?php echo $class; ?>">
        <td><?php echo $row['kode_mk']; ?></td>
        <td><?php echo $row['nama_mk']; ?> <br>
      <em> <?php echo $row ['mk_english']; ?> </em></td>
        <td align="center"><?php echo $row['sks_smt6']; ?> </td>
        <td align="center"><?php echo $row['nilai_huruf']; ?></td>
        <td align="right"><?php echo $row['total_nilai']; ?></td>
       
      
     
       
      
    </tr>
<?php
}
?>

        </tbody>
      </table>
     
</div>
  
  </div>
</div>



</div>
<div class="bg-header text-black" style="width: 11%;margin: auto;font-size: 0.77em; margin-top: -10px; padding-top: 0; ">
  <table style="width: 100%; border: none;  ">
    <tr>
      <th style="text-align: right; border: none;">Jumlah SKS<br>
      <em style = "font-weight: normal;">Total of Credits</em>
      </th>
  <?php
$total_sks = 0;
foreach ($table_smt6 as $row) {
    $total_sks += $row['sks_smt6'];
}
?>
      <td style="text-align: right; border: none;"> <span  style = "margin-right: 2px;"><?php echo $total_sks; ?> SKS</span></td>
    </tr>
    <tr>
      <th style="text-align: right; border: none;">IPS<br>
      <em style = "font-weight: normal;">GPA</em> </th>
 <?php
    function hitung_nilai_keseluruhansmt6($nilai_huruf, $sks__smt6) {
    $nilai_angka = array(
        'A' => 4.0,
        'AB' => 3.5,
        'B' => 3.0,
        'BC' => 2.5,
        'C' => 2.0,
        'D' => 1.0,
        'E' => 0.0,
        '-' => 0.0
    );
    $total_nilai = 0;
    $total_sks = 0;
    foreach ($nilai_huruf as $row) {
        $nilai = $nilai_angka[$row['nilai_huruf']] ?? 0;
        $total_nilai += $nilai * $row['sks_smt6'];
        $total_sks += $row['sks_smt6'];
    }
    $nilai_keseluruhansmt6 = ($total_sks != 0) ? $total_nilai / $total_sks : 0;
    return $nilai_keseluruhansmt6;
}
?>
       <td style="text-align: right; border: none;  "> <span style = "margin-right: 2px;" ><?php echo number_format(hitung_nilai_keseluruhansmt6($table_smt6, $total_sks), 2); ?></span></td>
    </tr>
    
  </table>
</div>

<br>
<div class="container d-flex-card justify-content-center align-items-center" >
<div class = "GridStyle"  id="tabelGanjil" > 
  <div class="card" style="width: 640px;  "> <!-- Menambahkan lebar card -->
  
    <div class="text-start" style="margin-left: 0px;">
    <table class="table"  id="tabelGanjil"  style="margin-bottom: 0;">
        <thead class="bg-primary text-white">
          <tr>
            <th colspan="5" style="text-align: center; border-bottom:1px solid #ccc">2027 - Ganjil<em style = "font-weight: normal;">/Odd</em></th>
          </tr>
          
          <tr>
            <th style="width: 10%;text-align: center; ">Kode<br>
          <em style = "font-weight: normal;">Code</em></th>
            <th style="width: 20%; text-align: center;">Mata Kuliah<br>
            <em style = "font-weight: normal;">Subject</em></th>
            <th style="width: 10%; text-align: center;">SKS<br>
            <em style = "font-weight: normal;">Credit</em></th>
            <th style="text-align: center; width: 10%;">N. Huruf<br>
            <em style = "font-weight: normal;">Grade</em></th>
            <th style="text-align: center;font-weight: normal;width: 10%;">S*N</th>
            
          </tr>
        </thead>
        <tbody>
     
<?php
// Ambil data dari database
$table_smt7 = select("SELECT kode_mk, nama_mk, mk_english, sks_smt7, nilai_huruf, total_nilai FROM table_smt7");


// Jika data tidak ada, maka isi dengan data default

// Loop untuk menampilkan data
foreach ($table_smt7 as $index => $row) {
    // Tentukan class berdasarkan indeks (ganjil atau genap)
    $class = ($index % 2 == 0) ? 'AlternateBG' : 'NormalBG';
    ?>
    <tr valign="top" class="<?php echo $class; ?>">
        <td><?php echo $row['kode_mk']; ?></td>
        <td><?php echo $row['nama_mk']; ?> <br>
      <em> <?php echo $row ['mk_english']; ?> </em></td>
        <td align="center"><?php echo $row['sks_smt7']; ?> </td>
        <td align="center"><?php echo $row['nilai_huruf']; ?></td>
        <td align="right"><?php echo $row['total_nilai']; ?></td>
       
      
     
       
      
    </tr>
<?php
}
?>

        </tbody>
      </table>
     
</div>
  
  </div>
</div>



</div>
<div class="bg-header text-black" style="width: 11%;margin: auto;font-size: 0.77em; margin-top: -10px; padding-top: 0; ">
  <table style="width: 100%; border: none;  ">
    <tr>
      <th style="text-align: right; border: none;">Jumlah SKS<br>
      <em style = "font-weight: normal;">Total of Credits</em>
      </th>
  <?php
$total_sks = 0;
foreach ($table_smt7 as $row) {
    $total_sks += $row['sks_smt7'];
}
?>
      <td style="text-align: right; border: none;"> <span  style = "margin-right: 2px;"><?php echo $total_sks; ?> SKS</span></td>
    </tr>
    <tr>
      <th style="text-align: right; border: none;">IPS<br>
      <em style = "font-weight: normal;">GPA</em> </th>
 <?php
    function hitung_nilai_keseluruhansmt7($nilai_huruf, $sks__smt7) {
    $nilai_angka = array(
        'A' => 4.0,
        'AB' => 3.5,
        'B' => 3.0,
        'BC' => 2.5,
        'C' => 2.0,
        'D' => 1.0,
        'E' => 0.0,
        '-' => 0.0
    );
    $total_nilai = 0;
    $total_sks = 0;
    foreach ($nilai_huruf as $row) {
        $nilai = $nilai_angka[$row['nilai_huruf']] ?? 0;
        $total_nilai += $nilai * $row['sks_smt7'];
        $total_sks += $row['sks_smt7'];
    }
    $nilai_keseluruhansmt7 = ($total_sks != 0) ? $total_nilai / $total_sks : 0;
    return $nilai_keseluruhansmt7;
}
?>
       <td style="text-align: right; border: none;  "> <span style = "margin-right: 2px;" ><?php echo number_format(hitung_nilai_keseluruhansmt7($table_smt7, $total_sks), 2); ?></span></td>
    </tr>
    
  </table>
</div>

<br>
<div class="container d-flex-card justify-content-center align-items-center" >
<div class = "GridStyle"  id="tabelGanjil" > 
  <div class="card" style="width: 640px;  "> <!-- Menambahkan lebar card -->
  
    <div class="text-start" style="margin-left: 0px;">
    <table class="table"  id="tabelGanjil"  style="margin-bottom: 0;">
        <thead class="bg-primary text-white">
          <tr>
            <th colspan="5" style="text-align: center; border-bottom:1px solid #ccc">2027 - Genap<em style = "font-weight: normal;">/Even</em></th>
          </tr>
          
          <tr>
            <th style="width: 10%;text-align: center; ">Kode<br>
          <em style = "font-weight: normal;">Code</em></th>
            <th style="width: 20%; text-align: center;">Mata Kuliah<br>
            <em style = "font-weight: normal;">Subject</em></th>
            <th style="width: 10%; text-align: center;">SKS<br>
            <em style = "font-weight: normal;">Credit</em></th>
            <th style="text-align: center; width: 10%;">N. Huruf<br>
            <em style = "font-weight: normal;">Grade</em></th>
            <th style="text-align: center;font-weight: normal;width: 10%;">S*N</th>
            
          </tr>
        </thead>
        <tbody>
     
<?php
// Ambil data dari database
$table_smt8 = select("SELECT kode_mk, nama_mk, mk_english, sks_smt8, nilai_huruf, total_nilai FROM table_smt8");


// Jika data tidak ada, maka isi dengan data default

// Loop untuk menampilkan data
foreach ($table_smt8 as $index => $row) {
    // Tentukan class berdasarkan indeks (ganjil atau genap)
    $class = ($index % 2 == 0) ? 'AlternateBG' : 'NormalBG';
    ?>
    <tr valign="top" class="<?php echo $class; ?>">
        <td><?php echo $row['kode_mk']; ?></td>
        <td><?php echo $row['nama_mk']; ?> <br>
      <em> <?php echo $row ['mk_english']; ?> </em></td>
        <td align="center"><?php echo $row['sks_smt8']; ?> </td>
        <td align="center"><?php echo $row['nilai_huruf']; ?></td>
        <td align="right"><?php echo $row['total_nilai']; ?></td>
       
      
     
       
      
    </tr>
<?php
}
?>

        </tbody>
      </table>
     
</div>
  
  </div>
</div>



</div>
<div class="bg-header text-black" style="width: 11%;margin: auto;font-size: 0.77em; margin-top: -10px; padding-top: 0; ">
  <table style="width: 100%; border: none;  ">
    <tr>
      <th style="text-align: right; border: none;">Jumlah SKS<br>
      <em style = "font-weight: normal;">Total of Credits</em>
      </th>
  <?php
$total_sks = 0;
foreach ($table_smt8 as $row) {
    $total_sks += $row['sks_smt8'];
}
?>
      <td style="text-align: right; border: none;"> <span  style = "margin-right: 2px;"><?php echo $total_sks; ?> SKS</span></td>
    </tr>
    <tr>
      <th style="text-align: right; border: none;">IPS<br>
      <em style = "font-weight: normal;">GPA</em> </th>
 <?php
    function hitung_nilai_keseluruhansmt8($nilai_huruf, $sks__smt8) {
    $nilai_angka = array(
        'A' => 4.0,
        'AB' => 3.5,
        'B' => 3.0,
        'BC' => 2.5,
        'C' => 2.0,
        'D' => 1.0,
        'E' => 0.0,
        '-' => 0.0
    );
    $total_nilai = 0;
    $total_sks = 0;
    foreach ($nilai_huruf as $row) {
        $nilai = $nilai_angka[$row['nilai_huruf']] ?? 0;
        $total_nilai += $nilai * $row['sks_smt8'];
        $total_sks += $row['sks_smt8'];
    }
    $nilai_keseluruhansmt8 = ($total_sks != 0) ? $total_nilai / $total_sks : 0;
    return $nilai_keseluruhansmt8;
}
?>
       <td style="text-align: right; border: none;  "> <span style = "margin-right: 2px;" ><?php echo number_format(hitung_nilai_keseluruhansmt8($table_smt8, $total_sks), 2); ?></span></td>
    </tr>
    
  </table>
</div>
<br>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

                
<script>
  
// Fungsi untuk menampilkan tabel edit
function tampilkanTabelEdit() {
  // Ambil nilai opsi yang dipilih
  var nilaiOpsi = document.getElementById("sRoles").value;
  // Jika opsi "Admin TU" dipilih
  if (nilaiOpsi == "20") {
   
    // Tampilkan tabel edit
    var tabelEdit = document.getElementById("tabelEdit");
    tabelEdit.style.display = "block";
    // Tampilkan kolom edit pada tabel
    var kolomEdit = document.querySelectorAll("th#tabelEdit");
    kolomEdit.forEach(function(kolom) {
      kolom.style.display = "table-cell";
    });
    // Tampilkan tombol edit pada tabel
    var tombolEdit = document.querySelectorAll("td#tabelEdit");
    tombolEdit.forEach(function(tombol) {
      tombol.style.display = "table-cell";
    });
  } else {
    // Sembunyikan tabel edit
    var tabelEdit = document.getElementById("tabelEdit");
    tabelEdit.style.display = "none";
    // Sembunyikan kolom edit pada tabel
    var kolomEdit = document.querySelectorAll("th#tabelEdit");
    kolomEdit.forEach(function(kolom) {
      kolom.style.display = "none";
    });
    // Sembunyikan tombol edit pada tabel
    var tombolEdit = document.querySelectorAll("td#tabelEdit");
    tombolEdit.forEach(function(tombol) {
      tombol.style.display = "none";
    });
  }
}

 function tampilkanPopUp(url, judul, lebar, tinggi) {
  var popup = window.open(url, judul, 'width=' + lebar + ',height=' + tinggi + ',scrollbars=yes,resizable=yes');
  popup.focus();
}


</script>



<script>
  // Fungsi untuk menyimpan data nilai S*N dan IPS di local storage
function saveData() {
  var mataKuliah = document.getElementById("mata-kuliah").value;
  var nilai = document.getElementById("nilai").value;
  var sks = parseFloat(document.getElementById("sks").value);

  if (mataKuliah !== "" && nilai !== "" && sks !== "") {
    var nilaiAngka;
    switch (nilai) {
      case "A":
        nilaiAngka = 4;
        break;
      case "AB":
        nilaiAngka = 3.5;
        break;
      case "B":
        nilaiAngka = 3;
        break;
      case "BC":
        nilaiAngka = 2.5;
        break;
      case "C":
        nilaiAngka = 2;
        break;
      case "D":
        nilaiAngka = 1;
        break;
      case "E":
        nilaiAngka = 0;
        break;
      default:
        nilaiAngka = 0;
    }

    var nilaiCell = document.getElementById(mataKuliah);
    nilaiCell.innerHTML = nilai;
    var snCell = document.getElementById("sn_" + mataKuliah.replace("nilai_", ""));
    snCell.innerHTML = nilaiAngka * sks;

    var totalSn = 0;
    for (var i = 1; i <= 8; i++) {
      var sn = document.getElementById("sn_" + i);
      if (sn) {
        totalSn += parseFloat(sn.innerHTML);
      }
    }

    var ipsCell = document.getElementById("ips");
    ipsCell.innerHTML = (totalSn / 18).toFixed(2);

    // Simpan data di local storage
    var data = JSON.parse(localStorage.getItem("data"));
    if (!data) {
      data = {};
    }
    data[mataKuliah] = {
      nilai: nilai,
      sks: sks,
      sn: nilaiAngka * sks,
      ips: (totalSn / 18).toFixed(2)
    };
    localStorage.setItem("data", JSON.stringify(data));

    // Simpan data input di local storage
    var inputData = JSON.parse(localStorage.getItem("inputData"));
    if (!inputData) {
      inputData = {};
    }
    inputData[mataKuliah] = {
      nilai: nilai,
      sks: sks
    };
    localStorage.setItem("inputData", JSON.stringify(inputData));

   

    // Tampilkan data yang telah disimpan
    loadData();
  }
}

document.getElementById("save").addEventListener("click", function() {
  saveData();
  document.getElementById("mata-kuliah").value = "";
  document.getElementById("nilai").value = "";
  document.getElementById("sks").value = "";
});
// Fungsi untuk memuat data nilai S*N dan IPS dari local storage
function loadData() {
  var data = JSON.parse(localStorage.getItem("data"));
  if (data) {
    for (var mataKuliah in data) {
      var nilaiCell = document.getElementById(mataKuliah);
      nilaiCell.innerHTML = data[mataKuliah].nilai;
      var snCell = document.getElementById("sn_" + mataKuliah.replace("nilai_", ""));
      snCell.innerHTML = data[mataKuliah].sn;
    }
    var ipsCell = document.getElementById("ips");
    var totalSn = 0;
    for (var i = 1; i <= 8; i++) {
      var sn = document.getElementById("sn_" + i);
      if (sn) {
        totalSn += parseFloat(sn.innerHTML);
      }
    }
    ipsCell.innerHTML = (totalSn / 18).toFixed(2);
  }

  // Muat data input dari local storage
  var inputData = JSON.parse(localStorage.getItem("inputData"));
  if (inputData) {
    for (var mataKuliah in inputData) {
      var nilai = inputData[mataKuliah].nilai;
      var sks = inputData[mataKuliah].sks;
      document.getElementById("mata-kuliah").value = "";
      document.getElementById("nilai").value = "";
      document.getElementById("sks").value = "";
    }
  }
}

// Panggil fungsi loadData saat halaman dimuat
window.onload = function() {
  loadData();
}




// Tambahkan event listener untuk memuat data nilai S*N dan IPS saat tombol simpan ditekan
document.getElementById("save").addEventListener("click", function() {
  saveData();
});

// Fungsi untuk finalisasi nilai
function finalisasiNilaiProses() {
  // Lakukan finalisasi nilai
  // Contoh: simpan nilai ke database
  alert("Nilai telah difinalisasi");

  // Simpan data input di local storage
  var inputData = JSON.parse(localStorage.getItem("inputData"));
  if (inputData) {
    localStorage.setItem("finalData", JSON.stringify(inputData));
  }

  // Tampilkan pesan finalisasi nilai
  var tanggal = new Date();
  var hari = tanggal.getDate();
  var bulan = tanggal.getMonth() + 1;
  var tahun = tanggal.getFullYear();
  var jam = tanggal.getHours();
  var menit = tanggal.getMinutes();
  var detik = tanggal.getSeconds();

  var pesan = '<div width="70%" style="font-size:11px;background-color:#ffcccc;padding:3px"><strong><font color="#B30000">Anda sudah memfinalisasi nilai untuk periode semester genap 2024/2025 pada ' + hari + '/' + bulan + '/' + tahun + ' ' + jam + ':' + menit + ':' + detik + '</font></strong></div><p></p>';

  document.getElementById("pesan-finalisasi").innerHTML = pesan;

  // Simpan pesan finalisasi nilai di local storage
  localStorage.setItem("pesan-finalisasi", pesan);

  // Disable tombol finalisasi nilai
  document.getElementById("finalisasi-nilai").disabled = true;
}
</script>

<script>
  // Fungsi untuk reset dropdown
function resetDropdown() {
  document.getElementById("mata-kuliah").value = "";
  document.getElementById("nilai").value = "";
  document.getElementById("sks").value = "";
}

// Reset dropdown saat halaman diload pertama kali
window.onload = function() {
  resetDropdown();
  loadData();
}

// Reset dropdown saat tombol "Simpan Nilai" ditekan
document.getElementById("save").addEventListener("click", function() {
  saveData();
  resetDropdown();
});
</script>
</html>