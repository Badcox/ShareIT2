<?php
  session_start();
          if($_GET){
              $username = $_GET['uname']; // print_r($_GET); 
          
              $_SESSION['uname']= $username;
          }
          $uname = $_SESSION['uname'];
        /* else{
          echo "Url has no user1";
          } */?>

<?php //Post Pic
  include("config.php");

  if(isset($_POST['but_upload'])){
  
    $filename = $_FILES['file']['name'];
    $target_dir = "upload/";

    if($filename != ''){
      $target_file = $target_dir .basename($_FILES["file"]["name"]);

      // Select file type
      $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");

      // Check extension
      if( in_array($extension,$extensions_arr) ){

        $image_base64 = base64_encode(file_get_contents($_FILES['file']
          ['tmp_name']));
        $image = "data::image/".$extension. ";base64, ".$image_base64;

        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
    
        // Insert record
        $query = "insert into images(name,image) values('".$filename."','".$image."')";
        mysqli_query($con,$query);
      
        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$filename);
        }
      }
  }
  }
?>
<?php //Post Pic 

  include "Config.php";

  $images_sql = "Select * from images Order by id desc limit 2";

  $result = mysqli_query ($con, $images_sql);

  $row = mysqli_fetch_array($result);

  $filename = $row['name'];
  $image = $row['image'];


?>
<?php //Readfile for Profile Pic Icon
    include("config.php");

    if(isset($_POST['but_upload1'])){
    
    $filename = $_FILES['file']['name'];
    $target_dir = "upload1/";

    if($filename != ''){
        $target_file = $target_dir .basename($_FILES["file"]["name"]);

        // Select file type
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($extension,$extensions_arr) ){

        $image_base64 = base64_encode(file_get_contents($_FILES['file']
            ['tmp_name']));
        $image = "data::image/".$extension. ";base64, ".$image_base64;

        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
    
        // Insert record
        $query = "insert into images1(USER_NAME_FK,name,image) values('".$uname."','".$filename."','".$image."')";
        mysqli_query($con,$query);
        
        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$filename);
        }
        }
    }
    }
?>
<?php //Index  for Profile Pic Icon

    include "Config.php";

    $images1_sql = "Select * from images1 where USER_NAME_FK ='$uname' Order by id desc limit 2";


    $result = mysqli_query ($con, $images1_sql);

    $row = mysqli_fetch_array($result);

    $filename = $row['name'];
    $image = $row['image'];


?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"  type="text/css" href="ShareIT.CSS">

<html>
    <head>
        
        <title>ShareIT</title>
        <div class = 'container'>
          <h2>ShareIT#.Home</h2>
          <h1 class="uname"><?php echo $_SESSION['uname'];?><img class ="ProfilePic" src="<?= $image ?>"></h1>
        </div>
        <!-- <header>
            
        
            <button class="but1" onclick="window.location.href = 'ShareIT.php';">Home  <type="submit"><i class="fa fa-home"></i></button>
            <button class="but1" onclick="window.location.href = 'Messenger.php';">Messenger  <type="submit"><i class="fa fa-envelope"></i></button>
            <button class="but1" onclick="window.location.href = 'Search.php';">Search  <type="submit"><i class="fa fa-search"></i></button>
            <button class="but1" onclick="window.location.href = 'Notifications.php';">Notifications  <type="submit"><i class="fa fa-bell"></i></button>
            <button class="but1" onclick="window.location.href = 'UserProfile.php';">User Profile  <type="submit"><i class="fa fa-user"></i></button>
            
        </header> -->
    
    </head>
    <header>
            
        <div class="button1">
            <button class="but1" onclick="window.location.href = 'ShareIT.php';">Home  <type="submit"><i class="fa fa-home"></i></button>
            <button class="but1" onclick="window.location.href = 'Messenger.php';">Messenger  <type="submit"><i class="fa fa-envelope"></i></button>
            <button class="but1" onclick="window.location.href = 'Search.php';">Search  <type="submit"><i class="fa fa-search"></i></button>
            <button class="but1" onclick="window.location.href = 'Notifications.php';">Notifications  <type="submit"><i class="fa fa-bell"></i></button>
            <button class="but1" onclick="window.location.href = 'UserProfile.php';">User Profile  <type="submit"><i class="fa fa-user"></i></button>
        </div>
            
        </header>
        <hr class="new1">
    <body>
    
    
        <h1>Welcome to the Next best social media site <?php echo $_SESSION['uname'];?></h1>
       
        
    <form class ="image" method="get" action="" >
    
        <img class ="post" src="<?= $image ?>">

        <br><br>
        <!-- <img src="<?=$image ?>" width="300px" height="300px"> -->
    
    </form>

      
        
        <p>This is the beginning of a website/app where people are not sensored, watched, sold, and manipulated like many other websites.</p>
        
    </body>
    <hr class="new1">
    <form class = "post1" method="post" action="" enctype='multipart/form-data' >
  <input class = "file" type='file' name='file' value="Post Here!" />
  <input class ="submit" type='submit'  value='Save name' name='but_upload' onclick="window.location.href = 'ShareIT.php';">
</form>
</html>

<?php 

?>
