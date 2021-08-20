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
 if (!(($userRow['privilege']=="Author") or ($userRow['privilege']=="Administrator"))) {
     header("Location: home.php");
     exit;
 }

//sql variable preperations
 $gamenamesub=htmlspecialchars(strip_tags(trim($_POST['gamename'])));
 $platformsubprep=$_POST['platform_name'];
 foreach($platformsubprep as $platplat){
     if (htmlspecialchars(strip_tags(trim($platplat)))!=htmlspecialchars(strip_tags(trim($platformsubprep[0])))){
         $platformsub .= ",";
     }
     $platformsub .= htmlspecialchars(strip_tags(trim($platplat)));
 }
 $genresubprep=$_POST['genre_name'];
 foreach($genresubprep as $gengen){
     if (htmlspecialchars(strip_tags(trim($gengen)))!=htmlspecialchars(strip_tags(trim($genresubprep[0])))){
         $genresub .= ",";
     }
     $genresub .= htmlspecialchars(strip_tags(trim($gengen)));
 }
 $releasesub= new DateTime(htmlspecialchars(strip_tags(trim($_POST['releaseday']))));
 $releasesub = mysqli_real_escape_string($conn, $releasesub->format('Y-m-d'));
 
 //file variable preperations
 foreach($platformsubprep as $platplat){
     if (htmlspecialchars(strip_tags(trim($platplat)))!=htmlspecialchars(strip_tags(trim($platformsubprep[0])))){
         $platformsubf .= ",";
     }
     $platformsubf .= "'".htmlspecialchars(strip_tags(trim($platplat)))."'";
 }
 foreach($genresubprep as $gengen){
     if (htmlspecialchars(strip_tags(trim($gengen)))!=htmlspecialchars(strip_tags(trim($genresubprep[0])))){
         $genresubf .= ",";
     }
     $genresubf .= "'".htmlspecialchars(strip_tags(trim($gengen)))."'";
     
 }

 $descriptionsub=htmlentities(htmlspecialchars(strip_tags(trim($_POST['description']))));
 $instructvidsubprep=$_POST['intructionalvideourl'];
 foreach($instructvidsubprep as $instruct){
     if (htmlspecialchars(strip_tags(trim($instruct)))!=htmlspecialchars(strip_tags(trim($instructvidsubprep[0])))){
         $instructvidsub .= ",";
     }
     $instructvidsub.= "'".htmlspecialchars(strip_tags(trim($instruct)))."'";
     
 }
 
 $reviewvidsubprep=$_POST['reviewvideourl'];
 foreach($reviewvidsubprep as $revrev){
     if (htmlspecialchars(strip_tags(trim($revrev)))!=htmlspecialchars(strip_tags(trim($reviewvidsubprep[0])))){
         $reviewvidsub .= ",";
     }
     $reviewvidsub.= "'".htmlspecialchars(strip_tags(trim($revrev)))."'";
     
 }

 $webguidesubprep=$_POST['webguidelink'];
 foreach($webguidesubprep as $webweb){
     if (htmlspecialchars(strip_tags(trim($webweb))) != htmlspecialchars(strip_tags(trim($webguidesubprep[0])))){
         $webguidesub .= ",";
     }
     $webguidesub.= "'".htmlspecialchars(strip_tags(trim($webweb)))."'";
     
 }
 $toolinksubprep=$_POST['toollinks'];
 foreach($toolinksubprep as $toltol){
     if (htmlspecialchars(strip_tags(trim($toltol)))!=htmlspecialchars(strip_tags(trim($toolinksubprep[0])))){
         $toolinksub .= ",";
     }
     $toolinksub.= "'".htmlspecialchars(strip_tags(trim($toltol)))."'";
     
 }
 $textreviewsub=$_POST['textreviewurl'];
 foreach($textreviewsub as $texrev){
	 if (htmlspecialchars(strip_tags(trim($texrev)))!=htmlspecialchars(strip_tags(trim($textreviewsub[0])))){
		 $textrev .= ",";
	 }
	$textrev.= "'".htmlspecialchars(strip_tags(trim($texrev)))."'";
 }
  $sellerssub=$_POST['sellers'];
 foreach($sellerssub as $sel){
	 if (htmlspecialchars(strip_tags(trim($sel)))!=htmlspecialchars(strip_tags(trim($sellerssub[0])))){
		 $seller .= ",";
	 }
	$seller.= "'".htmlspecialchars(strip_tags(trim($sel)))."'";
 }
   $companysub=$_POST['company'];
 foreach($companysub as $comp){
	 if (htmlspecialchars(strip_tags(trim($comp)))!=htmlspecialchars(strip_tags(trim($companysub[0])))){
		 $compy .= ",";
	 }
	$compy.= "'".htmlspecialchars(strip_tags(trim($comp)))."'";
 }
    $monatsub=$_POST['company'];
 foreach($monatsub as $mont){
	 if (htmlspecialchars(strip_tags(trim($mont)))!=htmlspecialchars(strip_tags(trim($monatsub[0])))){
		 $monty .= ",";
	 }
	$monty.= "'".htmlspecialchars(strip_tags(trim($mont)))."'";
 }
 
 
 $queryprep="INSERT INTO gamedata(gamename, platform, taglist, releaseday) VALUES ('".$gamenamesub."' , '".$platformsub."' , '".$genresub."' , '".$releasesub."');";
 
 //"INSERT INTO gamedata(gamename, taglist, platform, releaseday) OUTPUT INSERTED.gameid VALUES ('".$gamenamesub."' , '".$platformsub."' , '".$genresub."' , '".$releasesub"');";
 $submiting = $conn->query($queryprep);
 $returnedid = $conn->insert_id;
 $myfile = fopen("../private/DataStore/".$returnedid.".php", "x") or die("Unable to open file!");
 fwrite($myfile, "<?php\n");
 fwrite($myfile, "\$entrystate='unpublished';\n");
 fwrite($myfile, "\$platforms=array(".$platformsubf.");\n");
 fwrite($myfile, "\$genretags=array(".$genresubf.");\n");
 fwrite($myfile, "\$gametitle='".$gamenamesub."';\n");
 fwrite($myfile, "\$releaseday='".$releasesub."';\n"); 
 fwrite($myfile, '$descriptiontext="'.$descriptionsub.'";');
 fwrite($myfile, "\$reviewvideourl=array(".$reviewvidsub.");\n");
 fwrite($myfile, "\$instructionalvideourl=array(".$instructvidsub.");\n");
 fwrite($myfile, "\$reviewtext=array(".$textrev.");\n");
 fwrite($myfile, "\$webguidelink=array(".$webguidesub.");\n");
 fwrite($myfile, "\$toollinks=array(".$toolinksub.");\n");
 fwrite($myfile, "\$sellers=array(".$seller.");\n");
 fwrite($myfile, "\$company=array(".$compy.");\n");
 fwrite($myfile, "\$monatry=array(".$monty.");\n");
 fwrite($myfile, "?>");
 fclose($myfile);
 
      header("Location: https://www.ownage.co.za/moderation.php?game_id=".$returnedid."");
 ?>
<?php ob_end_flush(); ?>