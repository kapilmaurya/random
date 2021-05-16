<?php
include './includes/navbar.php';
include './includes/header.php';
include './utility/utils.php';
// if (!isset($_SESSION['user'])) {
//   header("Location: http://localhost/project1/includes/login.php");
// }
// print_r($_SESSION['user']);
?>
<body>
  <div class="container border-bottom border-3 border-dark text-center ">
     <h1>Your Posts</h1>
  </div>
  <div class="container mt-5">
    <div class="row">
    <div class="col-8">
<?php

    include './includes/db.php';
    if (!$conn) {
      return '<h5 style="color: RED">'.'Connection Problem'.'</h5>';
    }
    try {
      $sql='SELECT * FROM post WHERE user=? ORDER BY id DESC';
      $stmt=$conn->prepare($sql);
      $stmt->execute([$log->username]);
      $result=$stmt->fetchALL(PDO::FETCH_OBJ);
      if(!$result)
      {
        return '<h5 style="color: RED">'.'There is no Post'.'</h5>';
      }
      $conn=null;
      foreach($result as $post) {
      	$nm=$post->id;
        echo '<div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">'.$post->title.'</h5>
                  <p class="card-text">'.$post->body.'</p>
                  <small>Post By : '.$post->user.'</small>
                </div>
                <form action="update.php" method="get">
                		<button type="submit" class="btn btn-primary" name="gt" value='.$nm.'>update</button>
					 
					
					</form>

              </div>';
        
        }
    } 
    catch (Exception $e) {
      echo '<h5 class="mt-3" style="color: red;"> Something went wrong! </h5>';
            die();
      
    } 
?>
    </div>


    <div class="col-4">
       <div class="card" >
        <div class="card-body">
          <h5 class="card-title">sidebar</h5>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
<?php
include './includes/footer.php';
?>