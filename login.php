<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <title>Log in your database</title>
    <link rel="stylesheet" href="login_style.css">
  </head>
  <body>
    <div class="login-box">
      <h1>Log in your database.</h1>
      <form id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="textbox">
          <i class="fa fa-user"></i>
          <input type="text" placeholder="Username" name="username" value="<?php echo $username;?>">
        </div>
        <div class="textbox">
          <i class="fa fa-lock"></i>
          <input type="password" placeholder="Password" name="password" value="<?php echo $password;?>">
        </div>
          <input class="btn" type="submit" name="submit" value="Sign in">
        </div>
      </form>
      <?php
        session_start();
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include 'DB_Connection.php';
        $connection = Connection();
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $username = $_POST['username'];
          $password = $_POST['password'];
          
          // Escapazione dei dati per revenire attacchi di tipo SQL Injection
          $username = $connection->real_escape_string($username);
          $password = $connection->real_escape_string($password);
      
          // Hash della password
          $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      
          $stmt = $connection->prepare("SELECT * FROM users WHERE User =?");
          $stmt->bind_param("s", $username);
          $stmt->execute();
          $result = $stmt->get_result();
      
          if ($result->num_rows > 0)
          {
            $row = $result->fetch_assoc();
            if (password_verify($row['Password'],$hashed_password))
            {
              echo "Accesso consentito.";
              $_SESSION['username'] = $username;
              header('Location: main.php');
            }
            else
            {
              echo "Password errata.";
            }
          }
          else
          {
            echo "Utente non trovato.";
          }

          $stmt->close();
        }
        $connection->close();
      ?>
</body>
</html>