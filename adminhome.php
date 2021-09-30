<!DOCTYPE html>
<?php 
session_start();

if(!isset($_SESSION['username']) || !isset($_SESSION['logged_in'])){
    header('Location:adminlogin.php');
}
 include('filelogic.php');

?>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/favicon.ico" />
  <title>Bethel Institute of Technology</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <script src="https://kit.fontawesome.com/e9974bda55.js" crossorigin="anonymous"></script>-->
  <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
   <link rel="stylesheet" href="bootstrap\private css\style.css">      
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="bootstrap\js\bootstrap.min.js"></script>
   <script src="bootstrap\jq\jquery.js"></script> 
</head>
    <style>
        table{
            table-layout: fixed;
        }
        #logout{
          margin-left: 750px;
        }
    </style>
<div class="container-fluid">

<div class="header">
 

  <nav class="navbar navbar-expand-md">
  <!-- Brand -->
 <a class="navbar-brand study_logo" ><img class="navbarlogo" src="images/tranparent%20logo.png" style="height:80px"> <span class="span-logo">Bethel Institute of Technology</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="" role="button" ><i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff"></i></span>
</button>

  <!-- Links -->

<a class="btn btn-warning" id="logout" href="logout.php">log Out</a>
</nav>
    </div>
<script>
 
    setTimeout(function(){
    document.getElementById('notification').style.display = 'none';
   
  }, 3000);
</script>

 
   

<body>
<div class="row">
  <div class="col-md-9">
    <div class="card upload">
  
  <form method="POST" action="upload.php" enctype="multipart/form-data">

      <div class="post">
          <fieldset >
               <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      echo '<p id="notification">'.$_SESSION['message'].'</p>';
      unset($_SESSION['message']);
    }
  ?>
<div class="row justify-content-center">
<textarea id="desc" name="desc" rows="4" cols="80" placeholder="Describe the post here......" required>
</textarea>  </div>
    <div class="upload-wrapper">
      <span class="file-names">Choose a file</span>
      <label for="file-upload"><input type="file" id="file-upload" name="uploadedFile" required></label>
         
    </div>
              <div class="row justify-content-center">
                  <input type="submit" name="uploadBtn" value="Upload" /></div>
      </fieldset></div>
  </form>
    </div>
    </div>
 
   <div class="col-md-3">
    <div class="card Noticeboard">
      <h5 class="notice"><img width="40" height="40" src="images/impo.png"/>Update Notice Board</h5>
       <div class="notic">
  <table style="width:280px;" >
<thead>
</thead>
<tbody>
 <?php foreach ($files as $file): ?>
    <tr class="delete_mem<?php echo $file['uploadid'] ?>">
      <td><?php echo $file['description']; ?></td>
   
      <td style="text-align:right"><a class="btn btn-danger" id="<?php echo $file['uploadid']; ?>">Delete</a></td>
    </tr>
  <?php endforeach;?>

</tbody>
</table></div>
    </div>
  
    <script type="text/javascript">
    $(document).ready(function() {
        $('.btn-danger').click(function() {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to delete this Post?")) {
                $.ajax({
                    type: "POST",
                    url: "delete.php",
                    data: ({
                        id: id
                    }),
                    cache: false,
                    success: function(html) {
                        $(".delete_mem" + id).fadeOut('slow');
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>
  </div>
    </div>

  
  <div class="card about" style="border-color:blue">
      <div class="row ">
      <div class="col-md-6">
      <div class="card" style="border-color:white">
    <div class="card-header"><img src="icons/education3.png" width="40" height="40"/><h4 class="mission">Mission</h4></div>
     <div class="card-body">
      <p class="miss">Dedicated to academic excellence,distinguished by creative interplay of teaching, learning and scholarship and dedicated to our diverse residential community and extensive international engagement.</p>
         <p></p>
         </div>
        <div class="card-footer"></div>
    </div>
     </div>
        <div class="col-md-6"> 
        <div class="card" style="border-color:white">
    <div class="card-header"><img src="icons/education1.png"/><h4 class="vision">Vision</h4></div>
     <div class="card-body">
      <p class="vis">Bethel Institute of Technology will provide educational opportunities that are responsive to the needs of the community and help students meet economic, social and enviromental challenges to become active participants in shaping the world of the future.</p>
    </div>
    <div class="card-footer"></div>
          </div>
            </div>
      </div>
   
<div class="footer">
<footer  style="background-color: #2c292f">
  <div class="container-fluid">
      <div class="row ">
          <div class="col-md-4 text-center text-md-left ">
              
              <div class="py-0">
                  <h6 class="my-4 text-white">About<span class="mx-2 font-italic text-warning ">Bethel Institute of Technology</span></h6>

                  <p class="footer-links font-weight-bold">
                      <a class="text-white" href="#">Home</a>
                      |
                      <a class="text-white" >Blog</a>
                      |
                      <a class="text-white" >About</a>
                      |
                      <a class="text-white">Contact</a>
                  </p>
                  <p class="text-light py-4 mb-4">&copy;2021 Bethel Institute of Technology.</p>
              </div>
          </div>
          
          <div class="col-md-4 text-white text-center text-md-left ">
              <div class="py-2 my-4">
                  <div>
                      <p class="text-white"> <i class="fa fa-map-marker mx-2 "></i>
                             AM Plaza, Next to Imarisha Sacco(along Nakuru-Kericho Highway)</p>
                  </div>

                  <div> 
                      <p><i class="fa fa-phone  mx-2 "></i> +254702 494750/+254777 494750</p>
                  </div>
                  <div>
                      <p><i class="fa fa-envelope  mx-2"></i><a href="mailto:support@Bethelinst.com">support@Bethelinst.com</a></p>
                  </div>  
              </div>  
          </div>
          
          <div class="col-md-4 text-white my-4 text-center text-md-left ">
              <span class=" font-weight-bold ">About the Group</span>
    <p class="text-warning my-2" >We at Bethel Institute of Technology believes in spirit of learning without limits.</p>
              <div class="py-2">
                  <a href="#"><i class="fab fa fa-facebook fa-2x text-primary mx-3"></i></a>
                  <a href="#"><i class="fab  fa fa-google-plus fa-2x text-danger mx-3"></i></a>
                  <a href="#"><i class="fab  fa fa-twitter fa-2x text-info mx-3"></i></a>
                  <a href="#"><i class="fab  fa fa-youtube fa-2x text-danger mx-3"></i></a>
              </div>
          </div>
      </div>  
  </div>
</footer>
</div>
    </div>
</body>
</div>
</html>