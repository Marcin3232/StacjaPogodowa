<?php
$_SESSION['zalogowany'] =0 ;

if (isset($_POST['loguj']))
{
    $login = ($_POST['login']);
    $haslo = ($_POST['haslo']);
    $ip = ($_SERVER['REMOTE_ADDR']);
    $stmt=$db->prepare("SELECT id FROM uzytkownicy where login=:login");
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch();

    $stmt2=$db->prepare("SELECT haslo FROM uzytkownicy where  login=:login");
    $stmt2->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt2->execute();
    $row2 = $stmt2->fetch();

    if ($row[0]>0 )
    {

       if(password_verify($haslo,$row2[0])==true)
        {

        echo "<script language='javascript' type='text/javascript'>alert('Udało się zalogowac'); </script>";
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['zalogowany'] =true ;
        date_default_timezone_set('Europe/Warsaw');
        $dlog= date("Y-m-d");
        $glog = date("H:i:s");
        $sth = $db->prepare('UPDATE uzytkownicy SET dlog=:dlog,glog=:glog
        WHERE login=:login');
        $sth->bindValue(':dlog',$dlog, PDO::PARAM_STR);
        $sth->bindValue(':glog', $glog, PDO::PARAM_STR);
        $sth->bindValue(':login',$login, PDO::PARAM_STR);
        $sth->execute();
        $msg="wiadomosc";
        header("location: home_zalogowany.php");

;

        }
        else{
            echo "Wpisano błędnie hasło!";
        }

    }
    else echo "Podany login nie istnieje!";
}
?>