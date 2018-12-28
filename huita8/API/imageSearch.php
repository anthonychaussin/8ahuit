<?php
//ini_set("display_errors",0);error_reporting(0);
$url = "https://www.google.fr/search?q=".urlencode($_GET['query'])."&tbm=isch&source=lnms";
$body = file_get_contents($url);
if ($body) {

$body = preg_split('/id="ires"/', $body)[1];
$body = preg_split('/id="foot"/', $body)[0];
$body = preg_split('/<img/', $body)[1];
$body = preg_split('/>/', $body)[0];
$body = preg_split('/src="/', $body)[1];
$body = preg_split('/"/', $body)[0];

echo $body;	# code...
}
else echo "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRO16IDz68_ChB0bL0KVMaqHOtB_ts835Io5cAWd40ZKS2QRL_w";
?>