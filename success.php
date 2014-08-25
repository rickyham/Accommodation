<?php 
	session_start();
        //sucess message
 		if(!isset($_SESSION['success'])){
 			header("location: index.php");
 			die();
 		}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
	<title> Message Sent! </title>
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/icons/short-cut-icon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
   <!--  <link rel="stylesheet" href="css/bootstrap.min.css">  -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
	
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>

  <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

	<div class="contentWrapWidth hideOverflow relative">
        <div class="innerDIVpostioningAndSIze">
        	<h1 style="font-size: 4em;"> Message Sent! </h1>
        	<h2 style="line-height: 1.5em;"> <?php echo $_SESSION['success']; ?> </h2>
        	<?php
        		$confirm = (isset($_POST['confirm'])) ? $_POST['confirm'] : ""; 
        		if($confirm){
        			unset($_SESSION['success']);
        			header("location: index.php");
        		}
        	?>
        	<form action="" method="post">
        		<input id="confirm-message" type="submit" value="Return to Home" name="confirm" />
        	</form>
        </div>
    </div>
</body>
</html>