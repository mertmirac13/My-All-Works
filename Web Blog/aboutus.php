<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8"/>
        <meta http-equiv ="X-UA-Comaptible" content = "IE=edge"/>
        <meta name = "viewport" content = "width=device-width, initial scale=1.0" />
        <title>Hakkımızda</title>
        <link href ="aboutus.css" rel ="stylesheet"/>
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
                <li href="http://localhost/denemePHP/contactus.php" >İLETİŞİM</li>
                <li href="http://localhost/denemePHP/aboutus.php" class="active">HAKKIMIZDA</li>
                <li href="http://localhost/denemePHP/success.php">ANASAYFA</li>
            </ul>
        </nav>
       <img src="detay2.jpg" class="about-section"></img>

       <div class="inner-container">
                <h1>Biz Kimiz</h1>
                <p style="color:#000;" class="text">NERO Industry which operates in United States of America, Bulgaria and Turkey at Ankara headquarters, is one of the largest subsystem manufacturers in Defence Industry. Our company which is located on a plot of 12.000 m2; has been performing design, manufacture and provide system solutions with its team of experts in their field and strong infrastructure since its foundation in 2009. More than 120 engineers are assigned within its staff of 265 people. Besides, it exports to 35 different countries in the world. While our group companies operate in Space Aviation field, it also comprises one of the largest test centers of the world regarding Defence Industry and military standards.</p>    
                <div class="skills">
            <span>Web Design</span>
            <span>Coding</span>
            <span>Automation</span>
        </div>                          
        </div>
                  
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