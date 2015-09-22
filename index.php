<?php
session_start();
session_destroy();
?>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='style.css' rel='stylesheet' type='text/css'>
<script>
    function SelectPlayer(name, score, avatar) {
    var e = name + "SELECT";
    var h = document.getElementById(e).innerHTML;
    if (h == "&nbsp;") {
        document.getElementById(e).innerHTML = "<img src='res/tick.png' style='height:35px;'/><input type='hidden' name='PlayerName[]' value='" + name + "'><input type='hidden' name='PlayerScore[]' value='" + score + "'><input type='hidden' name='PlayerImage[]' value='" + avatar + "'>";
    }
	else {
        document.getElementById(e).innerHTML = "&nbsp;";
    }
    }

function NewPlayer(){
// Change container content
var container = document.getElementById('container').innerHTML;
container = container.substring(0, container.length - 117);
var NewPlayer = document.getElementById('NewPlayer').value;
document.getElementById('container').innerHTML = container + "<div class='box' onclick=" + '"' + "javascript:SelectPlayer('" + NewPlayer + "','1000','../res/NewPlayer.jpg')" + '"' + "id='" + NewPlayer + "DIV'/><img style='height:50px;' src='res/NewPlayer.jpg' />" + NewPlayer + "<div class='select' id='" + NewPlayer + "SELECT' />&nbsp;</div></div>" + '<a href="javascript:openwrapper(300,200);"><img src=' + '"res/plus.png"' + ' /></a><p style="clear:both;margin:0;padding:0;"></p>';
SelectPlayer(NewPlayer,'1000','../res/NewPlayer.jpg');
container = "";

// Hide the Popup
document.getElementById('iframewrapper').style.display='none'; 
document.getElementById('grey').style.display='none';

}


function openwrapper(x, y){
// Show popup elements
document.getElementById('iframewrapper').style.display='block'; 
document.getElementById('grey').style.display='block';

// Resize elements
document.getElementById('iframewrapper').style.width=x + "px";
document.getElementById('iframewrapper').style.height=y + "px";

// Position elements
document.getElementById('iframewrapper').style.marginLeft="-" + (x / 2) + "px";
document.getElementById('iframewrapper').style.marginTop="-" + (y / 2) + "px";
document.getElementById('iframeX').style.left=(x) + "px";
}

</script>
</head>
<body>
<img id="bg" src="res/background.jpg">
<div align="Center" style="font-family:sans-serif; font-size:20px;">
<span style="font-size:10px;"><a href="changelog.txt" target="_blank">Mk 0.1</a>, Data supplied by <a href="http://logsuite.azurewebsites.net/account/lanfix" target="_blank">Logsuite</a> | <a href="changelog.txt" target="_blank">Last update 20/08/2014</a></span><br>
<img style="z-index:999;" src='res/logo.png'><br></div>

<form method="POST" action="calculate/">
<div class='container' id="container">
<?php
//$LFXData = json_decode(file_get_contents('http://logsuite.azurewebsites.net/api/CSGO/v1/lanfix/all/HumanPlayers?format=json'));
$LFXData = json_decode(file_get_contents('cached.json'));


foreach($LFXData->records as $Player):

$ThisPlayer = $Player->name;

echo "<div class='box' onclick=" . '"' . "SelectPlayer(" . "'" . $ThisPlayer  . "','" . $Player->averageScore .  "','" . $Player->avatarMediumUrl . "'" . ")" . '"' . " id='" . $ThisPlayer . "DIV'/>";
echo "<img style='height:50px;' src='" . $Player->avatarMediumUrl . "' />";
echo $ThisPlayer;
echo "<div class='select' id='" . $ThisPlayer. "SELECT' />&nbsp;</div></div>";
endforeach;
echo "<a href='javascript:openwrapper(300,200);'><img src='res/plus.png' /></a><p style='clear:both;margin:0;padding:0;'></p>";
?>
</div>
<center><input class="goButton" type="submit" value="Calculate!" /></center>
</form>


<!--
###########################################################################
######################### Iframe Section  Start ###########################
###########################################################################
-->

<!-- Grey out background -->
<div id="grey" style="display:none;" onclick="document.getElementById('iframewrapper').style.display='none'; document.getElementById('grey').style.display='none';">&nbsp;</div>

<!-- The white box that the window will reside in -->
<div id="iframewrapper" style="width: 750px; height: 230px; margin-left: -375px; margin-top: -95px; display: none;">

<!-- The 'X' button -->
<a href="javascript:void(0);" onclick="document.getElementById('iframewrapper').style.display='none'; document.getElementById('grey').style.display='none';">
<img id="iframeX" src="res/X.png" style="position:relative; top:-2px; border:0 none;">
</a>

<!-- Actual iFrame container -->
<div style="clear:both; background:#1f2932; padding:5px; font-size:12px; border:1px solid #000;">
Enter the name of your guest player and click submit!
<input class="GenericInput" style="width:200px;" type="text" id="NewPlayer" />
<input onclick="javascript:NewPlayer();" class="GenericInput" style="width:80px;" type="button" id="NewPlayerButton" value="Submit" />
</div>

</div>
 
<!--
###########################################################################
########################## Iframe Section  End ############################
###########################################################################
-->


</body>
</html>