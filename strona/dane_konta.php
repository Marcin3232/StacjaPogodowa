
<?php 
 $login=$_SESSION['login'];
$stmt=$db->prepare("SELECT * FROM uzytkownicy where login=:login");
$stmt->bindValue(":login", $login, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch();
?>
  <div class="modal-dialog modal-dialog-centered modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="dane">Dane Konta:</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
     <p class="text-left"><h4><b> <span class="oi oi-person"></span> Imię: </b><i><?php echo $row[1];?></i></p></h4>
     <p><h4> <b><span class="oi oi-person"></span> Nazwisko: </b><i><?php echo $row[2];?></i></p></h4>
     <p><h4><b> <span class="oi oi-person"></span> Login: </b><i><?php echo $row[3];?></i></p></h4>
     <p><h4><b>  <span class="oi oi-envelope-closed"> Email: </b><i> <?php echo $row[5];?></i></p></h4>
     <p><h4><b>  <span class="oi oi-timer"> Data utworzenia: </b><i> <?php echo $row[8];echo " " ;echo  $row[9];?></i></p></h4>
     <p><h4><b>  <span class="oi oi-timer"> Ostatnie Logowanie: </b><i> <?php echo $row[10];echo " " ;echo  $row[11];?></i></p></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Zamknij</button>

      </div>
      
    </div>
  </div>
