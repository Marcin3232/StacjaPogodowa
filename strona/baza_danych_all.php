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
  <?php include("plik.php"); ?>

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
                  <li class="nav-item ">
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

      <div class="row1">
        <div class="row justify-content-around">
          <div class="col-8 align-self-center">
            <nav class="navbar navbar-expand-lg navbar-dark ">



              <ul class="navbar-nav">
                <div class="ramka">
                  <li class="nav-item active">
                    <a class="nav-link" href="baza_danych_all.php">Baza Danych <i class="fa fa-book fa-fw"></i>
                      <span class="sr-only">(current)</span>
                    </a>

                  </li>
                </div>
                <div class="ramka">
                  <li class="nav-item">
                    <a class="nav-link" href="" onClick="location.reload();">Odśwież <i class="fa fa-refresh"></i></a>
                  </li>
                </div>
                <div class="ramka">
                  <li class="nav-item">
                    <a class="nav-link" href="start-test.php">Aktualne Dane <i class="fa fa-leaf"></i></a>
                  </li>
                </div>
              </ul>


            </nav>

          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid-sm">
      <?php
      $servername = "localhost";
      $username = "Admin";
      $password = "password";
      $dbname = "database";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
        echo "<a href='install.php'>If first time running click here to install database</a>";
      }
      ?>
      <div class="row2">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
          <table id="mytable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th scope="col"><img class="img-responsive" src="Strona/image/zeg.png" alt="temp" widht="120px" height="120px">Czas Pomiaru</th>
                <th scope="col"><img class="img-responsive" src="Strona/image/tem.png" alt="temp" widht="120px" height="120px">Temperatura</th>
                <th scope="col"><img class="img-responsive" src="Strona/image/wilg.png" alt="temp" widht="120px" height="120px">Wilgotność</th>
                <th scope="col"><img class="img-responsive" src="Strona/image/bar.png" alt="temp" widht="120px" height="120px">Ciśnienie</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM logs ORDER BY id DESC ";
              if ($result = mysqli_query($conn, $sql)) {
                while ($row = mysqli_fetch_row($result)) {
                  echo "<tr>";
                  echo "<td>" . $row[5] . " " . $row[6] . "</td>";
                  echo "<td>" . $row[1] . "°C" . "</td>";
                  echo "<td>" . $row[2] . "%" . "</td>";
                  echo "<td>" . $row[3] . " hPa" . "</td>";
                  echo "</tr>";
                }

                mysqli_free_result($result);
              }

              mysqli_close($conn);
              ?>


          </table>
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
      <script>
        $(document).ready(function() {
          $('#mytable').DataTable();
          $('.dataTables_length').addClass('bs-select');
        });
      </script>
    </div>
  </body>
  <script>


  </script>

  </html>
<?php

} else {
  header("location: home.php");
}
?>