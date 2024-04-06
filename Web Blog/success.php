<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8"/>
        <meta http-equiv ="X-UA-Comaptible" content = "IE=edge"/>
        <meta name = "viewport" content = "width=device-width, initial scale=1.0" />
        <title>Anasayfa</title>
        <link href ="stylish.css" rel ="stylesheet" />
    </head>
    <body>
        
        <nav class ="app__header">
            <a class = "app_logo" href ="http://localhost/denemePHP/success.php">
                <img src = "./assets/images/it-logo.png" />
            </a>
            <ul class ="app__links">
                <li href="http://localhost/denemePHP/blogs.php" >BLOG</li>
                <li href="http://localhost/denemePHP/activities.php">ETKİNLİKLERİMİZ</li>
                <li href="http://localhost/denemePHP/contactus.php">İLETİŞİM</li>
                <li href="http://localhost/denemePHP/aboutus.php">HAKKIMIZDA</li>
                <li href="http://localhost/denemePHP/success.php"  class="active">ANASAYFA</li>
            </ul>
        </nav>
        <main>           
            <div class ="app__showcase">
                <div class="app__showcase-info">
                    <h1>MMA Dergi</h1>
                    <p>
                        En yalın tanımıyla yazılım; elektronik bir donanımı, belirli bir işi yapması için derlenmiş komutların bütünüdür. Bu komutlar işlemcilerde işlenerek bir olaya dönüştürülür. Peki Türk Dil Kurumu Sözlüğü‘ne göre yazılım nedir? diye baktığımızda şu tanımla karşılaşıyoruz; Bir bilgisayarda donanıma hayat veren ve bilgi işlemde kullanılan programlar, yordamlar, programlama dilleri ve belgelemelerin tümü.
                    </p>
                    <div class="social">
                        <a href="#" class = "app__social instagram"
                            ><img src="./assets/images/instagram.svg"/>Instagram</a>
                        <a href="#" class = "app__social twitter"
                            ><img src="./assets/images/twitter.svg" />Twitter</a>
                        <a href="https://www.linkedin.com/in/mertmiracarik/" class = "app__social linkedin"
                            ><img src="./assets/images/linkedin.svg" />LinkedIn</a>
                    </div>
                </div>
                <div class="app__showcase-image" style="padding:0px">
                    <img class="app__showcase-image" src="./assets/images/group.svg" style="padding:0px"/>
                </div>
            </div>
           
            <div class="app__post-list">
            <?php
                $conn = new mysqli("localhost", "root", "", "blog");
                if ($conn->connect_errno > 0) 
                {
                    die("<b>Bağlantı Hatası:</b> " . $conn->connect_error);
                }
                $sql = "SELECT id, baslik, yazi, tarih, resim FROM yazilar ORDER BY id DESC LIMIT 5";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);

                               
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $baslik = $row["baslik"];
                    $blogyazisi = $row["yazi"];
                    $tarih = $row["tarih"];
                    $resim = $row["resim"];                    
                    $maxCharacters = 402; 
                    if (strlen($blogyazisi) > $maxCharacters)
                    {
                        $blogyazisi = substr($blogyazisi, 0, $maxCharacters) . '...';
                    }
                    ?>
                    <div class="app__post-card">
                        <a href="/denemePHP/post_detail.php?id=<?php echo $id;?>"><img class="post-image" src="<?php echo $resim; ?>" style="width: 100%;"/></a>
                        <strong class="post-date"><?php echo $tarih; ?></strong>
                        <h3 class="post-title"><?php echo $baslik; ?></h3>
                        <p class="post-info"><?php echo $blogyazisi; ?></p>
                        <a class="post-detail" href="post_detail.php?id=<?php echo $id; ?>">READ MORE</a>
                    </div>
                    <?php
                }
                $conn->close();
            ?>

            </div>
        </main>
        <footer class="footer">
            <img class="fimg" src="./assets/images/it-logo.png"/>
        </footer>
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

