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
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link rel = "stylesheet"  type = "text/css" href = "../styles/ownagestyle.css" />
<script>
    function add_revvid_url(){
			 document.getElementById('reviewvids').innerHTML+="<input class='revvidurl' type=text name='reviewvideourl[]'>";
    }
    function add_instvid_url(){
        document.getElementById('instvids').innerHTML+="<input class='instvidurl' type=text name='intructionalvideourl[]'>";
    }
    function add_reviewtext_url(){
        document.getElementById('reviewtext').innerHTML+="<input class='revtexturl' type=text name='textreviewurl[]'>";
    }
    function add_tool_url(){
        document.getElementById('toollink').innerHTML+="<input class='toolsurl' type=text name='toollinks[]'>";
    }
    function add_webguide_url(){
        document.getElementById('webguide').innerHTML+="<input class='webguidetext' type=text name='webguidelink[]'>";
    }
	function add_company(){
    document.getElementById('company').innerHTML+="<input class='companyt' type=text name='company[]'>";
    }
	function add_sellers(){
    document.getElementById('sellers').innerHTML+="<input class='sell' type=text name='sellers[]'>";
    }
   	function add_streamer(){
    document.getElementById('streamer').innerHTML+="<input class='streamerst' type=text name='streamers[]'>";
    }
    function checkForm(){
		var revv = document.getElementsByClassName('revvidurl');
        for(i = 0 ; i < revv.length-1; i++ ){
            for(x = i+1 ; x < revv.length; x++ ){
                if(i != x && revv[i].value == revv[x].value){
                    alert("Duplicate!");
					document.getElementsByClassName('revvidurl').focus();
                    return false;
                } 
                
            }
            
        }
        var webb = document.getElementsByClassName('webguidetext');
        for(i = 0 ; i < webb.length-1; i++ ){
            for(x = i+1 ; x < webb.length; x++ ){
                if(i != x && webb[i].value == webb[x].value){
                    alert("Duplicate!");
					document.getElementsByClassName('webguidetext').focus();
                    return false;
                } 
                
            }
            
        }
        var instt = document.getElementsByClassName('instvidurl');
        for(i = 0 ; i < instt.length-1; i++ ){
            for(x = i+1 ; x < instt.length; x++ ){
                if(i != x && instt[i].value == instt[x].value){
                    alert("Duplicate!");
					document.getElementsByClassName('instvidurl').focus();
                    return false;
                } 
                
            }
            
        }
        var revtt = document.getElementsByClassName('revtexturl');
        for(i = 0 ; i < revtt.length-1; i++ ){
            for(x = i+1 ; x < revtt.length; x++ ){
                if(i != x && revtt[i].value == revtt[x].value){
                    alert("Duplicate!");
					document.getElementsByClassName('revtexturl').focus();
                    return false;
                } 
                
            }
            
        }
        var toolss = document.getElementsByClassName('toolsurl');
        for(i = 0 ; i < toolss.length-1; i++ ){
            for(x = i+1 ; x < toolss.length; x++ ){
                if(i != x && toolss[i].value == toolss[x].value){
                    alert("Duplicate!");
					document.getElementsByClassName('toolsurl').focus();
                    return false;
                } 
                
            }
            
        }
		var sells = document.getElementsByClassName('sell');
        for(i = 0 ; i < sells.length-1; i++ ){
            for(x = i+1 ; x < sells.length; x++ ){
                if(i != x && sells[i].value == sells[x].value){
                    alert("Duplicate!");
					document.getElementsByClassName('sell').focus();
                    return false;
                } 
                
            }
            
        }
		var compp = document.getElementsByClassName('companyt');
        for(i = 0 ; i < compp.length-1; i++ ){
            for(x = i+1 ; x < compp.length; x++ ){
                if(i != x && compp[i].value == compp[x].value){
                    alert("Duplicate!");
					document.getElementByClassName("companyt").focus();
                    return false;
                } 
                
            }
            
        }
    	var stream = document.getElementsByClassName('streamerst');
        for(i = 0 ; i < stream.length-1; i++ ){
            for(x = i+1 ; x < stream.length; x++ ){
                if(i != x && stream[i].value == stream[x].value){
                    alert("Duplicate!");
					document.getElementByClassName("streanerst").focus();
                    return false;
                } 
                
            }
            
        }
		return true;

}
	
</script>

