<?php
session_start();
//include("Database/DB_config.php");
$conn= mysqli_connect('localhost','root','','bethel') or die(mysqli_error($conn));
$message = ''; 


if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
    $desc=$_POST['desc']; 
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    
     $newFileName =  $fileName;
      
       // directory in which the uploaded file will be moved
      $uploadFileDir = './uploads/';
      $dest_path = $uploadFileDir . $newFileName;
      $target_file = $uploadFileDir . basename($_FILES['uploadedFile']["name"]);
      
      if(file_exists($target_file)){
         $message ='Sorry'.' '.$newFileName. ' '.' exists already.'; 
      }else{
      
    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif','png', 'zip', 'txt', 'xls','xlsx','pdf','docx','doc');
 
    if (in_array($fileExtension, $allowedfileExtensions))
    {
    
 
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $queryinsert= mysqli_query($conn, "Insert into upload(description, filepath) values('$desc','$dest_path')") or die(mysqli_error($conn));
        $message = $newFileName. ' '.'has been successfully uploaded.';
      }
      else
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }}
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
header("Location: adminhome.php");