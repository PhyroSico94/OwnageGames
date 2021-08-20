<?php 
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['list']))
{
    //then if its not there we check for
} elseif ( isset($_POST['platform_name']) )
{
    if ( isset($_POST['genre_name']) )
    {
        echo " A list of games matching platform ".$_POST['platform_name']." and genre: ".$_POST['genre_name'];
    } else
    {
        echo "a list of games matching platform: ".$_POST['platform_name'];
    }
} elseif ( isset($_POST['genre_name']) )
{
    echo "a list of games matching genre: ".$_POST['genre_name'];
}

?>