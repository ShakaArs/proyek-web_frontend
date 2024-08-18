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
    <title>Tambah Data Proyek</title>
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
    <h1 class="heading">Tambah Data Proyek</h1>
    <center>
        <form action="<?php echo site_url('proyek/store'); ?>" method="POST">
            <table>
                <tr>
                    <td>Nama Proyek</td>
                    <td><input type="text" placeholder="Nama Proyek" name="namaProyek" class="input1" required></td>
                </tr>
                <tr>
                    <td>Client</td>
                    <td><input type="text" placeholder="Client" name="client" class="input1" required></td>
                </tr>
                <tr>
                    <td>Tanggal Mulai</td>
                    <td><input type="date" name="tanggalMulai" class="input1" required></td>
                </tr>
                <tr>
                    <td>Tanggal Selesai</td>
                    <td><input type="date" name="tanggalSelesai" class="input1" required></td>
                </tr>
                <tr>
                    <td>Pimpinan Proyek</td>
                    <td><input type="text" placeholder="Pimpinan Proyek" name="pimpinanProyek" class="input1" required></td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td><textarea placeholder="Keterangan" name="keterangan" class="input1" required></textarea></td>
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
