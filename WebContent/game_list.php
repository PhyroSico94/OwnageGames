<?php 
include "../private/config.php";
echo "<div class='searchresult'><p class='gamep'></p><p class='platp'><u><b>Platform:</u></b></p><p class='tagp'><u><b>Genre:</u></b></p><p class='releasp'><u><b>ReleaseDate:</u></b></p></div>";
$connn = new mysqli($sqlservername, $sqlusername, $sqlpassword, $sqldatabasename);

// Check connection

if ($connn->connect_error) {
    
    echo "Connection to server lost.";
    die("Connection failed: " . $connn->connect_error);
    exit;

}



$result = $connn->query($queryprep);

if ($result->num_rows > 0) {

    // output data of each row

    while($row = $result->fetch_assoc()) {

        echo "<div class='gameentry'><a class='searchresult' href='?game_id=".$row["gameid"]."'>".
		"<div class='gamep'><p>".$row["gamename"]."</p></div><div id='test'></div>".
		"<div class='platp'>";
		$outofnames=explode(',', $row["platform"]);
        foreach($outofnames as $omgreally){
            echo "<img src='".$omgreally.".png' alt='".$omgreally."' height='42' width='42'>";
        }
		
		
		echo "</div><div class='tagp'>" ;
        $outofnames=explode(',', $row["taglist"]);
        foreach($outofnames as $omgreally){
            echo "<p class='tag'>".$omgreally."</p>";
        }
		echo "</div>"."<div class='releasp'><p>".$row["releaseday"] ."</p></div>"."</a></div>";
    }
	
} else {

    echo "0 results";

}

$connn->close();

?>