<?php
require_once("config.php");
?>
<?php 
session_start();
?>
<?php
if($_SESSION["zalogowany"]==true){
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Strona/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="Strona/main1.css">
       
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link href="open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet"> 
	<script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="Strona/js/bootstrap.min.js"></script>
    <script language="javascript" type="text/javascript" src="Strona/js/haslocorrect.js"></script>
    <script language="javascript" type="text/javascript" src="Strona/js/haslonext.js"></script>
    <script language="javascript" type="text/javascript" src="Strona/js/rejestracja.js"></script>

        </head>
<body>
<main>
</main>
<div class="tlo">
<div class="container-fluid">

		   <h2 >

<nav class="navbar navbar-expand-lg navbar-dark ">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"><i class="fa fa-home fa-fw"></i>&nbsp;Home

              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="start-test.php"><img class="img-responsive" src="Strona/image/tem1.png" alt="temp" widht="29px" height="29px">Czujnik  
		                  <span class="sr-only">(current)</span>
		  </a>
		  
        </li>

        
 </div>
</ul>

<div class="dropdown">
<h2 class="text-light"><span class="oi oi-person"></span> Zalogowany:<?php echo    $_SESSION['login'] ; ?>

  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

  </button>
  <div class="dropdown-menu dropdown-right"  aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" name="wyloguj" href="wyloguj.php"><h4><span class="oi oi-account-login"></span> Wyloguj</h4></a>
    <a class="dropdown-item"  data-toggle="modal" data-target=".bd-example-modal-lg" data-target="#dane" href="#"><h4><span class="oi oi-justify-center"></span> Dane Konta</h4></a>
    <a class="dropdown-item"  data-toggle="modal"  data-target="#ustaw" href="#"><h4><span class="oi oi-wrench">Ustawienia</h4></a>

  </div>
</div>
</h2>
  </div>  <div class="pasek1"></div>
</nav>

 
 
</h2>
</div>
</div>  


<div class="container">

<div class="row1">

<h1 class="edit"><i class="fa fa-home fa-fw"></i> Strona główna</h1>
</div>



<div class="row">
  <div class="col-md-12">
    <div class="row1">
    <p></p>
  <h2 class="text-light">Projekt z OI i TiTS</h2>
  <p></p>
<div id="przykladowaKaruzela2" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img class="c-block w-50 h-25" src="Strona/image/r1.jpg" alt="Pierwszy slajd">
    </div>
    <div class="carousel-item">
    <img class="c-block w-50 h-25" src="Strona/image/r4.jpg" alt="Drugi slajd">
    </div>

  </div>
  <a class="carousel-control-prev" href="#przykladowaKaruzela2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Poprzedni</span>
  </a>
  <a class="carousel-control-next" href="#przykladowaKaruzela2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Następny</span>
  </a>
</div>
    <div class="row justify-content-center">
    <div class="col-8">
         <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">



      </div>
    </div>   
	  
	  
    </div>
  </div>
    <div class="row justify-content-center">
</div>
  </div>

  
  </div>

    </div>
  </div>


  <div class="modal hide fade bd-example-modal-lg " id="dane" tabindex="-1" role="dialog" aria-labelledby="dane" aria-hidden="true" style="display: none;">
<?php include("dane_konta.php");?>
</div>
<div class="modal hide fade bd-example-modal-lg " id="ustaw" tabindex="-1" role="dialog" aria-labelledby="dane" aria-hidden="true" style="display: none;">
<?php include("ustawienia.php");?>
</div>
<script type="text/javascript">

    </script>
</body>
 
</html>

<?php

}
else{
  header("location: home.php");
}
?>







