<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $queryprepa="SELECT * FROM users WHERE userId=".$_SESSION['user'].";";
 $res=$conn->query($queryprepa);
 $userRow=$res->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link rel = "stylesheet"  type = "text/css" href = "../styles/ownagestyle.css" />


</head>
<body>
<div class='userbar'>
	<b>hello <?php echo $userRow['userName']." ".$userRow['privilege'];?></b>
<?php 
    if ($userRow['privilege']=="Administrator") {
        echo "<a href='administer.php' class='barbutton'>Administer</a>";       
    }
    if (($userRow['privilege']=="Author") or ($userRow['privilege']=="Administrator")) {
        echo "<a href='submit.php' class='barbutton'>Submit_Article</a>";       
    }
?>
	<a href="moderation.php" class='barbutton'>moderate posts</a>
	<a href="logout.php?logout" class='logoutbutton'>Logout</a>
</div>
<div class='contentbox'>
<h1>Welcome</h1>
<h3>Please Note:</h3>
<p>New Users show as Viewers and can only access moderation options. Authors can submit entries. Administrators can Publish Entries. Email info@ownage.co.za for more details</p>
</div>

</body>
</html>
<?php ob_end_flush(); ?>