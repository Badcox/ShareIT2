<?php //SessionStart  
    session_start();
    //echo $_SESSION['uname'];
    $uname = $_SESSION['uname'];
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
<?php //Index for Profile Pic Icon

    include "Config.php";

    $images1_sql = "Select * from images1 where USER_NAME_FK ='$uname' Order by id desc limit 2";


    $result = mysqli_query ($con, $images1_sql);

    $row = mysqli_fetch_array($result);

    $filename = $row['name'];
    $image = $row['image'];


?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="ShareIT.CSS">
<html>
    <head>
        
        <title>ShareIT</title>
        <title>ShareIT</title>
        <div class = 'container'>
        <h2>ShareIT#.Messenger</h2>
        <h1 class="uname"><?php echo $_SESSION['uname'];?><img class ="ProfilePic" src="<?= $image ?>"></h1>
        </div>
        <header>
            
            
            <button class="but1" onclick="window.location.href = 'ShareIT.php';">Home  <type="submit"><i class="fa fa-home"></i></button>
            <button class="but1" onclick="window.location.href = 'Messenger.php';">Messenger  <type="submit"><i class="fa fa-envelope"></i></button>
            <button class="but1" onclick="window.location.href = 'Search.php';">Search  <type="submit"><i class="fa fa-search"></i></button>
            <button class="but1" onclick="window.location.href = 'Notifications.php';">Notifications  <type="submit"><i class="fa fa-bell"></i></button>
            <button class="but1" onclick="window.location.href = 'UserProfile.php';">User Profile  <type="submit"><i class="fa fa-user"></i></button>
        </header>
    </head>
    <hr class="new1">
    <body>

        <h1>Messengar</h1>
        <p>This is the part of the website you can direct message people</p>

    </body>
    <hr class="new1">
</html>