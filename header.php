<?php

if(!isset($_SESSION)){ 
      session_start(); 
  }  
?>


<!DOCTYPE html>

<html>
  <head>
	<title>Company Name</title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript" ></script> 
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript" ></script> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.min.js" type="text/javascript" ></script>        
      

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styleindex.css">
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<link rel="stylesheet" type="text/css" href="css/styletasks.css">


    <style = "text/css">  
    .messages_display {height: 300px; overflow: auto;}    
    .messages_display .message_item {padding: 0; margin: 0; }   
    .bg-danger {padding: 10px;} 

    </style> 
  </head>
<body>

    <header>
		<nav>
			<h1>Company Name</h1>
			<ul id="navli">
        <li><a class="homered" href="index.php">HOME</a></li>
        <?php
          if(isset($_SESSION['email']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 'admin'){ ?>
            <li><a class="homeblack" href="allTasks.php">allTasks</a></li>
            <li><a class="homeblack" href="viewEmployees.php">viewEmployees</a></li>
            <li><a class="homeblack" href="myProfile.php">myProfile</a></li>
            <li><a class="homeblack" href="logOut.php">Logout</a></li>
          <?php }
          elseif (isset($_SESSION['email']) && !isset($_SESSION['is_admin'])) {?>
              <li><a class="homeblack" href="myProfile.php">myProfile</a></li>
              <li><a class="homeblack" href="myTasks.php">myTasks</a></li>
              <li><a class="homeblack" href="chat.php">chat</a></li>
              <li><a class="homeblack" href="logOut.php">logOut</a></li>
          <?php
          }
          else {
            ?>
            <li><a class="homeblack" href="empLogin.php">Employee Login</a></li>
            <li><a class="homeblack" href="admLogin.php">Admin Login</a></li>
            <?php 
          }

         ?>





			</ul>
		</nav>
	</header>
	