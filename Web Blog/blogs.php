<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8"/>
        <meta http-equiv ="X-UA-Comaptible" content = "IE=edge"/>
        <meta name = "viewport" content = "width=device-width, initial scale=1.0" />
        <title>Blog</title>
        <link href ="stylish.css" rel ="stylesheet" />
    </head>
    <body>
        
        <nav class ="app__header">
            <a class = "app_logo" href ="http://localhost/denemePHP/success.php">
                <img class="logo-logo" src = "assets\images\it-logo.png" />
                <img class="zep-logo" src = "./assets/images/zep.svg" />
            </a>
            <img class="menu_collapse" src="./assets/images/ctg1.svg"/>
            <ul class ="app__links">
                <li href="http://localhost/denemePHP/blogs.php" class="active" >BLOG</li>
                <li href="http://localhost/denemePHP/activities.php">ETKİNLİKLERİMİZ</li>
                <li href="http://localhost/denemePHP/contactus.php">İLETİŞİM</li>
                <li href="http://localhost/denemePHP/aboutus.php">HAKKIMIZDA</li>
                <li href="http://localhost/denemePHP/success.php">ANASAYFA</li>
            </ul>
        </nav>
        <main>
        <ul class="app__blog-categories">
        <li class="item <?php if(!isset($_GET['kategori'])) echo ' active'; ?>"><a href="http://localhost/denemePHP/blogs.php">All</a></li>
        <li class="item <?php if(isset($_GET['kategori']) && $_GET['kategori'] === 'Science') echo ' active'; ?>"><a href="http://localhost/denemePHP/blogs.php?kategori=Science">Science</a></li>
        <li class="item <?php if(isset($_GET['kategori']) && $_GET['kategori'] === 'Physics') echo ' active'; ?>"><a href="http://localhost/denemePHP/blogs.php?kategori=Physics">Physics</a></li>
        <li class="item <?php if(isset($_GET['kategori']) && $_GET['kategori'] === 'Chemistry') echo ' active'; ?>"><a href="http://localhost/denemePHP/blogs.php?kategori=Chemistry">Chemistry</a></li>
        <li class="item <?php if(isset($_GET['kategori']) && $_GET['kategori'] === 'Software') echo ' active'; ?>"><a href="http://localhost/denemePHP/blogs.php?kategori=Software">Software</a></li>
        </ul>
            <div class="app__post-list">
            <?php
                 $conn = new mysqli("localhost", "root", "", "blog");
                 if ($conn->connect_errno > 0)
                 {
                     die("<b>Bağlantı Hatası:</b> " . $conn->connect_error);
                 }
                $sql = "SELECT id, baslik, yazi, tarih, resim FROM yazilar";

                if(isset($_GET['kategori'])) {
                    $kategori = $_GET['kategori'];
                    $sql .= " WHERE kategori = '$kategori'";
                }

                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);

                               
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $baslik = $row["baslik"];
                    $blogyazisi = $row["yazi"];
                    $tarih = $row["tarih"];
                    $resim = $row["resim"];                    
                    $maxCharacters = 401; 
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