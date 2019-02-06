<?php
//                  ANTHONY CHAUSSIN
class Controller 
{
    public $data = []; 
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
    	$lang = trad();
        if (isset($_SESSION['langue'])) { $lang = trad($_SESSION['langue']);}
        elseif (isset($_SESSION['lang'])) {
            $lang = trad($_SESSION['lang']);
        }
    	include 'resources/views/header.php';
    	if (!is_null($js)) {
    		$this->jsLoader($js);
    		$js = null;
    	}
    	include "resources/views/$name".$type;
    	if (!is_null($js)) {$this->jsLoader($js);}
    	echo "</body>";
    	include 'resources/views/footer.php';
    }
}
?>

<style type="text/css" src=""></style>