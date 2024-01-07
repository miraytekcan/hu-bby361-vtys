<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veri Tabanı Yönetim Sistemleri</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:#FFCD58;
        }
        header {
            background-color: #FF5C4D;
            color: white;
            text-align: center;
            padding: 1em;
        }
        nav {
            color: black;
            background-color: #F9B4F6;
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
            background-color: #5DF15D.;
            color: black;
        }
        footer {
            margin-right: 10px;
            background-color: #FF9636;
            color: white;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
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
            <li><a href="listele.php">Katalogta Bulunan Eserler</a></li>
            <li><a href="yazar-listele.php">Katalogta Bulunan Yazarlar</a></li>
            <li><a href="yazar-ekle.php">Yazar Ekleme İşlemleri</a></li>
            <li><a href="eser-ekle.php">Eser Ekleme İşlemleri</a></li>
            <li><a href="eser-sil.php">Eser Silme İşlemleri</a></li>
            <li><a href="eser-guncelle.php">Eser Güncelleme İşlemleri</a></li>
        </ul>
    </nav>
<?php
require_once("baglanti.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eserID = $_POST['eserID'];
    $silmeSorgusu = "DELETE FROM Eser WHERE eserID = ?";
    $stmt = $baglanti->prepare($silmeSorgusu);

    if ($stmt) {
        $stmt->bind_param("i", $eserID);

        if ($stmt->execute()) {
            echo "<p style='padding-left:50px; font-size:50pt; color: green; font-weight: bold;'>Eser başarıyla silindi.</p>";
        } else {
            echo "<p style='color: red;'>Eser silinirken hata oluştu: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p style='color: red;'>Sorgu hazırlanırken hata oluştu: " . $baglanti->error . "</p>";
    }
} else {
    echo "<p style='color: red;'>Geçersiz bir istek.</p>";
}
$baglanti->close();
?>
    <footer>
        <p>Bu web sayfası Veri Tabanı Yönetim Sistemleri dersi final projesi kapsamında Miray Tekcan tarafından oluşturulmuştur.</p>
    </footer>
</body>
</html>