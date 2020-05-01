<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 5px solid powderblue;}
    
    input[type=text], input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid powderblue;;
      box-sizing: border-box;
      background-color: powderblue;
      font-size: 20;
     
    }
    
    button {
      background-color: powderblue;
      color: black;
      font-size: 20;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
    
    button:hover {
      opacity: 0.8;
    }
    
    /*.cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }*/
    .SignUpbtn{
     
     width: auto;
      padding: 10px 18px;
      background-color: #f44336;
      
    }
    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }
    
    img.avatar {
      width: 25%;
      border-radius: 25%;
    }
    
    .container {
      padding: 16px;
    }
    
    
    span.psw {
      float: right;
      padding-top: 16px;
      background-color: powderblue;
    }
    body {
    background-color: rgb(74, 69, 124);
    }
    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
         display: block;
         float: none;
         background-color: powderblue;
      }
      .cancelbtn {
         width: 100%;
      }
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    
    <h2>ShareIT#.Login</h2>
    
    <form action="process.php" method="post">
      <div class="imgcontainer">
        <img src="ShareIT_Login_pic.jpg" alt="Avatar" class="avatar">
      </div>
    
      <div class="container">
        <label for="uname" class="fa fa-user"><b> Username</b></label>
        <input type="text" id = "user" placeholder="&#xf007; Enter Username" name="uname" required style="font-family:Arial, FontAwesome">
        
  
        <label for="psw" class="fa fa-lock"><b> Password</b></label>
        
        <input type="password" id="pass"  placeholder=  "&#xf023; Enter Password" name="psw" required  style="font-family:Arial, FontAwesome">
        
            
        <button type="post" >Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>
    
      <div class="container" style="background-color:powderblue">
      <!-- <button type="button" class="cancelbtn">Cancel</button>--> 
        <button type="button" class="SignUpbtn"onclick="window.location.href = 'ShareIT_Signup.php';">Sign Up</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>

      
    </form>
    
    </body>
    </html>
    