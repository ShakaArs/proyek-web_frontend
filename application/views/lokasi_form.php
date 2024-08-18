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
    <link rel="stylesheet" href="<?php echo base_url('css/style1.css'); ?>">
    <title>Tambah Data Lokasi</title>
</head>
<body>
    <!--header section dimulai-->
    <header class="header">
        <a href="#" class="logo"><i class="fas fa-bitcoin"></i>SOLUSI IT</a>
        <nav class="navbar">
            <div id="nav-close" class="fas fa--times"></div>
            <a href="<?php echo base_url('index.php/hal_admin'); ?>">Home</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-coin"></div>
        </div>
    </header>

    <br><br><br><br><br>
    <h1 class="heading">Tambah Data Lokasi</h1>
    <center>
        <form action="<?php echo site_url('lokasi/store'); ?>" method="POST">
            <table>
                <tr>
                    <td>Nama Lokasi</td>
                    <td><input type="text" placeholder="Nama Lokasi" name="nama_lokasi" class="input1" required></td>
                </tr>
                <tr>
                    <td>Negara</td>
                    <td><input type="text" placeholder="Negara" name="negara" class="input1" required></td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td><input type="text" placeholder="Provinsi" name="provinsi" class="input1" required></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td><input type="text" placeholder="Kota" name="kota" class="input1" required></td>
                </tr>
                <tr>
                    <td><input type="submit" class="submit" value="Simpan"></td>
                    <td><input type="reset" class="submit" value="Reset"></td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
