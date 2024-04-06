<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaydol</title>
    <link rel="stylesheet" href="style.css">    
    <h1 class="title">User Registration</h1>
</head>
<body class="bodyimg">
    <?php    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $name_error = '';
        $email_error = '';
        $password_error = '';


        $conn = new mysqli("localhost", "root", "", "register");
        if ($conn->connect_errno > 0) 
        {
            die("<b>Bağlantı Hatası:</b> " . $conn->connect_error);
        }
        
        echo "MySQL bağlantısı başarıyla gerçekleştirildi.";
        // değişkenlerin değerlerini POST süperglobal değişkeniyle alır trim baştaki ve sondaki boşlukları siler
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        
        // isim girişi
        if (empty($name)) {
            $name_error = "Please enter your name";
        }
        
        // email girişi
        if (empty($email)) {
            $email_error = "Please enter your email";
        } 
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $email_error = "Please enter a valid email address";
        }
        
        // şifre girişi
        if (empty($password)) {
            $password_error = "Please enter a password";
        } elseif (strlen($password) < 8) {
            $password_error = "Password must be at least 8 characters long";
        }
        
        // Hata yoksa diğer sayfaya yönlendirir.
        if (empty($name_error) && empty($email_error) && empty($password_error)) {
            $sifre		= $password;
	        $sifreliVeri	= md5($sifre);

            $sql="INSERT INTO `registration`(`name`, `email`, `password`) VALUES ('$name','$email','$sifreliVeri')";

            if (mysqli_query($conn, $sql)) 
            {
                echo "New record created successfully";
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
                
            if (isset($_POST['submit'])) {

                $name_error = '';
                $email_error = '';
                $password_error = '';
                            
            }
            

            session_start();  
            $_SESSION['name'] = $name;

            header("Location: success.php");
            exit();
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
            
            <div class="email-container">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="" required>
                
            </div>
            
            <div class="pass-container">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
            </div>        
            <div class="register-btn" >
                <input type="submit" value="Register">
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
        label.style.color = '#FBAE3C';
      }
    });

    // Optional: Check if inputs have value on page load
    
  });
</script>