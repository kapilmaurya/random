<?php
include './includes/header.php';
include './includes/navbar.php';
include './utility/utils.php';
if (!isset($_SESSION['user'])) {
  header("Location: http://localhost/project1/includes/login.php");
}
// print_r($_SESSION['user']);
?>
<body>
	  <!-- script here -->
	
		<div class="container" style="margin-top: 3rem;">
			<div class="border-bottom border-dark border-2">
				<h1>Create Post</h1>
			</div>
		<form action="#" method="post">
			<div class="mb-3 mt-5">
				<label for="exampleFormControlInput1" class="form-label">Title</label>
				<input type="text" class="form-control" id="exampleFormControlInput1" name="title">
			</div>
			<div class="mb-3 mt-4">
				<label for="exampleFormControlTextarea1" class="form-label">Description</label>
				<textarea class="form-control" id="mytextarea" rows="3" name="body"></textarea>
			</div>
			<input name="post" type="submit" class="btn btn-primary" value="Post">
		</form>
		<?php
	       if (isset($_POST["post"])) {

	            $title=$_POST["title"];
	            $body=$_POST["body"];
	            // include '../utility/utils.php';
	            $error=createpost($title , $body , $log->username);
	            if ($error) {
	                echo $error;
	            }
	       }
	    ?>
		</div>
</body>
<?php
include './includes/footer.php';
?>