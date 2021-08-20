

<?php 
if (is_numeric($gameid))
{
    $inc_address= "../private/DataStore/".$gameid.".php";
    include $inc_address;
if ($entrystate=="published") {
	echo "<article><div class ='gameinfo'>";
    echo "<div class='gameheader'><div class='gametitle'>".$gametitle."</div>";
	echo "</div>";
	if (!empty ($genretags)){
		echo "<div class='tagheader'><div class='tagp'>Genres:</br>";
	foreach($genretags as $genr){
               echo "<div class='tag'>".$genr."</div>";
			   }
			}
			if(!empty($platforms)){
			   echo "</div><div class='tagp'>Platforms:</br>";
	foreach($platforms as $plat){
			   echo "<div class='tag'>".$plat. " </div>";
			   }
			}
			if (!empty($company)){
			   echo "</div><div class='tagp'>Developers:</br>";
	foreach($company as $compy){
               echo "<div class='tag'>".$compy."</div>";
			   }
			}
			if (!empty($monatry)){
			   echo "</div><div class='tagp'>Monetization:</br>"; 
	foreach($monatry as $monty){
               echo "<div class='tag'>".$monty."</div>";
				}
			}
		if(!empty($releaseday)){
	echo "</div><div class='releaseday'>ReleaseDay:</br><div class='tag'>".$releaseday."</div></div>";
		}
	echo '</div></div>';
    if (!empty($descriptiontext)){
        echo "<div class='destitle'><div><h4><u>Game description</u></h4></div></div><div class='description'>".$descriptiontext."</div>";
    }
    echo "<div><div class='btnsection1'><button class='gibtn' id='revbutt'>=Review Videos=</button></div><div class='btnsection2'><button class='gibtn' id='gudbutt'>=Guide Videos=</button></div></div>";
    echo "<div class='videosection'><div class='revdropwdown'>";
    /*VIDEOS (modified line18 'or !empty(instructionalvideourl)' removed)*/
    if (!empty($reviewvideourl)) {
			echo "<div class='videobox'>";
           foreach($reviewvideourl as $revvid){
               echo "<iframe width='50%' height='400' src=".$revvid." frameborder='0' allowfullscreen></iframe>";
           }
		   echo "</div></div>";
        }
        else {
           echo "<div class='videosection'><h1> No video reviews found </h1></div>";
        }
    echo "<div class='guidedropwdown'>";
    if (!empty($instructionalvideourl)){
		echo "<div class='videobox'>";
	       	       foreach($instructionalvideourl as $instvid){
						echo "<iframe width='50%' height='400' src=".$instvid." frameborder='0' allowfullscreen></iframe>";
	       }
		   echo "</div></div>";
        }
                else {
           echo "<h1> No video guides found </h1>";
        }
	    echo "</div><div class= 'linksection'>";
    //webguides
    if (!empty($webguidelink)) {
		 echo "<div class='guidelinks'><h4 class='cattitle'><u>Online Guides:</u></h4>";
		 echo "<ul>";
		foreach ($webguidelink as $webblink) {
            echo "<li><a href='".$webblink."'target='_blank'>".$webblink."</a></li>";
        }
		echo "</ul></div>";
    }
	if (!empty ($reviewtext)){
			echo "<div class='textrev'>";
			echo "<h4 class='cattitle'><u>Text Reviews</u></h4>";
			echo "<ul>";
			foreach ($reviewtext as $revitext) {
            echo "<li><a href='".$revitext."'>".$revitext."</a></li>";
				}
				echo "</ul></div>";
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

    if (!empty ($sellers)){
			echo "<div class='sellers'>";
			echo "<h4 class='cattitle'><u>Retailers</u></h4>";
			echo "<ul>";
			foreach ($sellers as $sell) {
            echo "<li><a href='".$sell."'>".$sell."</a></li>";
				}
				echo "</ul></div>";
	}
	if(!empty($moreinfo)){
		echo "<div class='morinfo'><h4 class='cattitle'><u>Addiotonal information:</u></h4>";
		echo "<div class='description'>".$moreinfo."</div></div>";
	}
    echo "</div></div></article>";
}
}
else {
    echo $gameid." isn't a GameID";
}
?>
