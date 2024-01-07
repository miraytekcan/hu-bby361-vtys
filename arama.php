<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veri Tabanı Yönetim Sistemleri</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #D2FBA4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #88CA5E;
            color: #fff;
            text-align: center;
            padding: 1em;
        }
       
        main img {
            margin-left: 5px;
            max-width: 13%;
            height: auto;
            display: left; 
        }

        nav {
            background-color: #FF8700;
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
            background-color: #F9D030;

        }
        
        input[type="submit"] {
        background-color: #E0A030;
        color: black;
        cursor: pointer;
    }

        input[type="submit"]:hover {
            background-color: #F62AA0;
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
            background-color: #4EFAFE;
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
            <li><a href="arama.php" class="aktif">Arama</a></li>
            <li><a href="listele.php">Katalogta Bulunan Eserler</a></li>
            <li><a href="yazar-listele.php">Katalogta Bulunan Yazarlar</a></li>
            <li><a href="yazar-ekle.php">Yazar Ekleme İşlemleri</a></li>
            <li><a href="eser-ekle.php">Eser Ekleme İşlemleri</a></li>
            <li><a href="eser-sil.php">Eser Silme İşlemleri</a></li>
            <li><a href="eser-guncelle.php">Eser Güncelleme İşlemleri</a></li>
        </ul>
    </nav>

    <main>
        <h2>Katalog içerisinde arama yapmak için aşağıdaki alanı kullanın.</h2>
        <form method="post" action="">
            <label for="aramaKelimesi">Arama Kelimesi:</label>
            <input type="text" id="aramaKelimesi" name="aramaKelimesi" required>
            <input type="submit" value="Ara">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $aramaKelimesi = $_POST['aramaKelimesi'];

            require_once("baglanti.php");

            $sorgu = "SELECT Eser.eserID, Eser.eserAdi, Eser.eserAciklama, Eser.eserDili, Eser.eserISBN, Eser.eserSayfaNo, Eser.eserYayinYeri, Eser.eserBasimYili, Eser.eserKapakResimURL,
                            GROUP_CONCAT(Yazar.yazarAdi, ' ', Yazar.yazarSoyadi SEPARATOR ', ') AS yazarlar,
                            YayınEvi.yayinEvi_Adi
                    FROM Eser
                    LEFT JOIN EserYazar ON Eser.eserID = EserYazar.eserID
                    LEFT JOIN Yazar ON EserYazar.yazarID = Yazar.yazarID
                    LEFT JOIN YayınEvi ON Eser.yayinEvi_ID = YayınEvi.yayinEvi_ID
                    WHERE Eser.eserAdi LIKE '%$aramaKelimesi%' OR Yazar.yazarAdi LIKE '%$aramaKelimesi%' OR Yazar.yazarSoyadi LIKE '%$aramaKelimesi%'
                    GROUP BY Eser.eserID";
            
            $result = $baglanti->query($sorgu);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Eser bilgilerini ekrana yazdırma
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
                echo "Arama sonuçları bulunamadı.";
            }
            $baglanti->close();
        }
        ?>
    </main>
    <footer>
        <p style="text-align:center">Bu web sayfası Veri Tabanı Yönetim Sistemleri dersi final projesi kapsamında Miray Tekcan tarafından oluşturulmuştur.</p>
    </footer>
</body>
</html>