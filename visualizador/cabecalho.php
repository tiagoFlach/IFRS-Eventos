<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Tiago Lucas Flach">

    <title><?php echo $titulo; ?></title>
    <link href="imagens/favicon.ico" rel="Shortcut Icon" /> 

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Moments, Datepicker, Clockpicker, Sweetalert-->  
    <script src="plugins/moment/moment.js"></script>
    <script src="plugins/datepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="plugins/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
    <script src="plugins/sweetalert/dist/sweetalert2.min.js"></script>


    <link rel="stylesheet" href="plugins/datepicker/build/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="plugins/clockpicker/dist/bootstrap-clockpicker.min.css" />
    <link rel="stylesheet" href="plugins/sweetalert/dist/sweetalert2.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
   
    <!-- Custom CSS -->
    <link href="css/estilo.css" rel="stylesheet">

    <?php 
        if(isset($js)){ echo $js; }
    ?>
</head>
<body>
    <div id="wrap">
        <!-- Page Content -->
        <div class="container">
            <div class="row">
            	<div class="col-md-12">
                    <img src="imagens/logo.png" class="img-responsive leftspan" id="logo">
    			</div>
            
			
       
