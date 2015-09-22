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
$i2 = 0;
$Ts = 0;
$CTs = 0;
foreach($PlayerName as $Player):
if ($i <= 0) {
echo $Player . " red team</br>";
array_push($RedTeam, $Player);
array_push($RedTeamImage, $PlayerImage[$i2]);
$Ts = $Ts + $_SESSION['PlayerScore'][$i2];
}
else {
echo $Player . " blue team</br>";
array_push($BlueTeam, $Player);
array_push($BlueTeamImage, $PlayerImage[$i2]);
$CTs = $CTs + $PlayerScore[$i2];
if ($i == 2) {
$i = -2;
}
}
$i++;
$i2++;
endforeach;

$_SESSION['m2score'] = $Ts;
$_SESSION['RedTeam2'] = $RedTeam;
$_SESSION['BlueTeam2'] = $BlueTeam;
$_SESSION['RedTeam2Image'] = $RedTeamImage;
$_SESSION['BlueTeam2Image'] = $BlueTeamImage;

?>
<a href='../../'>Start Again</a>

<p style="clear:both;margin:0;padding:0;"></p>
</div>


<script>
window.location.assign("../../result/");
</script>

</body>
</html>