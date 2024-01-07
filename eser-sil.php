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
            background-color: #FF5765;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #FFDB15;
            color: black;
            text-align: center;
            padding: 1em;
        }
        nav {
            background-color: #8A6FDF;
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
            background-color: #059DC0;
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
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }
        footer {
            background-color: #A8E10C;
            color: black;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        input[type="submit"] {
        background-color: #EE7840;
        color: #fff;
        cursor: pointer;
    }

        input[type="submit"]:hover {
            background-color: #6AF2F0;
}
                .aktif{
            background-color: #81EBFE;
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
            <li><a href="eser-sil.php" class="aktif">Eser Silme İşlemleri</a></li>
            <li><a href="eser-guncelle.php">Eser Güncelleme İşlemleri</a></li>
        </ul>
    </nav>
    <main>
        <h2>Buradan katalogta bulunan eserleri silebilirsiniz.</h2>
        <form method="post" action="sil.php">
            <label for="eserID">Silmek istediğiniz eseri seçin:</label>
            <?php
            require_once("baglanti.php");
            $sorgu = "SELECT eserID, eserAdi FROM Eser";
            $result = $baglanti->query($sorgu);

            if ($result->num_rows > 0) {
                echo "<select name='eserID' id='eserID'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["eserID"] . "'>" . $row["eserAdi"] . "</option>";
                }
                echo "</select>";
            } else {
                echo "Eser bulunamadı.";
            }
            $baglanti->close();
            ?>
            <br>
            <input type="submit" value="Eseri Sil">
        </form>
    </main>
    <footer>
        <p>Bu web sayfası Veri Tabanı Yönetim Sistemleri dersi final projesi kapsamında Miray Tekcan tarafından oluşturulmuştur.</p>
    </footer>
</body>
</html>