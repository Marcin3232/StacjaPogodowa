<?php
if (isset($_POST['rejestruj'])){
//pobieranie zmiennych z formularza
	$imie= ($_POST['imie']);
	$nazwisko= ($_POST['nazwisko']);
    $login = ($_POST['login1']);
    $haslo1 = ($_POST['haslo1']);
    $haslo2 = ($_POST['haslo2']);
    $email = ($_POST['email']);
    $ip = ($_SERVER['REMOTE_ADDR']);
  	date_default_timezone_set('Europe/Warsaw');
    $dutworzenia = date("Y-m-d");
	$godzutworzenia = date("H:i:s");
  $wynik="";
  $stmt2 = $db->prepare("SELECT COUNT(id) FROM uzytkownicy WHERE email=:email");
  $stmt2->bindValue(":email", $email, PDO::PARAM_STR);
  $stmt2->execute();
  $row2 = $stmt2->fetch();
  
  $stmt3 = $db->prepare("SELECT COUNT(id) FROM uzytkownicy WHERE login=:login");
  $stmt3->bindValue(":login", $login, PDO::PARAM_STR);
  $stmt3->execute();
  $row3 = $stmt3->fetch();


//zapis do bazy
if($row2[0] == 0){
  if($row3[0]==0){
    if($haslo1==$haslo2){

        $sth = $db->prepare('INSERT INTO uzytkownicy(imie,nazwisko,login,haslo,email,logowanie,ip,dutworzenia,godzutworzenia)
        VALUES(:imie, :nazwisko, :login1, :haslo1, :email, :logowanie, :ip, :dutworzenia, :godzutworzenia)');
        $sth->bindValue(':imie',$imie, PDO::PARAM_STR);
        $sth->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR);
                  
        $sth->bindValue(':login1', $login, PDO::PARAM_STR);

        $sth->bindValue(':haslo1', password_hash($haslo1,PASSWORD_BCRYPT), PDO::PARAM_STR);

        $sth->bindValue(':email', $email, PDO::PARAM_STR);

        $sth-> bindValue(':logowanie', time() , PDO::PARAM_STR);

        $sth-> bindValue(':ip', $ip, PDO::PARAM_INT);

        $sth-> bindValue(':dutworzenia', $dutworzenia, PDO::PARAM_STR);

        $sth->bindValue(':godzutworzenia', $godzutworzenia, PDO::PARAM_STR);
        $sth->execute();
        echo "<script language='javascript' type='text/javascript'>alert('Konto zostało utworzone'); </script>"; 
        }
        else{
   
            echo "<script language='javascript' type='text/javascript'>alert('Hasła nie są takie same'); </script>";
    }
    }
    else{
      echo "<script language='javascript' type='text/javascript'>alert('Login jest juz zajety'); </script>";
    }
  }
  else{
    echo "<script language='javascript' type='text/javascript'>alert('Email jest juz zajety'); </script>"; 
  }

  }
   ?>
