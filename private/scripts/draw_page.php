

<?php 

//first if game_id is set we ignore other options and give game data
if( isset($_GET['game_id']) )
{
    $gameid = $_GET['game_id'];
    include 'game_info.php';
//then if its not there we check for 
} elseif ( isset($_POST['platform_name']) )
{
    if(!empty($_POST['genre_name']))
    {
        
        $platformname = htmlspecialchars(strip_tags(trim($_POST['platform_name'])));
        $genrename = $_POST['genre_name'];
        $searchname = htmlspecialchars(strip_tags(trim($_POST['search_name'])));
        echo "A list of games matching platform ".$platformname." and genre: ";
        $queryprep = "SELECT * FROM gamedata WHERE platform LIKE '%".$platformname."%' AND entrystate='1' AND ";
        foreach($genrename as $gengen) {
            echo htmlspecialchars(strip_tags(trim($gengen))).", ";
            if($gengen!=$genrename[0]){
                $queryprep .= " AND ";
            }
            $queryprep .= " taglist LIKE '%".htmlspecialchars(strip_tags(trim($gengen)))."%'";
        } 
        if (!empty($searchname)){
            $queryprep .= " AND gamename LIKE '%".$searchname."%'";
        }
        $queryprep .=";";
        echo "<br>".$queryprep;
        include 'game_list.php';
        
    } else 
    {
        $platformname = htmlspecialchars(strip_tags(trim($_POST['platform_name'])));
        $searchname = htmlspecialchars(strip_tags(trim($_POST['search_name'])));
        echo "a list of games matching platform: ".$_POST['platform_name'];
        $queryprep = "SELECT * FROM gamedata WHERE platform LIKE '%".$platformname."%' AND entrystate='1'";
        if (!empty($_POST['search_name'])){
            $queryprep .= "AND gamename LIKE '%".$searchname."%'";
        }
        $queryprep .=";";
        echo "<br>".$queryprep;
        include 'game_list.php';
    }
} elseif ( isset($_POST['genre_name']) )
{
    $genrename = $_POST['genre_name'];
    $searchname = htmlspecialchars(strip_tags(trim($_POST['search_name'])));
    echo "A list of games matching genre:";
    $queryprep = "SELECT * FROM gamedata WHERE entrystate='1' AND ";
    foreach($genrename as $gengen) {
        echo htmlspecialchars(strip_tags(trim($gengen))).", ";
        if($gengen!=$genrename[0]){
            $queryprep .= " AND ";
        }
        $queryprep .= " taglist LIKE '%".htmlspecialchars(strip_tags(trim($gengen)))."%'";
    }
    if (!empty($_POST['search_name'])){
        $queryprep .= "AND gamename LIKE '%".$searchname."%'";
    }
    $queryprep .=";";
    echo "<br>".$queryprep;
    include 'game_list.php';
}
elseif (!empty($_POST['search_name']))
{
    $searchname = htmlspecialchars(strip_tags(trim($_POST['search_name'])));
    echo "A list of games matching name: ".$searchname."<br>";
    $queryprep = "SELECT * FROM gamedata WHERE entrystate='1' AND gamename LIKE '%".$searchname."%';";
    echo "<br>".$queryprep;
    include 'game_list.php';
}
else 
{
	$queryprep = "SELECT * FROM gamedata WHERE entrystate='1';";
	include 'game_list.php';

};

?>
