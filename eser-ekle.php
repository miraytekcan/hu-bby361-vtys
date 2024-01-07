<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veri Tabanı Yönetim Sistemleri</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FF67F5;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #67F5FF;
            color: black;
            text-align: center;
            padding: 1em;
        }
        nav {
            color: black;
            background-color: #7167FF;
            overflow: hidden;
        }
        nav ul {
            color: black;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            color: black;
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
            background-color: #FFF867;
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
            <li><a href="listele.php">Katalogta Bulunan Eserler</a></li>
            <li><a href="yazar-listele.php">Katalogta Bulunan Yazarlar</a></li>
            <li><a href="yazar-ekle.php">Yazar Ekleme İşlemleri</a></li>
            <li><a href="eser-ekle.php" class="aktif">Eser Ekleme İşlemleri</a></li>
            <li><a href="eser-sil.php">Eser Silme İşlemleri</a></li>
            <li><a href="eser-guncelle.php">Eser Güncelleme İşlemleri</a></li>
        </ul>
    </nav>
    <main>
        <h2>Eklemek istediğiniz eser hakkında bilgileri girin.</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="eserAdi">Eser Adı:</label>
            <input type="text" id="eserAdi" name="eserAdi" required>

            <label for="eserAciklama">Eser Açıklama:</label>
            <textarea id="eserAciklama" name="eserAciklama" required></textarea>

            <label for="eserDili">Eser Dili:</label>
            <input type="text" id="eserDili" name="eserDili" required>

            <label for="eserISBN">Eser ISBN:</label>
            <input type="text" id="eserISBN" name="eserISBN" required>

            <label for="eserSayfaNo">Sayfa Sayısı:</label>
            <input type="number" id="eserSayfaNo" name="eserSayfaNo" required>

            <label for="eserYayinYeri">Yayın Yeri:</label>
            <input type="text" id="eserYayinYeri" name="eserYayinYeri" required>

            <label for="eserBasimYili">Basım Yılı:</label>
            <input type="number" id="eserBasimYili" name="eserBasimYili" required>

            <label for="eserKapakResimURL">Kapak Resmi URL:</label>
            <input type="text" id="eserKapakResimURL" name="eserKapakResimURL" required>
<?php
require_once("baglanti.php");

$yazarSorgu = "SELECT * FROM Yazar";
$yazarSonuc = $baglanti->query($yazarSorgu);
?>

<label for="yazarID">Yazar:</label>
<select id="yazarID" name="yazarID" required>
    <?php
    while ($yazar = $yazarSonuc->fetch_assoc()) {
        $yazarAdiSoyadi = $yazar['yazarAdi'] . ' ' . $yazar['yazarSoyadi'];
        echo "<option value='" . $yazar['yazarID'] . "'>" . $yazarAdiSoyadi . "</option>";
    }
    ?>
</select>
        <button type="submit">Eser Ekle</button>
        </form>
        <?php
        require_once("baglanti.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $eserAdi = mysqli_real_escape_string($baglanti, $_POST["eserAdi"]);
            $eserAciklama = mysqli_real_escape_string($baglanti, $_POST["eserAciklama"]);
            $eserDili = mysqli_real_escape_string($baglanti, $_POST["eserDili"]);
            $eserISBN = mysqli_real_escape_string($baglanti, $_POST["eserISBN"]);
            $eserSayfaNo = mysqli_real_escape_string($baglanti, $_POST["eserSayfaNo"]);
            $eserYayinYeri = mysqli_real_escape_string($baglanti, $_POST["eserYayinYeri"]);
            $eserBasimYili = mysqli_real_escape_string($baglanti, $_POST["eserBasimYili"]);
            $eserKapakResimURL = mysqli_real_escape_string($baglanti, $_POST["eserKapakResimURL"]);

            $sorgu = "INSERT INTO Eser (eserAdi, eserAciklama, eserDili, eserISBN, eserSayfaNo, eserYayinYeri, eserBasimYili, eserKapakResimURL) VALUES ('$eserAdi', '$eserAciklama', '$eserDili', '$eserISBN', $eserSayfaNo, '$eserYayinYeri', $eserBasimYili, '$eserKapakResimURL')";
            if ($baglanti->query($sorgu) === TRUE) {
                echo "<p>Eser başarıyla eklendi.</p>";
            } else {
                echo "<p>Eser eklenirken hata oluştu: " . $baglanti->error . "</p>";
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
