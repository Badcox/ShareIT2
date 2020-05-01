<?php
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

<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Save name' name='but_upload'>
</form>