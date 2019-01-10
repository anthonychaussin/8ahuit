<?php
//                  ANTHONY CHAUSSIN
class Controller 
{
	function cssLoader($files)
	{
		if (is_array($files)) {foreach ($files as $value) {	echo "<link rel='stylesheet' type='text/css' href='public/css/".$value.".css'>";}}
	}
	function jsLoader($files)
	{
		if (is_array($files)) {foreach ($files as $value) {	echo "<script src='public/js/$value.js'></script>";};}
	}
    function view($name, $data, $css = null, $js = null, $type = ".php")
    {
    	include "resources/lang/trad.php";
    	$text = trad();
    	include 'resources/views/header.php';
    	if (!is_null($js)) {
    		$this->jsLoader($js);
    		$js = null;
    	}
    	include "resources/views/$name".$type;
    	if (!is_null($js)) {$this->jsLoader($js);}
    	echo "</body>";
    	include 'resources/views/footer.html';
    }
}
?>

<style type="text/css" src=""></style>