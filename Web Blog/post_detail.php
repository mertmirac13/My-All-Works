<?php
            $saniyelikKelime = 2;
            $id = $_GET['id'];
            //mysql işlemleri
            $conn = new mysqli("localhost", "root", "", "blog");
                 if ($conn->connect_errno > 0) 
                 {
                     die("<b>Bağlantı Hatası:</b> " . $conn->connect_error);
                 }
            $sql = "SELECT baslik, yazi, tarih, yazar, resim FROM yazilar WHERE id = $id";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            $baslik = $row["baslik"];
            $blogyazisi = $row["yazi"];
            $tarih = $row["tarih"];
            $yazar = $row["yazar"];
            $resim = $row["resim"];
            
            //okuma süresi hesaplama
            $kelimeSayisi = count(explode(" ", $blogyazisi));
            $okumaZamani = round($kelimeSayisi / $saniyelikKelime);
            $dakika = ceil($okumaZamani / 60);
            
        ?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8"/>
        <meta http-equiv ="X-UA-Comaptible" content = "IE=edge"/>
        <meta name = "viewport" content = "width=device-width, initial scale=1.0" />
        <title><?php echo $baslik; ?></title>
        <link href ="stylish.css" rel ="stylesheet" />
        <link href ="post_detail.css" rel ="stylesheet" />
    </head>
    <body>
        
        <nav class ="app__header">
            <a class = "app_logo" href ="http://localhost/denemePHP/success.php">
                <img class="logo-logo" src = "assets\images\it-logo.png" />
                <img class="zep-logo" src = "./assets/images/zep.svg" />
            </a>
            <img class="menu_collapse" src="./assets/images/ctg1.svg"/>
            <ul class ="app__links">
                <li href="http://localhost/denemePHP/blogs.php" >BLOG</li>
                <li href="http://localhost/denemePHP/activities.php">ETKİNLİKLERİMİZ</li>
                <li href="http://localhost/denemePHP/contactus.php">İLETİŞİM</li>
                <li href="http://localhost/denemePHP/aboutus.php">HAKKIMIZDA</li>
                <li href="http://localhost/denemePHP/success.php">ANASAYFA</li>
            </ul>
        </nav>
        <main class="post_detail-container">
            <img class="post_detail-image" src="<?php echo $resim; ?>">
            <h1><?php echo $baslik; ?></h1> 
            <div class="post-detail-infos">
            <strong class="post-detail-date"><?php echo $tarih; ?></strong>
            <strong class="post-detail-time"> <?php echo $dakika ;?> dakikada okuyabilirsiniz</strong>
            </div>           
            <p><?php echo $blogyazisi; ?></p>
            <strong class="post-writer">Yazar: <?php echo $yazar; ?></strong>
                
        </main>
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll(".app__links li");
  
    links.forEach(function(link) {
      link.addEventListener("click", function(event) {
        event.preventDefault();
        const href = link.getAttribute("href");
        if (href) {
          window.location.href = href;
        }
      });
    });
  });
    </script>
</html>