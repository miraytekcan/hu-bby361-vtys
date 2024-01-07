<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veri Tabanı Yönetim Sistemleri</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #01949A;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #DB1F48;
            color: #fff;
            text-align: center;
            padding: 1em;
        }
        nav {
            background-color: #004369;
            overflow: hidden;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            float: left;
            display: block;
        }
        nav ul li a {
            display: block;
            padding: 1em;
            text-decoration: none;
            color: #fff;
            text-align: center;
        }
        nav ul li a:hover {
            color: black;
            background-color: #78FF00;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select,
        input[type="submit"],
        input[type="text"],
        textarea,
        input[type="number"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }    
            .aktif{
            background-color: #95FE81;
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
            <li><a href="yazar-listele.php">Katalogta Bulunan Yazarlar</a></li>
            <li><a href="yazar-ekle.php" class="aktif">Yazar Ekleme İşlemleri</a></li>
            <li><a href="eser-ekle.php">Eser Ekleme İşlemleri</a></li>
            <li><a href="eser-sil.php">Eser Silme İşlemleri</a></li>
            <li><a href="eser-guncelle.php">Eser Güncelleme İşlemleri</a></li>
        </ul>
    </nav>
    <main>
        <h2>Eklemek istediğiniz yazar hakkında bilgileri girin.</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="yazarAdi">Yazar Adı:</label>
            <input type="text" id="yazarAdi" name="yazarAdi" required>

            <label for="yazarSoyadi">Yazar Soyadı:</label>
            <input type="text" id="yazarSoyadi" name="yazarSoyadi" required>

            <label for="yazarWebSayfa">Yazar Web Sayfası:</label>
            <input type="text" id="yazarWebSayfa" name="yazarWebSayfa">

            <label for="yazarDoğumTarih">Doğum Tarihi:</label>
            <input type="text" id="yazarDoğumTarih" name="yazarDoğumTarih">

            <label for="yazarÖlümTarih">Ölüm Tarihi:</label>
            <input type="text" id="yazarÖlümTarih" name="yazarÖlümTarih">

            <label for="yazarMilliyet">Milliyeti:</label>
            <input type="text" id="yazarMilliyet" name="yazarMilliyet">

            <label for="yazarCinsiyet">Cinsiyet:</label>
            <input type="text" id="yazarCinsiyet" name="yazarCinsiyet">

            <label for="yazarFotoURL">Yazarın Fotoğrafı (URL):</label>
            <input type="text" id="yazarFotoURL" name="yazarFotoURL">

            <button type="submit">Yazar Ekle</button>
        </form>
        <?php
        require_once("baglanti.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $yazarAdi = mysqli_real_escape_string($baglanti, $_POST["yazarAdi"]);
            $yazarSoyadi = mysqli_real_escape_string($baglanti, $_POST["yazarSoyadi"]);
            $yazarWebSayfa = mysqli_real_escape_string($baglanti, $_POST["yazarWebSayfa"]);
            $yazarDoğumTarih = mysqli_real_escape_string($baglanti, $_POST["yazarDoğumTarih"]);
            $yazarÖlümTarih = mysqli_real_escape_string($baglanti, $_POST["yazarÖlümTarih"]);
            $yazarMilliyet = mysqli_real_escape_string($baglanti, $_POST["yazarMilliyet"]);
            $yazarCinsiyet = mysqli_real_escape_string($baglanti, $_POST["yazarCinsiyet"]);
            $yazarFotoURL = mysqli_real_escape_string($baglanti, $_POST["yazarFotoURL"]);

            $sorgu = "INSERT INTO Yazar (yazarAdi, yazarSoyadi, yazarWebSayfa, yazarDoğumTarih, yazarÖlümTarih, yazarMilliyet, yazarCinsiyet, yazarFotoURL) VALUES ('$yazarAdi', '$yazarSoyadi', '$yazarWebSayfa', '$yazarDoğumTarih', '$yazarÖlümTarih', '$yazarMilliyet', '$yazarCinsiyet', '$yazarFotoURL')";
            
            if ($baglanti->query($sorgu) === TRUE) {
                echo "<p>Yazar başarıyla eklendi.</p>";
            } else {
                echo "<p>Yazar eklenirken hata oluştu: " . $baglanti->error . "</p>";
            }
        }
        $baglanti->close();
        ?>
    </main>
    <footer>
        <p style="text-align:center">Bu web sayfası Veri Tabanı Yönetim Sistemleri dersi final projesi kapsamında Miray Tekcan tarafından oluşturulmuştur.</p>
    </footer>
</body>
</html>
