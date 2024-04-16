<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <title>Log in your database</title>

    <style>
      @import url('https://fonts.googleapis.com/css?family=Exo&display=swap');

      body {
          margin: 0;
          width: 100%;
          height: 100vh;
          font-size: 20px;
          font-family: "Exo", sans-serif;
          color: #fff;
          background: linear-gradient(-90deg, #000, #293133);
          background-size: 500% 500%;
          animation: gradientBG 20s ease infinite;
      }

      @keyframes gradientBG {
          0% {
              background-position: 0% 50%;
          }
          50% {
              background-position: 100% 50%;
          }
          100% {
              background-position: 0% 50%;
          }
      }

      .login-box {
          width: 280px;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
      }

      .login-box h1 {
          float: left;
          font-size: 40px;
          border-bottom: 6px solid white;
          margin-bottom: 20px;
          padding: 13px 0;
      }

      .textbox {
          width: 100%;
          overflow: hidden;
          font-size: 20px;
          padding: 8px 0;
          margin: 8px 0;
          border-bottom: 1px solid white;
          background: none;
      }

      .textbox i {
          width: 20px;
          float: left;
          text-align: center;
      }

      .textbox input {
          border: none;
          outline: none;
          background: none;
          font-size: 18px;
          color: white;
          float: left;
          margin: 0 5px;
          width: 80%;
      }

      .btn {
          width: 50%;
          text-align: center;
          background: none;
          color: white;
          border: 1px solid white;
          border-radius: 50px;
          outline: none;
          font-size: 18px;
          padding: 5px;
          cursor: pointer;
          margin: 12px 0;
      }
    </style>
  </head>
  <body>
    <div class="login-box">
      <h1>Log in your database.</h1>
      <form id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="textbox">
              <i class="fa fa-user"></i>
              <input type="text" placeholder="Username" name="username" value="">
          </div>
          <div class="textbox">
              <i class="fa fa-lock"></i>
              <input type="password" placeholder="Password" name="password" value="">
          </div>
          <input class="btn" type="submit" name="submit" value="Sign in">
      </form>
    </div>
      
    <?php

      include 'DB_Connection.php';
      ConnectDB_Login();

      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Escapare i dati per prevenire attacchi di SQL injection
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);
    
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) >= 0) {

          echo "Accesso consentito.";
          header('Location:main.php');

        }
        else
        {

          echo "<script>alert('Username or Password is incorrect.')</script>";

        }

      }
      $conn->close();
    ?>

</body>
</html>