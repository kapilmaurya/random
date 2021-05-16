<?php
session_start();
session_unset();
session_destroy();
header("location: http://localhost/project1/index.php");
?>