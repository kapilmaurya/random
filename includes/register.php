<?php
include './navbar.php';
include './header.php';
?>

<body>
  <div class="container">
    <div style="display: grid; place-content: center; height: 90vh;">
    <h4>Register</h4>
    <form action="#" method="post">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input name="usname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="passwd" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input name="cpasswd" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <input name="submit" type="submit" class="btn btn-primary" value="Register">
    </form>
    <?php
       if (isset($_POST["submit"])) {

            $email=$_POST["email"];
            $uname=$_POST["usname"];
            $pass=$_POST["passwd"];
            $cpass=$_POST["cpasswd"];
            include '../utility/utils.php';
            $error=register($email , $uname , $pass , $cpass);
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