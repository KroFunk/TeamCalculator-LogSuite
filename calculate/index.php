<?php
session_start();
$_SESSION['PlayerName'] = $_POST['PlayerName'];
$_SESSION['PlayerScore'] = $_POST['PlayerScore'];
$_SESSION['PlayerImage'] = $_POST['PlayerImage'];
$IdealScore = 0;
foreach ($_POST['PlayerScore'] as $score) {
$IdealScore = $IdealScore + $score;
}
$_SESSION['IdealScore'] = ($IdealScore / 2);
?>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='../style.css' rel='stylesheet' type='text/css'>

</head>
<body>
<img id="bg" src="../res/background.jpg">
<div align="Center" style="font-family:sans-serif; font-size:20px;">
<span style="font-size:10px;">Data supplied by <a href="http://logsuite.azurewebsites.net/account/lanfix" target="_blank">Logsuite</a></span><br>
<img style="z-index:999;" src='../res/logo.png'><br></div>


<div class='container'>
<script>
window.location.assign("m3/");
</script>
<p style="clear:both;margin:0;padding:0;"></p>
</div>

</body>
</html>