<?php
try {
	$conn= new PDO('mysql:host=localhost;dbname=notes',"root","");
} catch (Exception $e) {
	echo "error in connection";
}
?>