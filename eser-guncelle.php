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
            background-color: #F8CD4F;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #6EE0E0;
            color: #fff;
            text-align: center;
            padding: 1em;
        }
        nav {
            background-color: #A3C14A;
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
            background-color: #FF8370;
            color: black;
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
        input[type="submit"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #D103D1;
            color: #fff;
            cursor: pointer;
        }
        footer {
            background-color: #E9679B;
            color: #fff;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        input[type="submit"] {
        background-color: #E42256;
        color: #fff;
        cursor: pointer;
        }   
        input[type="submit"]:hover {
        background-color: #FF4500;
        }
                .aktif{
            background-color: #FE8195;
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
            <li><a href="yazar-ekle.php">Yazar Ekleme İşlemleri</a></li>
            <li><a href="eser-ekle.php">Eser Ekleme İşlemleri</a></li>
            <li><a href="eser-sil.php">Eser Silme İşlemleri</a></li>
            <li><a href="eser-guncelle.php" class="aktif">Eser Güncelleme İşlemleri</a></li>
        </ul>
    </nav>
    <main>
        <h2>Buradan katalogta bulunan eserleri güncelleyebilirsiniz.</h2>
        <?php
        require_once("baglanti.php");
        if (isset($_GET['eserID'])) {
            $selectedEserID = $_GET['eserID'];

            $sorgu = "SELECT * FROM Eser WHERE eserID = $selectedEserID";
            $result = $baglanti->query($sorgu);
     
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h2>Güncelleme: " . $row["eserAdi"] . "</h2>";
                echo "<form method='post' action='guncelle.php'>";
                echo "<input type='hidden' name='eserID' value='" . $row["eserID"] . "'>";
                echo "Eser Adı: <input type='text' name='eserAdi' value='" . $row["eserAdi"] . "' required><br>";
                echo "Açıklama: <textarea name='eserAciklama'>" . $row["eserAciklama"] . "</textarea><br>";
                echo "Dil: <input type='text' name='eserDili' value='" . $row["eserDili"] . "' required><br>";
                echo "ISBN: <input type='text' name='eserISBN' value='" . $row["eserISBN"] . "' required><br>";
                echo "Sayfa Sayısı: <input type='number' name='eserSayfaNo' value='" . $row["eserSayfaNo"] . "' required><br>";
                echo "Yayın Yeri: <input type='text' name='eserYayinYeri' value='" . $row["eserYayinYeri"] . "' required><br>";
                echo "Basım Yılı: <input type='number' name='eserBasimYili' value='" . $row["eserBasimYili"] . "' required><br>";
                echo "Kapak Resim URL: <input type='text' name='eserKapakResimURL' value='" . $row["eserKapakResimURL"] . "' required><br>";
                echo "<input type='submit' value='Güncelle'>";
                echo "</form>";
                
                if (isset($_GET['updateStatus'])) {
                    if ($_GET['updateStatus'] == 'success') {
                        echo "<p style='color: green;'>Eser başarıyla güncellendi.</p>";
                    } elseif ($_GET['updateStatus'] == 'error') {
                        echo "<p style='color: red;'>Güncelleme hatası: " . $baglanti->error . "</p>";
                    }
                }
            } else {
                echo "Eser bulunamadı.";
            }
        } else {
            $sorgu = "SELECT eserID, eserAdi FROM Eser";
            $result = $baglanti->query($sorgu);
            if ($result->num_rows > 0) {
                echo "<form method='get'>";
                echo "<label for='eserID'>Güncellenecek eseri seçin:</label>";
                echo "<select name='eserID' id='eserID'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["eserID"] . "'>" . $row["eserAdi"] . "</option>";
                }
                echo "</select>";
                echo "<br>";
                echo "<input type='submit' value='Eseri Güncelle'>";
                echo "</form>";
            } else {
                echo "Eser bulunamadı.";
            }
        }
        $baglanti->close();
        ?>
    </main>
    <footer>
        <p>Bu web sayfası Veri Tabanı Yönetim Sistemleri dersi final projesi kapsamında Miray Tekcan tarafından oluşturulmuştur.</p>
    </footer>
</body>
</html>