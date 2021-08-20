<?php 
    include "config.php";
    $conn = new mysqli($sqlservername, $sqlusername, $sqlpassword, $sqldatabasename);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $
    
    
    function constructquery($platform, $genre) {
        $mark = count($genre)-1;
        $query = "SELECT * FROM gamedata WHERE platform='".$platform."' and (";
        foreach($genre as $cgenre){
            $query = $query."genre='".$cgenre."' ";
            if $cgenre!=$genre[$mark]    {
                $query = $query." AND ";
            }
            
        }
        $query .= ";";
            
    }
?>