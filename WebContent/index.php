

<!DOCTYPE html>
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


<div class='sidebar'>
  
  
        <div>
		         
		<button class="dropbtn" id="dropbtn">Advanced Search</button> 
          <form action="listgames" method='POST' class='f1' name='formsub' id="gform">
          <div id="myDropdown" class="dropdown-content ">
          	<div class="checkboxes">
				<p id='f1'> Select search criteria </p> <br>
				<strong>platform:</strong><br>
            	
            	<input type="radio" name='platform_name' value="windows"> Windows
  				<input type="radio" name='platform_name' value="linux"> Linux
  				<input type="radio" name='platform_name' value="android"> Android
  				<input type="radio" name='platform_name' value="ps4"> PS4
  				<input type="radio" name='platform_name' value="xbox"> XBox
  				<input type="radio" name='platform_name' value="wii"> WII
            	
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
          </div>
          <div class = "searchbar">
            <input type="text" name="search_name" placeholder="Game's name"><button type="button" id="submit" class="searchb" >Search</button><br>
          </div>
          </form>
        
        </div>
</div>
<div class="contents">
<?php include 'draw_page.php'; ?>
</div>
<footer class="footnote">
	This site is still under construction. Please feel free to poke around.
</footer>
 </body>
</html> 