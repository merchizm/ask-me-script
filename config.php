<?php
session_start();
define('HOST', "localhost");
define('USER', "root");
define('PASSWORD', "test");
define('DB_NAME', "askme");
try {
    $db = new PDO("mysql:host=".HOST.";dbname=". DB_NAME,USER,PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8mb4'");
} catch ( PDOException $e ){
    print $e->getMessage();
}

$ssl = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] && $_SERVER["HTTPS"] != "off"
    ? true
    : false;
define("SSL_ENABLED", $ssl);

$app_url = (SSL_ENABLED ? "https" : "http")
    . "://"
    . $_SERVER["SERVER_NAME"]
    . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
    . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");
define("PATH", $app_url);

date_default_timezone_set('Europe/Istanbul');
$get = $db->query("SELECT * FROM ayarlar")->fetch(PDO::FETCH_ASSOC);
if($get){
    $kullisim = $get['site_kullanicisi'];
    $sd = $get['site_durum'];
    $themeid = $get['site_tema'];
    /// $siteadress = $get['site_url']; ** USELESS
    $baslik = $get['site_baslik'];
    $sdescription = $get['site_desc'];
    $pass = $get['site_pass'];
    $sifre = $get['site_pass'];
}
else{
    die("database could not be accessable");
}
if($themeid == "1"){
    $sorgu = $db->query("SELECT * FROM temalar WHERE id = '{$themeid}'")->fetch(PDO::FETCH_ASSOC);
    if ($sorgu){
        $data =  json_decode($sorgu['settings']);
        $fisim = $data->{'fisim'};
        $fadress = $data->{'fadress'};
        $profilepicture = $data->{'pp'};
        $tema = $sorgu['themename'];
    }else{
        die("theme engine error : x1");
    }
}else if($themeid == "2"){
    $sorgu = $db->query("SELECT * FROM temalar WHERE id = '{$themeid}'")->fetch(PDO::FETCH_ASSOC);
    if ($sorgu){
        $data =  json_decode($sorgu['settings']);
        $fisim = $data->{'fisim'};
        $fadress = $data->{'fadress'};
        $bio = $data->{'bio'};
        $twitterlnk = $data->{'twitterlnk'};
        $facebooklnk = $data->{'facebooklnk'};
        $bgimage = $data->{'bgimg'};
        $profilepicture = $data->{'pp'};
        $tema = $sorgu['themename'];
    }else{
        die("theme engine error x1");
    }
}

// *
// TODO: ALT YAPI GÜNCELLEŞTİRİLMELİ VE GELİŞTİRİLMELİ.
// *
define("SITEDURUM", $sd);
define("ROOTPATH", dirname(__FILE__));
define("TEMABG", PATH."/themes/".$tema."/"); // **
define("TEMA",ROOTPATH."/themes/".$tema."/");
define("TEMAINFO", ROOTPATH."/themes/".$tema."/".$tema.".rm");

// tema sistemi için yorumlama
$temadizin = TEMABG;
$favicon = TEMA."favicon.ico";
