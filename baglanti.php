<?php
    $sunucu = "localhost";
    $kullanici = "root";
    $sifre = "";
    $veritabani = "bby361_miraytekcan";

    $baglanti = mysqli_connect($sunucu, $kullanici, $sifre, $veritabani)
        or die("Veritabanına bağlantı gerçekleştirilemedi: " . mysqli_connect_error());

    mysqli_set_charset($baglanti, "utf8");
?>
