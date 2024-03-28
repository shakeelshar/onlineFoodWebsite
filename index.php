<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
   
    <section class="contr">

    <div class="form login">
        <div class="form-content">
            <header>Login</header>
            <?php
    
    if(isset($_REQUEST['msg'])){
     extract($_REQUEST);
     echo $msg;
    }
 
 
     ?>


            <form action="login_process.php" method="POST">
                <div class="field  input-field">
                    <input type="email"  placeholder="Enter Email" class="input" name="email">
                </div>
                <div class=" field input-field">
                    <input type="password"  placeholder="Enter Password" class="password" name="password">
                    <a class="bx bx-hide eye-icon" style="color: black;"></a>
                </div>
            <div class="form-link">
                <a href="" class="forget-pass"> Forget Password</a>
            </div>

                <div class=" field button-field">
                    <input type="submit" name="login" value="Login">
                </div>


                <div class="form-link">
                   <span>Already Have an Account?</span> <a href="inde2.php" > Sign Up</a>
                </div>
            </form>
        </div>
        <div class="line"></div>


        <div class="media-option">
            <a href="#" class="feild google">
                <i class="bx bxl-facebook fb-icon"></i>
                <span>Login With Facebook</span>
            </a>

        </div>
        <div class="media-option">
            <a href="#" class="feild gb">
                <i class="bx bxl-google go-icon"></i>
                <span style="color: black;">Login with Google</span>
            </a>

        </div>
    </div>
    <!-- Sign Up-->
   
</section>

          <script src="index.js"></script>
</body>

</html>     