<?php
if(isset($_GET['screen'])){
$im = imagegrabscreen();
ob_start();
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 5, 400, 5, "github@steveola", $text_color);
imagepng($im);
$imgstr = ob_get_clean();
imagedestroy($im);
$imgstr_b64 = base64_encode($imgstr);
//echo "<img id='display' src='data:image/png;base64,$imgstr_b64' width='100%' />";
echo "$imgstr_b64";
die();
}
?>

<html>
<head>
<title>PHP SCREEN CAST by OLA STEPHEN github@steveola</title>

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("display").src = "data:image/png;base64," + this.responseText;
    }
  };
  
  url = window.location.href;
  xhttp.open("GET", url + "?screen='true'", true);
  xhttp.send();
}

var myVar = setInterval(loadDoc, 1000);
</script>
</head>
<body>

<img id='display' src='' width='100%' />

</body>
</html>