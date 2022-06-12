<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?=$sdescription?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title><?=$baslik?></title>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?=$baslik?> | Bana Sor, Öner, İtiraf et, Eleştir !">
    <meta name="msapplication-TileColor" content="#3372DF">
    <link rel="shortcut icon" href="<?=$favicon?>">
    <link rel="canonical" href="<?=PATH?>">
	<link rel="stylesheet" href="<?=$temadizin?>bootstrap.min.css">
	<script src="https://use.fontawesome.com/0fe798476a.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-red.min.css" />
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=$temadizin?>styles.css">
  </head>
  <body>
  <script>
$(document).ready(function(){
 vericek("hepsi");
});

function vericek(islem){
	$.get('./process.php?do=cek&neyi=' + islem, function(data){
    document.getElementById(islem).innerHTML=data});
}
</script>
    <div class="demo-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
      <header class="demo-header mdl-layout__header mdl-layout__header--scroll mdl-color--grey-100 mdl-color-text--grey-800">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title"><?=$baslik?></span>
          <div class="mdl-layout-spacer"></div>
        </div>
      </header>
      <div class="ribbon"></div>
      <main class="demo-main mdl-layout__content">		  
		  <div class="profil mdl-shadow--4dp">
		  <div style="position: relative;top: 20px;margin: auto;width: 130px;height: 140px;"><center>
		  <img src="<?=$profilepicture?>" width="120px" style="-moz-border-radius: 60px;-webkit-border-radius: 60px;border-radius: 60px;"><br><br>
		  <span class="profilyazi"><?=$kullisim?></span>
		  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SoruSor">Sor</button>
<center></div></div>
          <div class="icerik mdl-shadow--4dp">