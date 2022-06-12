<?php 
//******************//
//Basic AskMe Script//
//******************//
require_once("./config.php");
if(SITEDURUM == "1"){
if(empty($tema)){
die("Theme Engine error : theme could not selected");
}else{
include(TEMA."header.php");
include(TEMA."main.php");
include(TEMA."footer.php");
}}else{
die(str_repeat("<br>", 4)."<title>AskMe Bakımda !</title><center><font size=20><b>Site Bakımdadır.</b></font><br><br>site siz değerli ziyaretçilerimize daha iyi bir hizmet vermek için bakımdadır. anlayışınız için teşekkürler.</center>");
}

?>