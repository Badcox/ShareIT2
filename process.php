<?php
    // Get values passed from form into ShareIT_Login.php file
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    //prevent sql injections
    $username = stripcslashes($username);
    $password = stripcslashes($password);
   // $username = mysqli_real_escape_string($username);
   // $password = mysqli_real_escape_string($password);

    //connect to the server and select db
   $con = mysqli_connect("localhost", "Bradley", "Bradra201!");
    mysqli_select_db($con, 'shareit');

    $result = mysqli_query($con, "select * from USER_PROFILE where USER_NAME = '$username' and USER_Password = '$password'") or die("Faild to query database ");
    $row = mysqli_fetch_array($result);
   
    if ($row['USER_NAME']== $username and $row['USER_Password'] == $password){

        echo "Login Success!!!   Welcome " .$row['USER_NAME'];
       header("Location: /SeniorCapPro/ShareIT.php? uname=".$username);
        exit();
        
       
    }
    else {
        echo "Failed to login. User ", $username ," does not exsist.";
    }

?>