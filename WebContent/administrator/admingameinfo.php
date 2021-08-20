

<?php 
echo "testing<br>";
if (is_numeric($gameid))
{
    echo "still happening";
    $inc_address="../private/DataStore/".$gameid.".php";
    include $inc_address;
    
if ($entrystate=="unpublished") {
	echo "<article>";
    echo "<h3 class='gametitle'>".$gametitle."</h3>";
    if (!empty($descriptiontext)){
        echo "<h4 class='cattitle'><u>Game description:</u></h4> <p class='Description:'>".$descriptiontext."</p>";
    }
    //VIDEOS
    if (!empty($reviewvideourl) or !empty($instructionalvideourl)) {
        echo "<div class='videosection'>";    
        if (!empty($reviewvideourl)){
            
           echo "<div class='videobox'><h4 class='cattitle'><u>VideoReview</u></h4>";
           foreach($reviewvideourl as $revvid){
               echo "<iframe width='480' height='315' src=".$revvid." frameborder='0' allowfullscreen></iframe>";
           }
                
           echo "</div>";
        }
        if (!empty($instructionalvideourl)){
	       echo "<div class='videobox'><h4 class='cattitle'><u>Instructional Video</u></h4>";
	       foreach($instructionalvideourl as $instvid){
	           echo "<iframe width='480' height='315' src=".$instvid." frameborder='0' allowfullscreen></iframe>";
	       }
	       echo "</div>";
        }
	    echo "</div>";
    } 
    //webguides
    if (!empty($webguidelink)) {
        echo "<div class='webguidesection'><h4 class='cattitle'><u>Online Guides</u></h4>";
        foreach ($webguidelink as $webie){    
            
            echo "<p><a href='".$webie."' target='_blank'>".$webie."</a></p>";
            
        }
        echo "</div>";
    }

    //tools
    if (!empty($toollinks)){
        echo "<div class='toollinks'>";
        echo "<h4 class='cattitle'><u>Handy Tools</u></h4>";
        echo "<ul>";
        foreach ($toollinks as $toollink) {
            echo "<li><a href='".$toollink."'>".$toollink."</a></li>";
        }
        echo "</ul></div>";
    }
    
    
    echo "</article>";
}
} else {
    echo $gameid." isn't a GameID";
}
?>
