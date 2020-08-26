<?php
require_once("config.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="Strona/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Strona/main1.css">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="Strona/open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery.min.js"></script>
  <script src="Strona/js/bootstrap.min.js"></script>
  <script language="javascript" type="text/javascript" src="Strona/js/haslocorrect.js"></script>
  <script language="javascript" type="text/javascript" src="Strona/js/haslonext.js"></script>
  <script language="javascript" type="text/javascript" src="Strona/js/rejestracja.js"></script>

</head>



<body>
  <main>
  </main>
  <div class="tlo ">
    <div class="container-fluid ">


      <h2>

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


      </h2>
    </div>
    <div class="pasek1 "></div>
    </nav>



    </h2>
  </div>
  </div>


  <div class="container">

    <div class="row1">

      <h1 class="edit"><i class="fa fa-home fa-fw"></i> Strona główna</h1>
    </div>

    <?php
    require_once("Strona/config.php");
    require_once("Strona/rejestracja.php");
    require_once("Strona/logowanie.php");
    ?>

    <div class="row">
      <div class="col-md-8">
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



      </div>
      <div class="col-md-4">

        <div id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button type="button" class="btn btn-link text-light" data-toggle="modal" data-target="#myModal">
                  <h2> Rejestracja</h2>
                </button>
              </h2>
            </div>


          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed text-light" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <h2> Zaloguj</h2>
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                <form method="POST" action="home.php">
                  <div class="form-group text-light">
                    <label for="login"><span class="oi oi-person"></span> Login<div class="pasek1"></div></label>
                    <input type="login" name="login" class="form-control dark" id="przykladowyEmail" placeholder="np.: JanNick123">
                  </div>
                  <div class="form-group text-light">
                    <label for="Haslo"><span class="oi oi-lock-locked"></span> Hasło<div class="pasek1"></div></label>
                    <input type="password" name="haslo" class="form-control" id="przykladoweHaslo" placeholder=" Wpisz hasło">
                  </div>

                  <button type="submit" class="btn btn-secondary btn-lg" name="loguj" value="Utwórz konto"> Zaloguj </button>


                </form>

              </div>
            </div>
          </div>

        </div>

      </div>


    </div>
  </div>
  <!-- The Modal -->

  <div class="modal fade  " id="myModal">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">Rejestracja</h1>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body modal-dark left">
          <!-- formularz -->

          <form class="form" method="POST" action="">
            <!-- pole imie -->
            <div class="form-group">
              <label for="Imie">
                <h2 class="dark"><span class="oi oi-person"></span> Imię:</h2>
              </label>
              <input type="text" class="form-control form-control-lg " onblur='return  rejestracja()' id="Imie" name="imie" pattern='^[A-Z]{1,1}[a-z]{2,28}$' required aria-describedby="podpowiedzImie" placeholder="np.: Jan">
              <h4><small id="podpowiedzImie" class="form-text text-muted">Wpisz Imię Z Dużej litery i bez znakow specjalnych i cyfr.</small></h4>
            </div>
            <!-- pole nazwisko -->
            <div class="form-group">
              <label for="Nazwisko">
                <h2 class="dark"><span class="oi oi-person"></span> Nazwisko:</h2>
              </label>
              <input type="text" class="form-control form-control-lg " onblur='return  rejestracja1()' id="Nazwisko" name="nazwisko" pattern='^[A-Z]{1,1}[a-z]{2,28}$' required aria-describedby="podpowiedzNazwisko" placeholder="np.: Kowalski">
              <h4><small id="podpowiedzNazwisko" class="form-text text-muted">Wpisz Nazwisko z Dużej litery i bez znakow specjalnych i cyfr</small></h4>
            </div>
            <!-- pole Login -->
            <div class="form-group">
              <label for="login">
                <h2 class="dark"><span class="oi oi-person"></span> Login:</h2>
              </label>
              <input type="text" class="form-control form-control-lg " onblur='return  rejestracja2()' id="login" name="login1" pattern='^[0-9a-zA-Z.-]{6,28}$' required aria-describedby="podpowiedzlogin" placeholder="np.: JanKowalski123">
              <h4><small id="podpowiedzlogin" class="form-text text-muted">Wpisz login bez znaków specjalnych.</small></h4>
            </div>
            <!-- pole email -->
            <div class="form-group">
              <label for="email">
                <h2 class="dark"><span class="oi oi-envelope-closed"></span> Email:</h2>
              </label>
              <input type="email" class="form-control form-control-lg " onblur='return  rejestracja3()' id="email" name="email" required aria-describedby="podpowiedzemail" placeholder="np.: jankowalski@gmail.com">
              <h4><small id="podpowiedzemail" class="form-text text-muted">W powyższym polu wpisujesz swój Email.</small></h4>
            </div>
            <!-- pole haslo -->
            <div class="form-group">
              <label for="haslo">
                <h2 class="dark"><span class="oi oi-lock-locked"></span> Hasło:</h2>
              </label>
              <input type="password" onblur='return haslocorrect()' class="form-control form-control-lg " required id="haslo" name="haslo1" aria-describedby="podpowiedzhaslo" placeholder="Haslo powinno zawierać Duże i Małe litery oraz cyfry i znaki specjalne">
              <h4><small id="podpowiedzhaslo" class="form-text text-muted">W powyższym polu wpisujesz swoje hasło.</small></h4>
            </div>
            <!-- pole powtorz haslo -->
            <div class="form-group">
              <label for="haslo1">
                <h2 class="dark"><span class="oi oi-lock-locked"></span> Powtórz Hasło:</h2>
              </label>
              <input type="password" class="form-control form-control-lg " onblur='return  haslonext()' required id="haslo1" name="haslo2" aria-describedby="podpowiedzhaslo1" placeholder="Powtórz hasło.">
              <h4><small id="podpowiedzhaslo1" class="form-text text-muted">W powyższym polu wpisz ponownie hasło.</small></h4>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <h1 class="text-dark">
            <div id="registerResult"></div>
          </h1>
          <button type="reset" class="btn btn-secondary btn-lg" data-dismiss="modal">Anuluj</button>
          <button type="submit" class="btn btn-secondary btn-lg" name="rejestruj" value="Utwórz konto"> Rejestruj </button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    function rejestracja1() {
      var imieregex = new RegExp("^[A-Z]{1,1}[a-z]{2,28}$");
      var nazwisko = document.getElementById("Nazwisko").value;
      var sprawdz1 = imieregex.test(nazwisko);
      var registerResult1 = document.getElementById("podpowiedzNazwisko");
      if (nazwisko == '') {
        registerResult1.innerHTML = '<h4 class="text-danger"><span class="oi oi-x"></span> Nie wpisano Nazwiska!</h4>';
      } else if (!sprawdz1) {
        registerResult1.innerHTML = '<h4 class="text-danger"><span class="oi oi-x"></span>Nazwisko powinno zaczynać się z dużej litery!</h4>';
      } else {
        registerResult1.innerHTML = '<h4 class="text-success"><span class="oi oi-check"></span>Nazwisko jest poprawne!</h4>';
      }
      return true;
    }

    function rejestracja2() {
      var regex = new RegExp("^[0-9a-zA-Z.-]{6,28}$");
      var nazwisko = document.getElementById("login").value;
      var sprawdz1 = regex.test(nazwisko);
      var registerResult1 = document.getElementById("podpowiedzlogin");
      if (nazwisko == '') {
        registerResult1.innerHTML = '<h4 class="text-danger"><span class="oi oi-x"></span> Nie wpisano Loginu!</h4>';
      } else if (!sprawdz1) {
        registerResult1.innerHTML = '<h4 class="text-danger"><span class="oi oi-x"></span>Login może zawierać duże, małe litery oraz cyfry!</h4>';
      } else {
        registerResult1.innerHTML = '<h4 class="text-success"><span class="oi oi-check"></span>Login jest poprawny!</h4>';
      }
      return true;
    }

    function rejestracja3() {
      var regex = new RegExp("^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$");
      var nazwisko = document.getElementById("email").value;
      var sprawdz1 = regex.test(nazwisko);
      var registerResult1 = document.getElementById("podpowiedzemail");
      if (nazwisko == '') {
        registerResult1.innerHTML = '<h4 class="text-danger"><span class="oi oi-x"></span> Nie wpisano Emailu!</h4>';
      } else if (!sprawdz1) {
        registerResult1.innerHTML = '<h4 class="text-danger"><span class="oi oi-x"></span>Niepoprawnie wpisany email!(przykladowyemail@o2.pl)</h4>';
      } else {
        registerResult1.innerHTML = '<h4 class="text-success"><span class="oi oi-check"></span>Email jest poprawny!</h4>';
      }
      return true;
    }
  </script>
</body>

</html>