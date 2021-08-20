

<?php 
if (is_numeric($gameid))
{
    $inc_address="../private/DataStore/".$gameid.".php";
    include $inc_address;
if ($entrystate=="published") {
        
    
	echo "<article>";
    echo "<h3 class='gametitle'>".$gametitle."</h3>";
    if (!empty($descriptiontext)){
        echo "<div class='destitle'><h4>Game description</h4></div><div class='description'><p>".$descriptiontext."</p></div>";
    }
    //VIDEOS
    if (!empty($reviewvideourl) or !empty($instructionalvideourl)) {
        echo "<div class='videosection'>";    
        if (!empty($reviewvideourl)){
           echo "<div class='videobox'><h4 class='cattitle'><u>VideoReview</u></h4><iframe width='480' height='315' src=".$reviewvideourl[0]." frameborder='0' allowfullscreen></iframe></div>";
        }
        if (!empty($instructionalvideourl)){
	       echo "<div class='videobox'><h4 class='cattitle'><u>Instructional Video</u></h4><iframe width='480' height='315' src=".$instructionalvideourl[0]." frameborder='0' allowfullscreen></iframe></div>";
        }
	    echo "</div>";
    } 
    //webguides
    if (!empty($webguidelink)) {
        echo "<div class=tools><div class='toollinks'><h4 class='cattitle'><u>Online Guides</u></h4><p> A good Online Guide can be found here <a href='".$webguidelink[0]."' target='_blank'>".$webguidelink[0]."</a></p></div>";
    }

    //tools
    if (!empty($toollinks)){
        echo "<div class='toollinks'>";
        echo "<h4 class='cattitle'><u>Handy Tools</u></h4>";
        echo "<ul>";
        foreach ($toollinks as $toollink) {
            echo "<li><a href='".$toollink."'>".$toollink."</a></li>";
        }
        echo "</ul></div></div>";
    }
    
    
    echo "</article>";
}
} else {
    echo $gameid." isn't a GameID";
}
?>
