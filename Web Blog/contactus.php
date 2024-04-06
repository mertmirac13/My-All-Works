<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8"/>
        <meta http-equiv ="X-UA-Comaptible" content = "IE=edge"/>
        <meta name = "viewport" content = "width=device-width, initial scale=1.0" />
        <title>İletişim</title>
        <link href ="stylish.css" rel ="stylesheet" />
        <link href ="connection.css" rel ="stylesheet" />
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
                <li style="color:#fff;" href="http://localhost/denemePHP/activities.php">ETKİNLİKLERİMİZ</li>
                <li href="http://localhost/denemePHP/contactus.php" class="active">İLETİŞİM</li>
                <li style="color:#fff;" href="http://localhost/denemePHP/aboutus.php">HAKKIMIZDA</li>
                <li style="color:#fff;" href="http://localhost/denemePHP/success.php">ANASAYFA</li>
            </ul>
        </nav>
        <div class="contact-container">
      <h2 style="color:#fff;">Bize Ulaşın</h2>
      <p class="sub-heading">
        İstek, şikayet ve merak ettikleriniz için bize ulaşabilirsiniz!
      </p>

      <form action="">
        <div class="top-section">
          <div class="group">
            <label style="color:#000;" for="fullname">İsim</label>
            <div class="input-container">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                />
              </svg>

              <input type="text" id="fullname" name="fullname"/>
            </div>
          </div>

          <div class="group">
            <label style="color:#000;" for="email">Mail</label>
            <div class="input-container">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6"
              >
                <path
                  stroke-linecap="round"
                  d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25"
                />
              </svg>

              <input type="text" id="email" name="email" />
            </div>
          </div>
        </div>

        <div class="group">
          <label style="color:#000;" for="message">Mesaj</label>
          <textarea name="" id="message" name="message"></textarea>
        </div>

        <div class="btn-container">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"
            />
          </svg>

          <input type="submit" value="Send" />
        </div>

        <div class="error-message"></div>
      </form>
    </div>

    <script src="main.js"></script>
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