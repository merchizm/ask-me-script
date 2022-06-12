<?php 
ob_start();
include(TEMA."footer.tpl");
$footer = ob_get_contents();
ob_end_clean();
echo $footer;
?>