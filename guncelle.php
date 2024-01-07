<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("baglanti.php");

    $eserID = $_POST["eserID"];
    $eserAdi = mysqli_real_escape_string($baglanti, $_POST["eserAdi"]);
    $eserAciklama = mysqli_real_escape_string($baglanti, $_POST["eserAciklama"]);
    $eserDili = mysqli_real_escape_string($baglanti, $_POST["eserDili"]);
    $eserISBN = mysqli_real_escape_string($baglanti, $_POST["eserISBN"]);
    $eserSayfaNo = mysqli_real_escape_string($baglanti, $_POST["eserSayfaNo"]);
    $eserYayinYeri = mysqli_real_escape_string($baglanti, $_POST["eserYayinYeri"]);
    $eserBasimYili = mysqli_real_escape_string($baglanti, $_POST["eserBasimYili"]);
    $eserKapakResimURL = mysqli_real_escape_string($baglanti, $_POST["eserKapakResimURL"]);

    $sorgu = "UPDATE Eser SET 
              eserAdi='$eserAdi', 
              eserAciklama='$eserAciklama', 
              eserDili='$eserDili', 
              eserISBN='$eserISBN', 
              eserSayfaNo=$eserSayfaNo, 
              eserYayinYeri='$eserYayinYeri', 
              eserBasimYili=$eserBasimYili, 
              eserKapakResimURL='$eserKapakResimURL' 
              WHERE eserID=$eserID";

    if ($baglanti->query($sorgu) === TRUE) {
        header("Location: eser-guncelle.php?eserID=$eserID&updateStatus=success");
        exit();
    } else {
        header("Location: eser-guncelle.php?eserID=$eserID&updateStatus=error");
        exit();
    }

    $baglanti->close();
} else {
    header("Location: index.html");
    exit();
}
?>