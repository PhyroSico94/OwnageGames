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
<h1>Unpublished Entries:</h1>
<?php 
if(isset($_GET['voteselection']) and isset($_GET['game_id']))
{
    $voteselectionsub=htmlspecialchars(strip_tags(trim($_GET['voteselection'])));
    $gameid = htmlspecialchars(strip_tags(trim($_GET['game_id'])));
    
    if ($voteselection='addone' or $voteselection='subtractone')
    {
        $queryprepvotecheck="DELETE FROM uvotes WHERE userid=".$userRow['userId']." AND gameid=".$gameid.";";
        $resss=$conn->query($queryprepvotecheck);
        $queryprepvote="INSERT INTO uvotes(userid, gameid, vote) VALUES (".$userRow['userId']." , ".$gameid." , '".$voteselection."');";
        $resss=$conn->query($queryprepvote);
        echo "Success.... You submitted an ".$voteselection." to gameID ".$gameid." and your opinion is always appreciated.";
    }
    else
    {
        echo "<p>You did something dodgy</p>";
    }
}
elseif( isset($_GET['game_id']))
{
    $gameid = $_GET['game_id'];
    include 'admingameinfo.php';
    echo "<form method='get'><div class='modoptions'>
        <input type='radio' name='voteselection' value='addone'> Upvote
  	    <input type='radio' name='voteselection' value='subtractone'> Downvote
  	    <input type='submit' name='game_id' value='".$gameid."'>
  	    </div></form>";
}
else {    
    $queryprep="SELECT * FROM gamedata WHERE entrystate='0'";
    include '../../private/scripts/game_list.php';
}
//   TblName: uvotes /collums:  ID / userid / gameid / vote / time   (time is set to current time_stamp and ID is auto_incrment.)
?>
</div>

<?php ob_end_flush(); ?>