<?php
  require "php/db_connect.php";
  require "php/function.php";
  $msg = " ";
  if (isset($_POST['submit'])) {
    $username=get_safe_value($conn,$_POST['user']);
    $password=get_safe_value($conn,$_POST['pass']);
    $sql = "SELECT * FROM `pcj_admin_user` WHERE pcj_adm_name = '$username' AND pcj_adm_password = '$password'" ;
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if ($count>0) {
      $_SESSION['ADMIN_LOGIN']='yes';
      $_SESSION['ADMIN_USERNAME']=$username;
      header('location:catagories.php');
      die();
    }
    else {
      $msg="username or password is incorract";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="css/signin.css" rel="stylesheet">
</head> 
<body class="text-center">
    
    <main class="form-signin">
      <form method="POST">
        <img class="mb-4" src="img/logo/LOGO.jpg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="user" placeholder="Username" required>
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>
    
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted"><?php echo $msg;?></p>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
      </form>
    </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>