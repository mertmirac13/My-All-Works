<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="style.css">    
    <h1 style="display: flex;justify-content: center;align-items: center; margin-top:10rem;color:#fff">Login</h1>
</head>
<body class="bodyimg">
    <?php 
    
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $name_error = '';
        
        $password_error = '';


        $conn = new mysqli("localhost", "root", "", "register");
        if ($conn->connect_errno > 0) 
        {
            die("<b>Bağlantı Hatası:</b> " . $conn->connect_error);
        }
        
        // değişkenlerin değerlerini POST süperglobal değişkeniyle alır trim baştaki ve sondaki boşlukları siler
        $name = trim($_POST["name"]);
        $password = $_POST["password"];
        
        // isim girişi
        if (strlen($password) < 8) {
            $password_error = "Password must be at least 8 characters long";
        }
        
        // Hata yoksa diğer sayfaya yönlendirir.
        if (empty($name_error) && empty($password_error)) {
            $sifre	= $password;
	        $sifreliVeri	= md5($sifre);
            $kayit_bulundu = false;
            $sql = "SELECT * FROM `registration` WHERE name = '$name' AND password = '$sifreliVeri'";

            if ($sonuc = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($sonuc) > 0) {
                    $kayit_bulundu = true;
                }
            }

            if ($kayit_bulundu) {
                
                $_SESSION["name"] = $name;
                header("Location: upload.php");
                exit();
            } 
            else {
                header("Location: registration.php");
            }

            mysqli_close($conn);            
            //echo isset($name) ? htmlspecialchars($name) : '';
        }
    }
    ?>
    
    <form method="post" style="display" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="box">
            <div class="name-container">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="" required>
            
            </div>
            
            <div class="pass-container">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
            </div>        
            <div class="register-btn" >
                <input type="submit" value="Login">
            </div>
        </div>
    </form>
</body>
</html>
<script>    
    const inputs = document.querySelectorAll('.box input');
    inputs.forEach(function(input) {
    input.addEventListener('focus', function() {
      const label = this.parentElement.querySelector('label');
      label.style.top = '0';
      label.style.color = 'transparent';
    });

    input.addEventListener('blur', function() {
      const label = this.parentElement.querySelector('label');
      if (!this.value) {
        label.style.top = '';
        label.style.color = '#fff';
      }
    });
    
});

</script>