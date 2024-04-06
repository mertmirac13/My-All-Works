<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8"/>
        <meta http-equiv ="X-UA-Comaptible" content = "IE=edge"/>
        <meta name = "viewport" content = "width=device-width, initial scale=1.0" />
        <title>Etkinliklerimiz</title>
        <link href ="stylish.css" rel ="stylesheet" />
        <link href ="activities.css" rel ="stylesheet" />
        
    </head>
    <body>       
        <nav class ="app__header">
            <a class = "app_logo" href ="http://localhost/denemePHP/success.php">
                <img class="logo-logo" src = "assets\images\it-logo.png" />
                <img class="zep-logo" src = "./assets/images/zep.svg" />
            </a>
            <img class="menu_collapse" src="./assets/images/ctg1.svg"/>
            <ul class ="app__links">
                <li style="color:#fff;" href="http://localhost/denemePHP/blogs.php" >BLOG</li>
                <li href="http://localhost/denemePHP/activities.php" class="active">ETKİNLİKLERİMİZ</li>
                <li style="color:#fff;" href="http://localhost/denemePHP/contactus.php">İLETİŞİM</li>
                <li style="color:#fff;" href="http://localhost/denemePHP/aboutus.php">HAKKIMIZDA</li>
                <li style="color:#fff;" href="http://localhost/denemePHP/success.php">ANASAYFA</li>
            </ul>
        </nav>

        <section class="intro">
          <h1>Timeline <br> &darr; </h1>
        </section>

        <section class="timeline">
          <ul>
            <li>
              <div>
                <p style="color:#fff;"><time>2000</time>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, nihil?</p>
              </div>
            </li>
            <li>
              <div>
                <p style="color:#fff;"><time>2001</time>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, nihil?</p>
              </div>
            </li>
            <li>
              <div>
                <p style="color:#fff;"><time>2002</time>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, nihil?</p>
              </div>
            </li>
            <li>
              <div>
                <p style="color:#fff;"><time>2003</time>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, nihil?</p>
              </div>
            </li>
            <li>
              <div>
                <p style="color:#fff;"><time>2004</time>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, nihil?</p>
              </div>
            </li>
            <li>
              <div>
                <p style="color:#fff;"><time>2005</time>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, nihil?</p>
              </div>
            </li>
            <li> 
              <div>
                <p style="color:#fff;"><time>2006</time>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, nihil?</p>
              </div>
            </li>
            <li>
              <div>
                <p style="color:#fff;"><time>2007</time>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, nihil?</p>
              </div>
            </li>
            <li>
              <div>
                <p style="color:#fff;"><time>2008</time>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, nihil?</p>
              </div>
            </li>
            <li>
              <div>
                <p style="color:#fff;"><time>2009</time>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, nihil?</p>
              </div>
            </li>
            <li>
              <div>
                <p style="color:#fff;"><time>2010</time>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, nihil?</p>
              </div>
            </li>
            <li>
              <div>
                <p style="color:#fff;"><time>2011</time>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, nihil?</p>
              </div>
            </li>
          </ul>
        </section>

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


    var items = document.querySelectorAll('.timeline li');

    function elementInView(el){
    var rect = el.getBoundingClientRect();

    return(
        rect.top>=0 && 
        rect.bottom <= (window.innerHeight ||document.documentElement.clientHeight)
    )

    }

    function callBack(){
        for(var i = 0; i<items.length; i++){
            if(elementInView(items[i])){
                items[i].classList.add("in-view")
            }
        }
    }

    window.onload = callBack;
    window.onresize = callBack;
    window.onscroll = callBack;
  </script>
    
</html>