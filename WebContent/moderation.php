<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 ?>
<html>
 <head>
 <title>Ownage-Moderation</title>
 <link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave+Display" rel="stylesheet">
 <link rel = "stylesheet"  type = "text/css" href = "ownagestyle.css" />
 <meta name="google-site-verification" content="kAoJoIx39yFOEAjv-inx0INy3v6uwPGbN-fB82j9_Hs" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="functions.js"></script>
 </head>
 <body class="body"> 
 <div class= "topmenu" >
<div><a class= "heading" id="a" href="/">Ownage</a></div>
<div class= "tiny"><p>Pew!Pew!Bah!</p></div>
<div  id="ppp" class="uBar"></div>
</div>
<div class="contents">
 <?php
 // select loggedin users detail
 $queryprepa="SELECT * FROM users WHERE userId=".$_SESSION['user'].";";
 $res=$conn->query($queryprepa);
 $userRow=$res->fetch_assoc();
echo "<div class='contentbox'>
<h1>Unpublished Entries:</h1>";
 
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
    include 'game_list.php';
}
//   TblName: uvotes /collums:  ID / userid / gameid / vote / time   (time is set to current time_stamp and ID is auto_incrment.)
?>
</div>
</div>
<footer class="footnote">
	This site is still under construction. Please feel free to poke around.
</footer>
<script>
</script>

 </body>
</html> 

<?php ob_end_flush(); ?>