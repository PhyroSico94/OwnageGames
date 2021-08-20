<?php
 session_start();
 require_once 'dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  include "home.php";
  exit;
 }
 
 $error = false;
 
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
   echo $emailError;
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
  
   $res=$conn->query("SELECT userId, userName, userPass FROM users WHERE userEmail='".$email."'");
   
   $count = $res->num_rows; // if uname/pass correct it returns must be 1 row
   $row=$res->fetch_assoc();
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
    	include "home.php";
  	exit;
   } else {
	header('HTTP/1.0 400 Bad error');
   }
    
  }
  

?>
 <div id="login-form" class="lform">
    <form method="post" action="login.php" autocomplete="off">   
             <div>
             <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" maxlength="40" required />
             <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" maxlength="15" required />
             <button type="button" id="signin" name="btn-login">Sign In</button>
             <button type="button" id="signup" name="btn-signup">Sign Up</button>
            </div>
    </form>
    </div> 

