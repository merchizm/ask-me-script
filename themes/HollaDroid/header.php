<?php 
ob_start();
include(TEMA."header.tpl");
$header = ob_get_contents();
ob_end_clean();
echo $header;
?>