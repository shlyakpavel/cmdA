<?php 
    $message=shell_exec("/usr/local/bin/python3.6 /var/www/shlyakpavel.tk/arhack/test.py ".$_GET["id"]." 2>&1");
    print_r($message);
?>
