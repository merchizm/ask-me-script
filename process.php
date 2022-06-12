<?php
$do = $_GET["do"];
require_once("./config.php");

/// fonksiyonlar
function timeConvert ( $zaman ){
	$zaman =  strtotime($zaman);
	$zaman_farki = time() - $zaman;
	$saniye = $zaman_farki;
	$dakika = round($zaman_farki/60);
	$saat = round($zaman_farki/3600);
	$gun = round($zaman_farki/86400);
	$hafta = round($zaman_farki/604800);
	$ay = round($zaman_farki/2419200);
	$yil = round($zaman_farki/29030400);
	if( $saniye < 60 ){
		if ($saniye == 0){
			return "az önce";
		} else {
			return $saniye .' saniye önce';
		}
	} else if ( $dakika < 60 ){
		return $dakika .' dakika önce';
	} else if ( $saat < 24 ){
		return $saat.' saat önce';
	} else if ( $gun < 7 ){
		return $gun .' gün önce';
	} else if ( $hafta < 4 ){
		return $hafta.' hafta önce';
	} else if ( $ay < 12 ){
		return $ay .' ay önce';
	} else {
		return $yil.' yıl önce';
	}
}
function GetIP(){
	if(getenv("HTTP_CLIENT_IP")) {
 		$ip = getenv("HTTP_CLIENT_IP");
 	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 		$ip = getenv("HTTP_X_FORWARDED_FOR");
 		if (strstr($ip, ',')) {
 			$tmp = explode (',', $ip);
 			$ip = trim($tmp[0]);
 		}
 	} else {
 	$ip = getenv("REMOTE_ADDR");
 	}
	return $ip;
}

function ban_kontrol($ziyip){
	    global $db;
        $query = $db->query("SELECT * FROM yasaklilar", PDO::FETCH_ASSOC);
        if ( $query->rowCount() != 0){
        foreach( $query as $row ){
        if($row['ip'] == $ziyip){
			return 1;
		}
		}}}

/// işlemler
if($do == "cek"){
	// cek fonksiyonu
	$neyi = $_GET["neyi"];
	// kontrol
	$sorular = $db->query("SELECT * FROM sorular");
    $sorular = $sorular->rowCount(); 
    if($sorular == 0){
		echo '<div class="container"><center><br/><img src="https://cdn0.iconfinder.com/data/icons/shift-free/32/Pacman_Ghost-128.png " width="100px"><br/><font color="#000">Burası Biraz Issız Sanırım</font><br/><br/></center></div>';
	}else{
	/// eğer post var ise verileri çekiyoruz
	if($neyi == "hepsi"){
		$query = $db->query("SELECT * FROM sorular ORDER BY id DESC LIMIT 0,10", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
        foreach( $query as $row ){
          ?>
<div class="container">
<div class="soru">
<div class="media-body">
<span class="media-meta pull-right"><span class="badge badge-primary"><?php echo $row['catagory']; ?></span><span class="badge badge-pill badge-light"><?php echo timeConvert($row['date']); ?></span></span>
<font color="#000">
<div class="title"><b><?php echo $row['title']; ?></b></div>
<p class="summary"><?php echo $row['answer']; ?></p>
</font></div></div></div>
<div class="bosluk"></div>
		  <?php 
        }
        }	
	}else{
		if($neyi == "sorular"){$katagoriy = "Soru";}else if($neyi == "itiraflar"){$katagoriy = "İtiraf";}else if($neyi == "oneriler"){$katagoriy = "Öneri";}else if($neyi == "elestiriler"){$katagoriy = "Eleştiri";}else{die("Bir Problem Oldu Sanırım");}
			$query = $db->query("SELECT * FROM sorular ORDER BY id DESC LIMIT 0,10", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
        foreach( $query as $row ){
		
		if($row['catagory'] == $katagoriy){
          ?>
<div class="container">
<div class="soru">	
<div class="media-body">
<span class="media-meta pull-right"><span class="badge badge-primary"><div class="ustkose"><?php echo $row['catagory']; ?></div></span><span class="badge badge-pill badge-light"><div class="ustkose"><?php echo timeConvert($row['date']); ?></div></span></span>
<font color="#000">
<h5 class="title"><b><?php echo $row['title']; ?></b></h5>
<p class="summary"><?php echo $row['answer']; ?></p>
</font></div></div></div>
<div class="bosluk"></div>
		  <?php 
        }}
	}}
}}else if($do == "new"){
	if(ban_kontrol(GetIP()) != 1){
    $soruyazisi = $_POST["soru"];
	$sorutipi = $_POST["katagori"];
	$soranip = GetIP();
	/// ip almamın sebebi birisi rahatsız eder ise kolayca engelleyin diye

	if(empty($soruyazisi)){
		echo "Boş soru nedir ya dalgamı geçiyorsun can'ım ?";
	}else{
		$query = $db->prepare("INSERT INTO csorular SET
    soruyazi = :syazi,
    sorutipi = :stipi,
    soruip = :sip");
    $insert = $query->execute(array(
      'syazi' => $soruyazisi,
      'stipi' => $sorutipi, 
      'sip' => $soranip
    ));
    if ($insert){
    $last_id = $db->lastInsertId();
    echo '<title>ÇUF ÇUF!</title><link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"><div class="container"><center>';
    echo '<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Başarılı !</h4>
  <p><img src="./images/giphy.gif" width="400px"></p>
  <hr>
  <p class="mb-0">Selam ! sorun bana ulaşmak üzere trene bindirildi. merak etme sıkıca kemerini bağlamışlardır.Görür Görmez Cevaplayacağım !!</p></div></br><a href=./index.php> >> ana sayfaya dön << </a></div>';
    }else{echo "bir problem oldu sanırım";}

}
    }else{echo "Sorularından memnun değildim bu nedenle seni engelledim. :' ";}
}
?>