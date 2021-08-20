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
 <title>Ownage</title>
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
 if( $userRow['privilege']!="Administrator") {
  header("Location: home.php");
  exit;
 }
?>
<div class='contentbox'>
<h1>Unpublished Entries:</h1>
<?php 
if(isset($_GET['voteselection']) and isset($_GET['game_id']))
{
    $voteselectionsub=htmlspecialchars(strip_tags(trim($_GET['voteselection'])));
    $gameid = htmlspecialchars(strip_tags(trim($_GET['game_id'])));
    
    if ($voteselectionsub=='remove')
    {
        $queryprepp="DELETE FROM uvotes WHERE gameid=".$gameid.";";
        $resss=$conn->query($queryprepp);
        $queryprepp="DELETE FROM gamedata WHERE gameid=".$gameid.";";
        $resss=$conn->query($queryprepp);
        $path="../private/DataStore/".$gameid.".php";
        if(unlink($path)) echo "Deleted file ";
        echo "Success.... You chose to ".$voteselectionsub." gameID ".$gameid." and you're just awesome like that";
        
    }
    elseif ($voteselectionsub=='publish')
    {
    //we used a function here       
            
            function replace_in_file($FilePath, $OldText, $NewText)
{
    $Result = array('status' => 'error', 'message' => '');
    if(file_exists($FilePath)===TRUE)
    {
        if(is_writeable($FilePath))
        {
            try
            {
                $FileContent = file_get_contents($FilePath);
                $FileContent = str_replace($OldText, $NewText, $FileContent);
                if(file_put_contents($FilePath, $FileContent) > 0)
                {
                    $Result["message"] = 'success';
                }
                else
                {
                   $Result["message"] = 'Error while writing file';
                }
            }
            catch(Exception $e)
            {
                $Result["message"] = 'Error : '.$e;
            }
        }
        else
        {
            $Result["message"] = 'File '.$FilePath.' is not writable !';
        }
    }
    else
    {
        $Result["message"] = 'File '.$FilePath.' does not exist !';
    }
    return $Result["message"];
}

//Function ends here
            $result=replace_in_file("../private/DataStore/".$gameid.".php", "unpublished" , "published");
            echo " <p>State Change in file ".$result."</p>";
            $queryprepp="UPDATE `gamedata` SET  `entrystate` =1 WHERE  `gameid` =".$gameid.";";   
            $resultt=$conn->query($queryprepp);

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
        <input type='radio' name='voteselection' value='remove'> Remove
  	    <input type='radio' name='voteselection' value='publish'> Publish
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
<footer class="footnote">
	This site is still under construction. Please feel free to poke around.
</footer>
<script>
</script>

 </body>
</html> 
<?php ob_end_flush(); ?>