<?php
include './includes/header.php';
include './includes/navbar.php';
include './utility/utils.php';
// include './allpost.php';
if (!isset($_SESSION['user'])) {
  header("Location: http://localhost/project1/includes/login.php");
}
// print_r($_SESSION['user']);
?>
<?php
         if (isset($_GET["gt"])) {
        $fix=$_GET["gt"];

         }


    include './includes/db.php';
    if (!$conn) {
      return '<h5 style="color: RED">'.'Connection Problem'.'</h5>';
    }
    try {
      $sql='SELECT * FROM post WHERE id=?';
      $stmt=$conn->prepare($sql);
      $stmt->execute([$fix]);
      $result=$stmt->fetch(PDO::FETCH_OBJ);
      $utitle=$result->title;
      $ubody=$result->body;
      
      if(!$result)
      {
        return '<h5 style="color: RED">'.'There is a problem in update'.'</h5>';
      }
      $conn=null;
        
        
    } 
    catch (Exception $e) {
      echo '<h5 class="mt-3" style="color: red;"> Something went wrong! </h5>';
            die();
      
    } 


      ?>
<body>
  <?php
  echo '
    <!-- script here -->
    <div class="container" style="margin-top: 3rem;">
      <div class="border-bottom border-dark border-2">
        <h1>Update Post</h1>
      </div>
    <form action="#" method="post">
      <div class="mb-3 mt-5">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" value="'.$utitle.'" class="form-control" />
      </div>
      <div class="mb-3 mt-4">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="mytextarea" rows="3" name="body">'.$utitle.'</textarea>
      </div>
      <input name="post" type="submit" class="btn btn-primary" value="Post">
    </form>
    
    </div>';
  ?>
</body>
<?php
include './includes/footer.php';
?>