<?php
include './navbar.php';
include './header.php';
?>

<body>
  <div class="container">
    <div style="display: grid; place-content: center; height: 90vh;">
    <form action="#" method="post">
    <h1>Login</h1>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="passwd">
    </div>
    <input type="submit" class="btn btn-primary" name="Login" value="login">
    <div class="mt-3">
      if don't have account <a href="register.php">Register</a>
    </div>
    </form>
    <?php
      if (isset($_POST["Login"])) {

            $email=$_POST["email"];
            $pass=$_POST["passwd"];
            include '../utility/utils.php';
            $error=login($email , $pass);
            if ($error) {
                echo $error;
            }
       }
    ?>

  </div>
  </div>
</body>
<?php
include './footer.php';
?>