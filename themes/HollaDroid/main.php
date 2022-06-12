<?php
ob_start();
include(TEMA."main.tpl");
$index_data = ob_get_contents();
ob_end_clean();
echo $index_data;
?>