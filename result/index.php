<?php
session_start();
$m1red = $_SESSION['RedTeam1'];
$m1blue = $_SESSION['BlueTeam1'];

$m2red = $_SESSION['RedTeam2'];
$m2blue = $_SESSION['BlueTeam2'];

$m3red = $_SESSION['RedTeam3'];
$m3blue = $_SESSION['BlueTeam3'];

$m3score = max($_SESSION['IdealScore'],$_SESSION['m3score']) - min($_SESSION['IdealScore'],$_SESSION['m3score']);
$m2score = max($_SESSION['IdealScore'],$_SESSION['m2score']) - min($_SESSION['IdealScore'],$_SESSION['m2score']);
$m1score = max($_SESSION['IdealScore'],$_SESSION['m1score']) - min($_SESSION['IdealScore'],$_SESSION['m1score']);
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

<!--// Plain text intro //-->
<div class='container'>
The ideal score for a team is: <b><?php echo $_SESSION['IdealScore']; ?></b>. <br>
Below is the teams created by the methods employed by the Team Calculator. The most balanced team is highlighted. <a href='../'>Click here to Start Again!</a> 
</div>

<!--// Method 1 Results //-->
<div class="Secret" id="<?php echo $m1score; ?>">
<center>
<div style="display:none;" id="Hidden1"><h1>Method 1 (odds and evens)</h1></div>
<span style="font-size:12px;">
<?php 
echo "Team score: " . $_SESSION['m1score'] . " Imbalance: " . $m1score; 
?>
</span></center>
<div class='container'>

<div style="float:left;width:50%;background:#801B1B;">
<div class="teamtitle">Red Team</div>
<?php
$i = 0;
foreach($m1red as $Player):
echo "<div class='box'>";
echo "<img style='height:50px;' src='".$_SESSION['RedTeam1Image'][$i]."'>";
echo $Player;
echo "</div>";
$i++;
endforeach;
?>
</div>

<div style="float:right;width:50%;background:#1B1B80;">
<div class="teamtitle">Blue Team</div>
<?php
$i = 0;
foreach($m1blue as $Player):
echo "<div class='box'>";
echo "<img style='height:50px;' src='".$_SESSION['BlueTeam1Image'][$i]."'>";
echo $Player;
echo "</div>";
$i++;
endforeach;
?>
</div>

<p style="clear:both;margin:0;padding:0;"></p>
</div>
</div>

<!--// Method 2 Results //-->
<div class="Secret" id="<?php echo $m2score; ?>">
<center>
<div style="display:none;" id="Hidden2"><h1>Method 2 (1-2-2-1)</h1></div>
<span style="font-size:12px;">
<?php 
echo "Team score: " . $_SESSION['m2score'] . " Imbalance: " . $m2score; 
?>
</span></center>
<div class='container'>

<div style="float:left;width:50%;background:#801B1B;">
<div class="teamtitle">Red Team</div>
<?php
$i = 0;
foreach($m2red as $Player):
echo "<div class='box'>";
echo "<img style='height:50px;' src='".$_SESSION['RedTeam2Image'][$i]."'>";
echo $Player;
echo "</div>";
$i++;
endforeach;
?>
</div>

<div style="float:right;width:50%;background:#1B1B80;">
<div class="teamtitle">Blue Team</div>
<?php
$i = 0;
foreach($m2blue as $Player):
echo "<div class='box'>";
echo "<img style='height:50px;' src='".$_SESSION['BlueTeam2Image'][$i]."'>";
echo $Player;
echo "</div>";
$i++;
endforeach;
?>
</div>

<p style="clear:both;margin:0;padding:0;"></p>
</div>
</div>

<!--// Method 3 Results //-->
<div class="Secret" id="<?php echo $m3score; ?>">
<center>
<div style="display:none;" id="Hidden3"><h1>Method 3 (Strongest and Weakest Paired)</h1></div>
<span style="font-size:12px;">
<?php 
echo "Team score: " . $_SESSION['m3score'] . " Imbalance: " . $m3score; 
?>
</span></center>
<div class='container'>

<div style="float:left;width:50%;background:#801B1B;">
<div class="teamtitle">Red Team</div>
<?php
$i = 0;
foreach($m3red as $Player):
echo "<div class='box'>";
echo "<img style='height:50px;' src='".$_SESSION['RedTeam3Image'][$i]."'>";
echo $Player;
echo "</div>";
$i++;
endforeach;
?>
</div>

<div style="float:right;width:50%;background:#1B1B80;">
<div class="teamtitle">Blue Team</div>
<?php
$i = 0;
foreach($m3blue as $Player):
echo "<div class='box'>";
echo "<img style='height:50px;' src='".$_SESSION['BlueTeam3Image'][$i]."'>";
echo $Player;
echo "</div>";
$i++;
endforeach;
?>
</div>

<p style="clear:both;margin:0;padding:0;"></p>
</div>
</div>

<div id="ShowAll" style="display:block;text-align:center;">
<a href='javascript:showall();'>Click here to show all team combinations!</a> 
</div>
<div id="NTSH"><!-- nothing to see here --></div>
<script>
function showall(){
document.getElementById('ShowAll').style.display='none'; 

document.getElementById('Hidden1').style.display='block'; 
document.getElementById('Hidden2').style.display='block'; 
document.getElementById('Hidden3').style.display='block'; 
document.getElementById('<?php echo $m1score;?>').style.display='block'; 
document.getElementById('<?php echo $m2score;?>').style.display='block'; 
document.getElementById('<?php echo $m3score;?>').style.display='block'; 
}
</script>

<!-- highlight best and hide others -->
<script>
document.getElementById("<?php echo min($m1score,$m2score);?>").setAttribute("id", "best");
//re-assign the lost id to avoid bugs. 
document.getElementById("NTSH").setAttribute("id", "<?php echo min($m1score,$m2score);?>");
</script>




</body>
</html>