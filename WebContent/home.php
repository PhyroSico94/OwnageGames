<?php
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
<div class='userbar'>
    <div class='userbt' id='userbt'>
	<b><?php echo $userRow['userName'];?></b>
    </div>
	<div class='userdropdown' id = 'userdropdown'>
<?php 
echo     "<div class='userselection'>".$userRow['privilege'];
echo     "<div>";
    if ($userRow['privilege']=="Administrator") {
        echo "<div class='userselection'><a href='administer.php' class='barbutton'>Administer</a></div>";       
    }
    if (($userRow['privilege']=="Author") or ($userRow['privilege']=="Administrator")) {
        echo "<div class='userselection'><a href='submit.php' class='barbutton'>Submit Article</a></div>";       
    }
?>
	<div class='userselection'><a href='moderation.php' id='Modder' class='barbutton'>Moderate posts</a></div>
	<div class='userselection'><a href="logout.php?logout" class='logoutbutton'>Logout</a></div>
</div>
</div>


