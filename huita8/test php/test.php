<?php
echo "display_error = ".ini_get('display_error')."</br>";
echo "register_globals = ".ini_get('register_globals')."</br>";
echo "post_max_size = ".ini_get('post_max_size');

echo phpinfo();