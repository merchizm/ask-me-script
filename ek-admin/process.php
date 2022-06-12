<?php
$do = $_GET['do']; 
include("../config.php");

function ChangeTheme($id)
{
    global $db,$themeid ;
    $query = $db->prepare("UPDATE ayarlar SET
site_tema = :tid 
WHERE site_tema = :currenttid");
    $update = $query->execute(array(
        "tid" => $id,
        "currenttid" => $themeid
    ));
    if ( $update ){
        print "güncelleme başarılı!";
        header("Refresh: 1; url=index.php?do=themesettings");
    }
}

function showImage($name)
    {

         $types = [
             'gif'=> 'image/gif',
             'png'=> 'image/png',
             'jpeg'=> 'image/jpeg',
             'jpg'=> 'image/jpeg',
         ];
         foreach($types as $type=>$meta){
             if(file_exists('../images/'.$name  .'.'. $type)){
                 header('Content-type: ' . $meta);
                 readfile('../images/'.$name .'.'. $type);
                 return;
             }
         }
    }

if($do == "giris"){
	$gelensifre = md5($_POST["passwordx"]);
	if($gelensifre == $sifre){
		$_SESSION["XlXaG"] = "MRR";
		header("Refresh: 0; url=index.php");
	}else{
	header("Refresh: 12; url=index.php");
	echo "şifre yanlış girildi. {$gelensifre}";
	}
}else if($do == "logout"){
    session_destroy();
    echo "<center>Çıkış işlemi tamamlandı</center>";
	header("Refresh: 2; url=../index.php");
}else if($do == "cevapla"){
	if($_SESSION["XlXaG"] == "MRR"){
	$soruyazisi = $_POST["soru"];
	$st = $_POST["katagori"];
	if($st == "1"){$sorutipi="Soru";}else if($st == "2"){$sorutipi="Öneri";}else if($st=="3"){$sorutipi="İtiraf";}else if($st=="4"){$sorutipi="Eleştiri";}
	$cevap = $_POST["cevap"];
	$tarih = date('Y.m.d H:i:s');
	$query = $db->prepare("DELETE FROM csorular WHERE id = :id");
	$delete = $query->execute(array(
	'id' => $_POST["soruid"]
    ));
	$query = $db->prepare("INSERT INTO sorular SET
	title = ?,
	date = ?,
	answer = ?,
	catagory = ?");
    $insert = $query->execute(array(
     "{$soruyazisi}", "{$tarih}", "{$cevap}", "{$sorutipi}"
    ));
    if ( $insert ){
    $last_id = $db->lastInsertId();
	echo '<center>Soru Cevaplandı !<center>';
	header("Refresh: 2; url=index.php");
	}}
}else if($do == "yasakla"){
	if($_SESSION["XlXaG"] == "MRR"){
	    echo "Tutuklu Göz Altında !";
	    header("Refresh: 1; url=index.php");
		}else{echo "Sinirimi bozma bence ! yetkin yok.";}
}else if ($do == "ssa"){
    $id = $_GET['id'];
    $query = $db->prepare("DELETE FROM csorular WHERE id = :id");
    $delete = $query->execute(array(
   'id' => $id));
    echo 'Soru Silindi.';
    header("Refresh: 1; url=index.php");
}else if ($do == "unban"){
$fc=file("./banlist.txt");
$f=fopen("./banlist.txt","w+");
foreach($fc as $line)
{
  if (md5($line) != $_GET['ip']){
  	fputs($f,$line);
  	header("Refresh: 1; url=index.php");
	echo "Yasaklama Kaldırıldı.";
  }
}
fclose($f);
}else if($do == "soruyucek"){
	$cek = $_GET['cek'];
	if($cek == "soru"){
    
    $id = $_GET['id']; 
	$sorumuz = $db->query("SELECT * FROM csorular WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
	if ( $sorumuz ){
    print_r($sorumuz['soruyazi']);

	}}else if($cek == "soruid"){
    
    $id = $_GET['id']; 
	$sorumuz = $db->query("SELECT * FROM csorular WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
	if ( $sorumuz ){
    print_r($sorumuz['id']);
	
	}}else if($cek == "sorukat"){
	
	$id = $_GET['id']; 
	$sorumuz = $db->query("SELECT * FROM csorular WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
	if ( $sorumuz ){
    print_r($sorumuz['sorutipi']);
	
	}}

}else if($do == "getthemedata"){
$id = $_GET['tema'];	
$data = parse_ini_file("../themes/".$id."/".$id.".ini");
print_r(json_encode($data));	
}else if($do == "imgoster"){
showImage($_GET['resim']);
}else if($do == "rew"){
    
$type = $_GET['type'];
if($type == "holladroid"){
$fisim = $_POST['fisim'];
$fadress = $_POST['fadress'];
$facebooklnk = $_POST['facebooklnk'];
$twitterlnk = $_POST['twitterlnk'];
$bgimg = $_POST['bgimg'];
$bio = $_POST['bio'];
$pp = $_POST['pp'];
$query = $db->prepare("UPDATE temalar SET
settings = :json_data
WHERE themename = :tname");
    $update = $query->execute(array(
        "json_data" => "{\"fisim\":\"".$fisim."\", \"fadress\":\"".$fadress."\",\"bio\":\"".$bio."\", \"facebooklnk\":\"".$facebooklnk."\", \"twitterlnk\":\"".$twitterlnk."\", \"bgimg\":\"".$bgimg."\", \"pp\" : \"$pp\" }",
        "tname" => "holladroid"
    ));
    if ( $update ){
        ChangeTheme("2");
    }else{
        die("hata oluştu");
    }

}elseif($type == "andboo"){
$fisim = $_POST['fisim'];
$fadress = $_POST['fadress'];
$pp = $_POST['pp'];
    $query = $db->prepare("UPDATE temalar SET
settings = :json_data
WHERE themename = :tname");
    $update = $query->execute(array(
        "json_data" => "{\"fisim\" : \"".$fisim."\",  \"fadress\" : \"".$fadress."\", \"pp\" : \"$pp\"}",
        "tname" => "andboo"
    ));
    if ( $update ){
        ChangeTheme("1");
    }else{
        die("hata oluştu");
    }

}
}elseif($do == "gettd"){
    $id = $_GET['themeid'];
    $sorgu = $db->query("SELECT * FROM temalar WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
    if ($sorgu) {
        print_r($sorgu['settings']);
    }
}
else{echo "Ops yanış yerdesin dostum !";}

?>