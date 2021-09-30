<?php
session_start();

include("Database/DB_config.php");

if(isset($_POST['login'])){
    $username = !empty($_POST['username']) ? trim($_POST['username']): null;
    $password = !empty($_POST['password']) ? trim($_POST['password']):null ;

    $sql = "SELECT * FROM users WHERE username=:username";
    //prepare
    $stmt= $pdo->prepare($sql);
    //bind
    $stmt->bindValue(':username', $username);
    //Excute
    $stmt->execute();

    //fetch row
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      if($user === false){
          //die ('Incorrect username or password!');
          $_SESSION['errorMessage'] = 1;
          header('Location:adminlogin.php');
          
          exit();
      }else{
          if($password==$user['password']){
            $_SESSION['username']= $user['username'];
            $_SESSION['logged_in'] = time();
            
            header('Location:adminhome.php');
            exit();
          }else{
            $_SESSION['errorMessage'] = 1;
            header('Location:adminlogin.php');
           
            exit();
          }
      }

}
?>