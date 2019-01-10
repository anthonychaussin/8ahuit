<?php
spl_autoload_register(function ($class_name) {
    if (preg_match('/Controller/m',$class_name)) {require 'app/Http/Controllers/'.$class_name.'.php';}
	else{require 'app/'.$class_name.'.php';}});