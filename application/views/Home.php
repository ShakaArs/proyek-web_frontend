<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS SWIPPE-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--CSS-->
    <link href="<?php echo base_url()."css/style.css"?>"  rel="stylesheet" >
    <title>SOLUTI</title>
</head>
<body>
     <!--header section dimulai-->
     <header class="header">
        <a href="#" class="logo"><i class="fas fa-bitcoin"></i>SOLUSI IT</a>
        <nav class="navbar">
            <div id="nav-close" class="fas fa--times"></div>
            <a href="<?php echo base_url()."index.php/hal_admin"?>">Home</a>
            <!-- <a href="tentang.php">About</a>
            <a href="index.php">News</a>
            <a href="index.php">BTC</a> -->
            <a href="<?php echo base_url()."index.php/hal_utama/logout"?>">Logout</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-coin"></div>
            <div id="search-btn" class="fas fa-search"></div>
        </div>
    </header>

    <div class="search-form">

        <div id="close-search" class="fas fa-times"></div>

        <form action="">
            <input type="search" placeholder="Cari Di sini..." id="search-box">
            <label for="search-btn" class="fas fa-search"></label>
        </form>
    </div>

    <!--Beranda-->
    <section class="home" id="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="second" style="background: url(<?php echo base_url()."img/bg_2.png"?>) no-repeat;">
                        <div class="content">
                            <span>Platform Project IT</span>
                            <h3>Sejuta Kreativitas</h3>
                            <p>Dalam pengembangan proyek IT, seperti aplikasi dan website, penting untuk memastikan keamanan dan integritas data serta transaksi. Melalui pendekatan yang tepat dalam desain dan implementasi, kita dapat menciptakan solusi digital yang aman dan terpercaya, memenuhi berbagai kebutuhan pengguna dan bisnis.</p>
                            <a href="#" class="btn">Jelajahi</a>

                        </div>
                        
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="second" style="background: url(<?php echo base_url()."img/bg_1.jpg"?>) no-repeat;">
                    </div>
                </div>
                
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <!--Kategori-->
    <section class="category">
        <h1 class="heading">Portofolio project IT</h1>

        <div class="box-container">
            <div class="box">
                <img src="<?php echo base_url()."img/logobengkod.png"?>" alt="">
                <h3>Bengkel Koding</h3>
                <p>LMS yang membantu dalam pembelajaran mata kuliah bengkel Koding Universitas dian nuswantoro.</p>
                <br>
                <br>
                <a href="https://bengkelkoding.rayhanashlikh.my.id/" class="btn">read more</a>
            </div>
            <div class="box">
                <img src="<?php echo base_url()."img/logosiresma.png"?>" alt="">
                <h3>SIRESMA</h3>
                <p>sistem Resik Mandiri untuk membantu Pengolahan bank Sampah Di kelurahan sambiroto, tembalang</p>
                <br>
                <br>
                <a href="https://play.google.com/store/apps/details?id=com.siresma&pcampaignid=web_share" class="btn">read more</a>
            </div>
            <div class="box">
                <img src="<?php echo base_url()."img/apoti.png"?>" alt="">
                <h3>APOTI</h3>
                <p>Aplikasi posyandu melati untuk daerah desa janegara dalam rangka membantu petugas posyandu untuk manajemen data pasien ibu hamil,remaja perempuan, dan anak balita</p>
                <a href="https://github.com/ShakaArs/AplikasiApoti.git" class="btn">read more</a>
            </div>
            <!--  -->
        </div>
        <br>
        <br>
        <h1 class="heading">Data Para konsumen baru SOLUTI</h1>
        <center>
                <table class="table1">
                    <tr>
                        <th>No</th>
                        <th>Nama Proyek</th>
                        <th>Client</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Pimpinan Proyek</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach ($data_proyek as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['id'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($item['namaProyek'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($item['client'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($item['tanggalMulai'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($item['tanggalSelesai'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($item['pimpinanProyek'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($item['keterangan'] ?? 'N/A'); ?></td>
                        <td>
                            <a href="<?php echo site_url('proyek/edit/' . intval($item['id'])); ?>">Edit</a>
                        </td>
                        <td>
                            <a href="<?php echo site_url('proyek/delete/' . intval($item['id'])); ?>">Delete</a>
                            </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                
            </center>
            <br>
            <br><br>
            <center><a href="<?php echo site_url('proyek/create'); ?>">Tambah Data</a></center>
            <br>
            <br><br>
            <br>
            <h1 class="heading">Daftar Lokasi</h1>
            <center>
                <table class="table1">
                    <tr>
                        <th>ID</th>
                        <th>Nama Lokasi</th>
                        <th>Negara</th>
                        <th>Provinsi</th>
                        <th>Kota</th>
                        <th>Aksi</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach ($data_location as $location): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($location['id'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($location['nama_lokasi'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($location['negara'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($location['provinsi'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($location['kota'] ?? 'N/A'); ?></td>
                        <td>
                            <a href="<?php echo site_url('lokasi/edit/' . intval($item['id'])); ?>">Edit</a>
                        </td>
                        <td>
                            <a href="<?php echo site_url('lokasi/delete/' . intval($item['id'])); ?>">Delete</a>
                            </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </center>
            <br>
            <center><a href="<?php echo site_url('proyek/create'); ?>">Tambah Data</a></center>
        





        
    </section>
    <!--JAVA SWIPPE-->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!--JAVASCRIPT-->
    <script src="<?php echo base_url()."javascript/main.js"?>"></script>

</body>
<!-- footer/Copyright -->
<footer>
    <div class="footer">
        <small>Copyright &copy; 2021 - Shaka Arisya. All Rights Reserved. </small>
    </div>
</footer>
    
</body>
</html>