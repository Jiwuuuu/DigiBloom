<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digibloom</title>
    <link rel="stylesheet" href="style/loginstyle.css">
    <style>
        .message {
            width: 286px; 
            height: 409px;
            position: relative;
            top: 68px;
            left: 137px;
        }

        .message .star {
            position: relative;
            top: 114px;
            left: 79px;
        }

        .message .text-1{
            position: relative;
            top: 295px;
            left: 15px;
            font-size: 30px;
            font-weight: 700;
            letter-spacing: -0.3px;
            line-height: 39px;
            font-family: "Poppins", Helvetica;
        }

        .btn {
            position: relative ;
            width: 439px;
            height: 62px;
            background-color: #a2ffbd;
            border-radius: 15px;
            top: 150px;
            left: 61px;
        }

        .btn:hover {
            background-color: #84CD9A;
        }

        .progress-bar-1-2 {
            position: relative;
            top: 61px;
            left: 129px;
        }
    </style>
</head>
<body>
    <section class="layout">
        <div class="header">
            <!--empty-->
        </div>

        <div class="main">
            <div class="container">
                <div class="box form-box">

                <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Username,Email,Password) VALUES('$username','$email','$password')") or die("Erroe Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='login.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
                
                ?>

                    <img class="progress-bar-1-2" src="img/progress-bar-1-2.png">
                    <div class="text">
                        <p class="text-1">
                            Create an account
                        </p>
                        <p class="text-2">
                            Create an account and get access to quick and on-time transactions
                        </p>
                    </div>
                    <form action="" method="post">
                        <div class="field input">
                            <label for="username">Username*</label>
                            <input type="text" name="username" id="username" autocomplete="off" required>
                        </div>

                        <div class="field input">
                            <label for="email">Email*</label>
                            <input type="email" name="email" id="email" autocomplete="off" required>
                            <!-- Additional pattern attribute for email format validation -->
                            <small>Format: example@example.com</small>
                        </div>

                        <div class="field input">
                            <label for="password">Password*</label>
                            <input type="password" name="password" id="password" autocomplete="off" required minlength="8" maxlength="8">
                            <!-- Additional minlength and maxlength attributes for password length validation -->
                        </div>

                        <div class="submit">
                            <input type="submit" name="submit" value="Create Account" required>
                        </div>
                        <div class="links">
                            Already have an account? <a href="login.php">Log in</a>
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