<?php
	echo'
	<!doctype html>
    <html lang="en">
	<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

     <!--tinymce -->
     <script src="https://cdn.tiny.cloud/1/sircwi4vumav73ovrwj64iud3q10p34p38bz336r0yvipk0s/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: "#mytextarea",
      menubar:false,
      statusbar: false,
    });
  </script>

    <title>Hello, world!</title>
  </head>';
?>