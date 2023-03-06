<!DOCTYPE HTML>  
<html>
<head>
<style>

    .gradient-custom {
        min-height: 101vh;
        background: #6a11cb;
        background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
        background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }

    .error {
        color: #FF0000;
    }

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>  
    <?php 
    $emailErr = $passwordErr = $usernameErr = ""; 
    $email = $password = $username = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["username"])) {
            $usernameErr = "Useranme is required";
        } else {
            $username = test_input($_POST["username"]);
          } 

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
          } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
              }
          }
          
          if (empty($_POST["password"])) {
              $passwordErr = "Password is required";
          } else {
              $password = test_input($_POST["password"]);
            }    
        }
    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
    ?>


<section class="gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h2 class="mb-5 h2">Sign in</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div class="form-outline mb-4">
              <input type="text" class="form-control form-control-lg mb-3" id="username" name="username" placeholder="Username" <?php echo $username?> value="">
            <span class="error"><?php echo $usernameErr;?></span>
            </div>

            <div class="form-outline mb-4">
              <input type="text" class="form-control form-control-lg mb-3" id="email" name="email" placeholder="Email" <?php echo $email?> value="">
              <span class="error"><?php echo $emailErr;?></span>
            </div>

            <div class="form-outline mb-4">
              <input type="password" class="form-control form-control-lg mb-3" id="pwd" name="password" placeholder="Password" <?php echo $password?> value="">
            <span class="error"><?php echo $passwordErr;?></span>
            </div>
            <button class="btn btn-primary btn-lg btn-block mt-2 mb-4" type="submit">Login</button>

    <?php
    echo "<h3>Your Input:</h3> <br/>";

    if (empty($_POST["username"])) {
        ?>
          <span class="error"><?php echo $usernameErr; ?></span>
        <?php
        } else {
          echo $username;
        }
    
    echo "<br><br>";
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        ?>
        <span class="error"><?php echo $emailErr; ?></span>
      <?php
      } else {
        echo $email;
    }
    
    echo "<br><br>";
        
    if (empty($_POST["password"])) {
        ?>
          <span class="error"><?php echo $passwordErr; ?></span>
        <?php
        } else {
          echo $password;
        }    

?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>  
</body>
</html>
