<?php 
             
             include("php/config.php");
             if(isset($_POST['submit'])){
               $email = mysqli_real_escape_string($con,$_POST['email']);
               $password = mysqli_real_escape_string($con,$_POST['password']);

               $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
               $row = mysqli_fetch_assoc($result);

               if(is_array($row) && !empty($row)){
                   $_SESSION['valid'] = $row['Email'];
                   $_SESSION['username'] = $row['Username'];
                   $_SESSION['id'] = $row['Id'];
               }else{
                   echo "<div class='message'>
                     <p>Wrong Username or Password</p>
                      </div> <br>";
                  echo "<a href='login.php'><button class='btn'>Go Back</button>";
        
               }
               if(isset($_SESSION['valid'])){
                   header("Location: dashboard.html");
               }
             }else{

           
           ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digibloom</title>
    <link rel="stylesheet" href="style/loginstyle.css">
</head>
<body>
    <section class="layout">
        <div class="header">
            <!--empty-->
        </div>

        <div class="main">
            <div class="container">
                <div class="box form-box">
                    <header>DIGIBLOOM</header>
                    <div class="text">
                        <p class="text-1">
                            WELCOME!
                        </p>
                        <p class="text-2">
                            Nice to see you here. Let's Start
                        </p>
                    </div>
                    <form action="" method="post">
                        <div class="field input">
                            <label for="email">Email*</label>
                            <input type="email" name="email" id="email" autocomplete="off" required>
                            <!-- Additional pattern attribute for email format validation -->
                            <small>Format: example@example.com</small>
                        </div>
                        
                        <div class="field input">
                            <label for="password">Password*</label>
                            <input type="password" name="password" id="password" autocomplete="off" required minlength="8" maxlength="8">
                            <!-- Additional minlength attribute for password length validation -->
                        </div>

                        <div class="submit">
                            <input type="submit" name="submit" value="Login" autocomplete="off" required>
                        </div>

                        <div class="links">
                            Don't have an account? <a href="register.php">Sign Up</a>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="footer">
            <!--empty-->
        </div>
      </section>
</body>
</html>
