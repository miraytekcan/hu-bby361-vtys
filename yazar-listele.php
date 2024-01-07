<!DOCTYPE html>
<html lang="tr">
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
            background-color: #87DDFB;
        }
        header {
            background-color: #DDFB87;
            color: black;
            text-align: center;
            padding: 1em;
        }
        nav {
            background-color: #6C67FF;
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
            background-color: #FF67FC;
            color: black;
        }
        main {
            margin: 20px;
        }
        main h2 {
            color: #333;
        }
        main img {
        margin-left: 5px;
        max-width: 8%;
        height: auto;
        display: left;
    }
        .aktif{
            background-color: #FE81F3;
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
            <li><a href="listele.php">Katalogta Bulunan Eserler</a></li>
            <li><a href="yazar-listele.php" class="aktif">Katalogta Bulunan Yazarlar</a></li>
            <li><a href="yazar-ekle.php">Yazar Ekleme İşlemleri</a></li>
            <li><a href="eser-ekle.php">Eser Ekleme İşlemleri</a></li>
            <li><a href="eser-sil.php">Eser Silme İşlemleri</a></li>
            <li><a href="eser-guncelle.php">Eser Güncelleme İşlemleri</a></li>
        </ul>
    </nav>
    <main>
        <?php
        require_once("baglanti.php");
        $sorgu = "SELECT * FROM Yazar";
        $result = $baglanti->query($sorgu);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<h2>" . $row["yazarAdi"] . " " . $row["yazarSoyadi"] . "</h2>";
                echo "<p><b>Doğum Tarihi:</b> " . $row["yazarDoğumTarih"] . "</p>";
                echo "<p><b>Ölüm Tarihi:</b> " . $row["yazarÖlümTarih"] . "</p>";
                echo "<p><b>Milliyet:</b> " . $row["yazarMilliyet"] . "</p>";
                echo "<p><b>Cinsiyet:</b> " . $row["yazarCinsiyet"] . "</p>";
                echo "<p><b>Web Sayfası:</b> <a href='" . $row["yazarWebSayfa"] . "' target='_blank'>" . $row["yazarWebSayfa"] . "</a></p>";
                echo "<p><b>Yazarın Fotoğrafı:</b> <img src='" . $row["yazarFotoURL"] . "' alt='Yazar Fotoğrafı'></p>";
                echo "<hr>";
            }
        } else {
            echo "Herhangi bir yazar bulunamadı.";
        }
        $baglanti->close();
        ?>
    </main>
    <footer>
        <p style="text-align:center">Bu web sayfası Veri Tabanı Yönetim Sistemleri dersi final projesi kapsamında Miray Tekcan tarafından oluşturulmuştur.</p>
    </footer>
</body>
</html>
