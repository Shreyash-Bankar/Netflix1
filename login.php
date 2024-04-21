<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <?php
    $message="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "netflix"; // Replace with your actual database name
    
        // Create a database connection
        $con = mysqli_connect($server, $username, $password, $database);
    
        // Check for connection success
        if (!$con) {
            die("Connection to this database failed: " . mysqli_connect_error());
        }
    
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $sql = "SELECT password FROM userinfo WHERE email=?";
    
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            // Debugging output
            
    
            if ($password=== $row['password']) {
                
                header("Location: welcome.html");
            } else {
                $message = "Invalid password.";
                // echo "Invalid password.";
            }
        } else {
            // echo "No user found with that email.";
            $message = "No user found with that email.";
        }
    
        // Free result set and close connection
        mysqli_free_result($result);
        mysqli_close($con);
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    
    *{
        margin:0px;
        padding:0px;
    }
    
    .brand__logo {
    width: 100%;
    height: 100%;
}
.navbar__brand {
    position: absolute;
    top: 0;
    width: 10%;
    display: flex;
    justify-content: space-between;
    padding: 3% 5%;
    z-index: 10;
}
.hero__bg__overlay {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 160vh;
    background: rgba(0, 0, 0, 0.4);
    background-image: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0, rgba(0, 0, 0, 0) 60%, rgba(0, 0, 0, 0.8) 100%);
}
.hero__bg__image__container{
    overflow: hidden;
}
.hero__bg__image{
    z-index: -3;
}
    .logincontainer{
        position: absolute;
        display:flex;
        flex-direction: column;
        align-items: center;
        top:20%;
        /* min-height: 707px; */
        padding: 48px 68px;
        background-color: rgba(0, 0, 0, 0.7);
        /* box-sizing: border-box; */
        width:314px;
        left:37%;
        
        
    }
    #email_ph, #password{
        width: 80%;
    
    /* background-color: tra; */
    
    padding-right: 1rem;
    padding-left: 1rem;
    padding-bottom: 0.5rem;
    padding-top: 0.5rem; 
    margin-top:10%;
    height:40px;
    background-color: rgb(17,16,16);
    /* opacity:60%; */
    font-weight: bold;
    border-radius: 4px;
    border: 1px solid gray;
    color:white;
    
}
.signin{
    background-color: red;
    color:white;
    width:92%;
    height: 40px;
    margin-top:10%;
    border-radius: 4px;
    font-size:large;

   }
   /* p{
    margin-top: 10%;
    margin-bottom: 10%;
    font-size: 1.2rem;
    font-weight: 400;
   } */
   h1{
    align-self: flex-start;
    margin-left: 5%;
   }
  
   #remember{
    width: 24px;
    height: 16px;
   }
   .signup,.rememberMe{
    color:white;
    align-self: flex-start;
    margin-left: 5%;
    margin-top: 10%;
    font-size: large;
   }
   .closing{
    color:white;
    align-self: flex-start;
    margin-left: 5%;
    margin-top: 10%;
    font-size: 15px;
    
   }
   .message{
    color:red;
   }

    </style>
</head>
<body>
    <div class="navbar__brand">
        <img decoding="async" src="https://www.freepnglogos.com/uploads/netflix-logo-0.png" alt="logo" class="brand__logo" />
      </div>
      <div class="hero__bg__image__container">
        <img decoding="async" src="https://assets.nflxext.com/ffe/siteui/vlv3/9c5457b8-9ab0-4a04-9fc1-e608d5670f1a/710d74e0-7158-408e-8d9b-23c219dee5df/IN-en-20210719-popsignuptwoweeks-perspective_alpha_website_small.jpg" alt="BG hero image" class="hero__bg__image" />
      </div>
      <div class="hero__bg__overlay"></div>
      <div class="logincontainer">
        <form action="login.php" method="post">
        <h1 style="color:white;font-weight: bolder;">Sign In</h1>
        <span class="message"><?php echo $message; ?></span>
        <input type="text" placeholder="Email or phone number" id="email_ph" name="email">
        <input type="text" placeholder="Password" id="password" name="password">
        <button type="submit" class="signin">Sign In</button>
        <!-- <p style="color:rgb(158,155,156)">OR</p> -->
        <div class="rememberMe">
        <input type="checkbox" name="Remember_me" id="remember">
        <label for="remember">Remember me</label>
        </form>
    </div>
    <div class="signup">
        New to Netflix? <a href="registration.php" style="text-decoration: none; color:white">Sign up now.</a>
    </div>
    <div class="closing">This page is protected by Google reCAPTCHA to ensure you're not a bot. <a href="https://policies.google.com/privacy" style="text-decoration: none;">Learn more.</a></div>
    </div>

</body>
</html>