</head>
<body>
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
<form action='submited.php' name='sform' method='post' onsubmit='return checkForm()'>
          	<div class="checkboxes">
				<p id='f1'> Select search criteria </p> <br>
				<strong>platform:</strong><br>
            	
            	<input type="checkbox" name='platform_name[]' value="windows"> Windows
  				<input type="checkbox" name='platform_name[]' value="linux"> Linux
  				<input type="checkbox" name='platform_name[]' value="android"> Android
  				<input type="checkbox" name='platform_name[]' value="ps4"> PS4
  				<input type="checkbox" name='platform_name[]' value="xbox"> XBox
  				<input type="checkbox" name='platform_name[]' value="wii"> WII
          	
            	<br><strong>genre:</strong><br>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="ACT"><label>Action</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="ADV"><label>Adventure</label></p>				
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="FPS"><label>FPS</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="HORR"><label>Horror</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="LOG"><label>Logic</label></p>
            	<p class='checkthis'><input type="checkbox" name='genre_name[]' value="MMO"><label>MMO</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="TBS"><label>MOBA</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="FPS"><label>Multiplayer</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="PLAT"><label>Platform</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="RAC"><label>Racing</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="RTS"><label>RTS</label></p>
            	<p class='checkthis'><input type="checkbox" name='genre_name[]' value="RPG"><label>RPG</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="SAB"><label>Sandbox</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="SIM"><label>Simulation</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="SPORT"><label>Sports</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="STRAT"><label>Strategy</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="SURV"><label>Survival</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="TBS"><label>TBS</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="TD"><label>TD</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="VR"><label>Virtual Reality</label></p>
				<p class='checkthis'><input type="checkbox" name='genre_name[]' value="WAR"><label>War</label></p>
            	<br>
          	</div>
     

<h5>Game Name</h5>
<input type=text name='gamename' required>
<h5>Discription</h5>
<textarea name='description' required></textarea>
<h2>Please do not use duplicate url's</h2>
<div id='reviewvids'>
    <h5>Review Video URL (atleast 1 required)</h5>
    <input class='revvidurl' type=text name='reviewvideourl[]' required>
</div>
<button type="button" onclick=add_revvid_url()>addvid</button>
<div id='instvids'>
    <h5>Instructional Video Url (atleast 1 required)</h5>
    <input class='instvidurl' type=text name='intructionalvideourl[]' required>
</div>
<button type="button" onclick=add_instvid_url()>addvid</button>
<div id='reviewtext'>
    <h5>Text Review URL (atleast 1 required)</h5>
    <input class='revtexturl' type=text name='textreviewurl[]' required>
</div>
<button type="button" onclick=add_reviewtext_url()>addtext</button>
<div id='toollink'>
    <h5>Usefull links (atleast 1 required)</h5>
    <input class='toolsurl' type=text name='toollinks[]' required>
</div>
<button type="button" onclick=add_tool_url()>addtool</button>
<div id='webguide'>
    <h5>Web guides (atleast 1 required)</h5>
    <input class='webguidetext' type=text name='webguidelink[]' required>
</div>
<button type="button" onclick=add_webguide_url()>addguide</button>
<h5>Game release date (yyyy-mm-dd)(Required)</h5>
<input type=date name='releaseday' required>
<div id='sellers'>
    <h5>Retailers (optional)</h5>
    <input class='sell' type=text name='sellers[]'>
</div>
<button type="button" onclick=add_sellers()>Add</button>
<div id='company'>
    <h5>Development company (Optional)</h5>
    <input class='companyt' type=text name='company[]'>
</div>
<button type="button" onclick=add_company()>Add</button>
<div id='streamer'>
    <h5>Known streamers(Optional)</h5>
    <input class='streamerst' type=text name='streamers[]'>
</div>
<button type="button" onclick=add_streamer()>Add</button>
</br>
<h3>Monatitation implementations</h3>
<p class='checkthis'><input type="checkbox" name='monatitation[]' value="Singlepayment"><label>Single payment</label></p>
<p class='checkthis'><input type="checkbox" name='monatitation[]' value="Free2play"><label>Free2play</label></p>
<p class='checkthis'><input type="checkbox" name='monatitation[]' value="Subscriptions"><label>Subscriptions</label></p>
<p class='checkthis'><input type="checkbox" name='monatitation[]' value="Microtransactions"><label>Microtransactions</label></p>
<p class='checkthis'><input type="checkbox" name='monatitation[]' value="Freemium"><label>Freemium</label></p>
</br>
</br>
<input type=submit name=submit value="submit" class="searchb"></input>


</form>
 
</body>
</html>
<?php ob_end_flush(); ?>