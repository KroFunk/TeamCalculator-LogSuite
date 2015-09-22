<?php
session_start();
$PlayerName = $_SESSION['PlayerName'];
$PlayerScore = $_SESSION['PlayerScore'];
$PlayerImage = $_SESSION['PlayerImage'];
$RedTeam = array();
$BlueTeam = array();
$RedTeamImage = array();
$BlueTeamImage = array();
?>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='../../style.css' rel='stylesheet' type='text/css'>

</head>
<body>
<img id="bg" src="../../res/background.jpg">
<div align="Center" style="font-family:sans-serif; font-size:20px;">
<span style="font-size:10px;">Data supplied by <a href="http://logsuite.azurewebsites.net/account/lanfix" target="_blank">Logsuite</a></span><br>
<img style="z-index:999;" src='../../res/logo.png'><br></div>


<div class='container'>

<?
$TotalPlayerCount = count($PlayerName);
$OffSet = $TotalPlayerCount;
$BlueCount = ceil($TotalPlayerCount / 2);
$RedCount = floor($TotalPlayerCount);
$Flip = 0;
$i = 0;
$i2 = 0;
$Ts = 0;
$CTs = 0;

echo "Total players: " . $TotalPlayerCount . "<br/>";

while ($TotalPlayerCount > 0){

//only appened red team if its max is not already reached. 
if ($i < $RedCount) {
	if ($i2 % 2 == 0) {
		echo "red (high) " . $i . " " .  $PlayerName[$i] . "<br/>";
	}
	else {
	$LowVal = $OffSet - $i;
		echo "red (low) " .  $LowVal . " " . $PlayerName[$LowVal] . "<br/>";
	}
	array_push($RedTeam, $Player);
    array_push($RedTeamImage, $PlayerImage[$i]);
    $Ts = $Ts + $PlayerScore[$i];;
}

//a player has been assigned, update offsets and counts. 
$i++;
$TotalPlayerCount = $TotalPlayerCount - 1;

//assign player to blue team
	if ($i2 % 2 == 0) {
		echo "blue (high) " . $i . " " .  $PlayerName[$i] . "<br/>";
	}
	else {
	$LowVal = $OffSet - $i;
		echo "blue (low) " .  $LowVal . " " . $PlayerName[$LowVal] . "<br/>";
	}
array_push($BlueTeam, $Player);
array_push($BlueTeamImage, $PlayerImage[$i]);
$CTs = $CTs + $PlayerScore[$i];


//a player has been assigned, update offsets and counts. 
$i++;
$i2++;
$TotalPlayerCount = $TotalPlayerCount - 1;
}







$_SESSION['m3score'] = $Ts;
$_SESSION['RedTeam3'] = $RedTeam;
$_SESSION['BlueTeam3'] = $BlueTeam;
$_SESSION['RedTeam3Image'] = $RedTeamImage;
$_SESSION['BlueTeam3Image'] = $BlueTeamImage;

?>
<a href='../../'>Start Again</a>

<p style="clear:both;margin:0;padding:0;"></p>
</div>


<script>
window.location.assign("../../result/");
</script>

</body>
</html>