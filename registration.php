<?php
$insert = false;
if (isset($_POST['regemail']) && isset($_POST['regpassword'])) {
    $email = $_GET['email'];
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "netflix";

    
    $con = mysqli_connect($server, $username, $password, $database);

    
    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    
    $regemail = $_POST['regemail'];
    $regpassword = $_POST['regpassword'];
    
    
    $stmt = $con->prepare("INSERT INTO userinfo (email, password, dt) VALUES (?, ?, CURRENT_TIMESTAMP())");
    $stmt->bind_param("ss", $regemail, $regpassword);

    
    if ($stmt->execute()) {
        
        $insert = true;
        header("Location: login.php");
        
    } else {
        echo "ERROR: " . $con->error;
    }

    
    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        * {
            font-family: Netflix Sans, Helvetica Neue, Segoe UI, Roboto, Ubuntu, sans-serif;
        }
        .regcontainer {
            width: 25%;
            margin: auto;
            color: rgb(51,51,51);
        }
        p {
            font-size: large;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar__brand" style="width: 96%; height: 7%; display: flex; justify-content: space-between; margin-left: 2%; margin-top: 2%">
            <img decoding="async" src="https://www.freepnglogos.com/uploads/netflix-logo-0.png" alt="logo" class="brand__logo" width="12%" />
            <div class="nav__item">
                <a href="./login.php" style="text-decoration: none; font-size: 1.5rem; color: rgb(83, 79, 79); font-weight: bolder;">Sign in</a>
            </div>
        </div>
    </header>
    <hr>
    <div class="regcontainer">
        <h1>Create a password to start your membership</h1>
        <p>Just a few more steps and you're done!<br>We hate paperwork, too.</p>
        <form action="registration.php" method="post">
            <input type="email" id="email" name="regemail" placeholder="Email" style="width: 100%; height: 50px; margin-bottom: 2%; border-radius: 4px; border: 1px solid rgb(83, 79, 79); padding-left: 15px"><br>
            <input type="password" id="regpassword" name="regpassword" placeholder="Add a password" style="width: 100%; height: 50px; margin-bottom: 2%; border-radius: 4px; border: 1px solid rgb(83, 79, 79); padding-left: 15px">
            <button type="submit" id="next" style="width: 100%; height: 70px; margin-bottom: 2%; border-radius: 4px; background-color: red; color: white; font-size: larger;">Next</button>
        </form>
    </div>
    <script>
        

    </script>
</body>
</html>
