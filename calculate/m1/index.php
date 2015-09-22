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
$i = 0;
$Ts = 0;
$CTs = 0;
foreach($PlayerName as $Player):
if ($i&1) {
array_push($RedTeam, $Player);
array_push($RedTeamImage, $PlayerImage[$i]);
$Ts = $Ts + $PlayerScore[$i];;
}
else {
array_push($BlueTeam, $Player);
array_push($BlueTeamImage, $PlayerImage[$i]);
$CTs = $CTs + $PlayerScore[$i];
}
$i++;
endforeach;

$_SESSION['m1score'] = $Ts;
$_SESSION['RedTeam1'] = $RedTeam;
$_SESSION['BlueTeam1'] = $BlueTeam;
$_SESSION['RedTeam1Image'] = $RedTeamImage;
$_SESSION['BlueTeam1Image'] = $BlueTeamImage;

echo "red team: " . $Ts . " blue team: " . $CTs;
?>
<a href='../../'>Start Again</a>

<p style="clear:both;margin:0;padding:0;"></p>
</div>

<script>
window.location.assign("../m2");
</script>
</body>
</html>