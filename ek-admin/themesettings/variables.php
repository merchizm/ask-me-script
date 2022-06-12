<?php
include "../../config.php";
$andboo = $db->query("SELECT * FROM temalar WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
if ($andboo){
    $andboo_Data =  json_decode($andboo['settings']);
    $andboo_fisim = $andboo_Data->{'fisim'};
    $andboo_fadress = $andboo_Data->{'fadress'};
    $andboo_pp = $andboo_Data->{'pp'};
}else{
    die("theme engine error : x1.2");
}

$holladroid = $db->query("SELECT * FROM temalar WHERE id = '2'")->fetch(PDO::FETCH_ASSOC);
if ($holladroid){
    $holladroid_Data =  json_decode($holladroid['settings']);
    $holladroid_fisim = $holladroid_Data->{'fisim'};
    $holladroid_fadress = $holladroid_Data->{'fadress'};
    $holladroid_bio = $holladroid_Data->{'bio'};
    $holladroid_twitterlnk = $holladroid_Data->{'twitterlnk'};
    $holladroid_facebooklnk = $holladroid_Data->{'facebooklnk'};
    $holladroid_bgimg  = $holladroid_Data->{'bgimg'};
    $holladroid_tema = $holladroid['themename'];
    $holladroid_pp = $holladroid_Data->{'pp'};
}else{
    die("theme engine error x1.2");
}