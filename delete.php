<?php
$database = new PDO("mysql:host=localhost;dbname=bethel", 'root', '');
$conn = mysqli_connect('localhost', 'root', '', 'bethel');
$id = $_POST['id'];

       $querypath=mysqli_query($conn, "SELECT * FROM upload WHERE uploadid='".$id."'")or die(mysqli_error($conn));

        while($row=mysqli_fetch_array($querypath)){
     $path=$row['filepath'];}
      unlink($path);
$delete_data="delete from upload where uploadid = '$id' ";
$database->exec($delete_data);
?>