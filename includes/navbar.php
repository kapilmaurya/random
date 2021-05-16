<?php
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/project1/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/project1/post.php">Create</a>
        </li>
      </ul>';
      	session_start();
      	$log=$_SESSION['user'];
      	if (!isset($log)) {
      		echo'
      		<form class="d-flex">
      		 <span class="navbar-text primary">
		        '.$log->username.'
		     </span>
	      <a class="btn btn-outline-success" href="http://localhost/project1/includes/login.php">Login</a>
	      </form>';
      	}
      	else
      	{
      		echo '
      		<form class="d-flex">
      		<div class="dropdown me-5">
			  <button class="btn btn-secondary dropdown-toggle" type="" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"> User
			  </button>
			  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
			 	 <li><a class="dropdown-item" href="#">'.$log->username.'</a></li>
			 	 <li><hr class="dropdown-divider"></li>
			    <li><a class="dropdown-item active" href="allpost.php">All Posts</a></li>
			    <li><a class="dropdown-item" href="#">Update Post</a></li>
			    <li><a class="dropdown-item" href="#">Delete Post</a></li>
			    
			    
			  </ul>
			</div>
	      <a class="btn btn-outline-success" href="includes/logout.php">Logout</a>
	      </form>';
      	}	
      echo'
    </div>
  </div>
</nav>';
?>