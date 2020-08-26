<?php
require_once("config.php");
?>
<?php
session_start();
?>
<?php
if ($_SESSION["zalogowany"] == true) {
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
    <div class="tlo">
      <div class="container-fluid">

        <h2>

          <nav class="navbar navbar-expand-lg navbar-dark ">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="home_zalogowany.php"><i class="fa fa-home fa-fw"></i>&nbsp;Home

                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="start-test.php"><img class="img-responsive" src="Strona/image/tem1.png" alt="temp" widht="29px" height="29px">Czujnik
                      <span class="sr-only">(current)</span>
                    </a>

                  </li>

            </div>
            </ul>

            <div class="dropdown">
              <h2 class="text-light"><span class="oi oi-person"></span> Zalogowany:<?php echo    $_SESSION['login']; ?>

                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </button>
                <div class="dropdown-menu dropdown-right" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" name="wyloguj" href="wyloguj.php">
                    <h4><span class="oi oi-account-login"></span> Wyloguj</h4>
                  </a>
                  <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg" data-target="#dane" href="#">
                    <h4><span class="oi oi-justify-center"></span> Dane Konta</h4>
                  </a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#ustaw" href="#">
                    <h4><span class="oi oi-wrench">Ustawienia</h4>
                  </a>

                </div>
            </div>
        </h2>
      </div>
      <div class="pasek1"></div>
      </nav>



      </h2>
    </div>
    </div>
    <div class="container">

      <div class="row1">

        <h1 class="edit">Czujnik BME280</h1>


      </div>
    </div>
    <div class="container">

      <div class="row">
        <div class="col-md-8">

          <h3 class="tekst">
            <p>Aktualne Dane:</p>



            <?php
            $servername = "localhost";
            $username = "Ximix";
            $password = "password";
            $dbname = "database";

            // polaczenie
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
              die("Database Connection failed: " . $conn->connect_error);
              echo "<a href='install.php'>If first time running click here to install database</a>";
            }
            $sql = "SELECT * FROM logs ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_row($result)

            ?>

            <div class="pasek"></div>
            <div class="row">
              <div class="col-4">
                <img class="img-responsive" src="Strona/image/tem.png" alt="temp" widht="125px" height="125px">
              </div>
              <div class="col-4">
                <p>Temperatura: <?php echo
                                  $row[1]; ?></p>

              </div>

            </div>

            <div class="pasek"></div>

            <div class="row">
              <div class="col-4">
                <img class="img-responsive" src="Strona/image/wilg.png" alt="temp" widht="125px" height="125px">
              </div>
              <div class="col-4">
                <p> Wilgotność: <?php echo
                                  $row[2]; ?></p>
                </p>
              </div>

            </div>

            <div class="pasek"></div>
            <div class="row">
              <div class="col-4">
                <img class="img-responsive" src="Strona/image/bar.png" alt="temp" widht="125px" height="125px">
              </div>
              <div class="col-4">
                <p>Ciśnienie: <?php echo
                                $row[3]; ?></p>
                </p>
              </div>

            </div>
            <div class="pasek"></div>
          </h3>
        </div>
        <div class="col-md-4">

          <div class="list-group">
            <a href="start-test.php" class="list-group-item list-group-item-action active list-group-item-dark" id="zmien1">Aktualne Dane <i class="fa fa-leaf"></i></a>
            <a href="#" class="list-group-item list-group-item-action" id="zmien" onClick="location.reload();">Odśwież <i class="fa fa-refresh"></i></a>
            <a href="baza_danych_all.php" class="list-group-item list-group-item-action" id="zmien">Baza Danych <i class="fa fa-book fa-fw"></i> </a>


          </div>
          <p></p>
          <p></p>
          <p></p>
          <p></p>
          <p></p>
          <div class="ramka">
            Czas Pomiaru:
            <p><?php echo $row[5]; ?> <?php echo $row[6]; ?></p>
          </div>
        </div>
      </div>
      <div class="modal hide fade bd-example-modal-lg " id="dane" tabindex="-1" role="dialog" aria-labelledby="dane" aria-hidden="true" style="display: none;">
        <?php include("dane_konta.php"); ?>
      </div>
      <div class="modal hide fade bd-example-modal-lg " id="ustaw" tabindex="-1" role="dialog" aria-labelledby="dane" aria-hidden="true" style="display: none;">
        <?php include("ustawienia.php"); ?>
      </div>
      <script type="text/javascript">

      </script>
  </body>

  </html>
<?php
} else {
  header("location: home.php");
}
?>
<?php
mysqli_close($conn);
?>