<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eserleri Listele</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #9FE2BF;
    }
    header {
        background-color: #A16AE8;
        color: white;
        text-align: center;
        padding: 1em;
    }
    nav {
        background-color: #FD49A0;
        overflow: hidden;
    }
    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }
    nav li {
        float: left;
    }
    nav a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    nav a:hover {
        background-color: #04D4F0;
        color: black;
    }
    main {
        margin: 20px;
    }
    main h2 {
        color: #333;
    }
    main p {
        margin-bottom: 10px;
    }
    main img {
        margin-left: 5px;
        max-width: 8%;
        height: auto;
        display: left;
    }
                .aktif{
            background-color: #FCFF04;
            color: black;
        }
    </style>
</head>
<body>
    <header>
        <h1>BBY361 Veri Tabanı Yönetim Sistemleri</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.html">Ana Sayfa</a></li>
            <li><a href="arama.php">Arama</a></li>
            <li><a href="listele.php" class="aktif">Katalogta Bulunan Eserler</a></li>
            <li><a href="yazar-listele.php">Katalogta Bulunan Yazarlar</a></li>
            <li><a href="yazar-ekle.php">Yazar Ekleme İşlemleri</a></li>
            <li><a href="eser-ekle.php">Eser Ekleme İşlemleri</a></li>
            <li><a href="eser-sil.php">Eser Silme İşlemleri</a></li>
            <li><a href="eser-guncelle.php">Eser Güncelleme İşlemleri</a></li>
        </ul>
    </nav>
    <main>
<?php
require_once("baglanti.php");
$sorgu = "SELECT Eser.eserID, Eser.eserAdi, Eser.eserAciklama, Eser.eserDili, Eser.eserISBN, Eser.eserSayfaNo, Eser.eserYayinYeri, Eser.eserBasimYili, Eser.eserKapakResimURL,
                 GROUP_CONCAT(Yazar.yazarAdi, ' ', Yazar.yazarSoyadi SEPARATOR ', ') AS yazarlar,
                 YayınEvi.yayinEvi_Adi
          FROM Eser
          LEFT JOIN EserYazar ON Eser.eserID = EserYazar.eserID
          LEFT JOIN Yazar ON EserYazar.yazarID = Yazar.yazarID
          LEFT JOIN YayınEvi ON Eser.yayinEvi_ID = YayınEvi.yayinEvi_ID
          GROUP BY Eser.eserID";
$result = $baglanti->query($sorgu);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["eserAdi"] . "</h2>";
        echo "<p><b>Yazar(lar):</b> " . $row["yazarlar"] . "</p>";
        echo "<p><b>Açıklama:</b> " . $row["eserAciklama"] . "</p>";
        echo "<p><b>Dil:</b> " . $row["eserDili"] . "</p>";
        echo "<p><b>ISBN:</b> " . $row["eserISBN"] . "</p>";
        echo "<p><b>Sayfa Sayısı:</b> " . $row["eserSayfaNo"] . "</p>";
        echo "<p><b>Yayın Yeri:</b> " . $row["eserYayinYeri"] . "</p>";
        echo "<p><b>Basım Yılı:</b> " . $row["eserBasimYili"] . "</p>";
        echo "<p><b>Yayın Evi:</b> " . $row["yayinEvi_Adi"] . "</p>";
        echo "<p><b>Kapak Resmi:</b> <img src='" . $row["eserKapakResimURL"] . "' alt='Kapak Resmi'></p>";
        echo "<hr>";
    }
} else {
    echo "Herhangi bir eser bulunamadı.";
}
$baglanti->close();
?>
</main>
        <footer>
        <p style="text-align:center">Bu web sayfası Veri Tabanı Yönetim Sistemleri dersi final projesi kapsamında Miray Tekcan tarafından oluşturulmuştur.</p>
    </footer>
</body>
</html>