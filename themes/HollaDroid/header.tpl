<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?=$sdescription?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$baslik?></title>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#42a5f5">
    <meta name="apple-mobile-web-app-title" content="<?=$baslik?> | Bana Sor, Öner, İtiraf et, Eleştir !">
    <meta name="msapplication-TileColor" content="#42a5f5">
    <link rel="shortcut icon" href="<?=$favicon?>">
    <link rel="canonical" href="<?=PATH?>">
    <script src="https://use.fontawesome.com/0fe798476a.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=$temadizin?>holladroid_sablont.css">
    <link rel="stylesheet" href="<?=$temadizin?>bootstrap.min.css">
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
<style>
section{float:left;width:100%;padding:30px 0; position:relative; overflow:hidden; background:#6F8D8A;}
section:before{content:"";position:absolute; width:110%; height:100%;  background:url("https://static.pexels.com/photos/247599/pexels-photo-247599.jpeg") no-repeat 0 0; background-size:cover; filter: blur(10px); z-index:0; transform: scale(2);-ms-transform: scale(2); -webkit-transform: scale(2);}
h3{margin-bottom:20px; font-weight:bold; color:#fff; text-shadow:1px 1px 0 rgba(0,0,0,0.2);}
.btn-default{background:#DFC717; color:#fff; font-weight:700; text-shadow:1px 1px 0 rgba(0,0,0,0.2); font-size:14px;}
.card{box-shadow:2px 2px 20px rgba(0,0,0,0.3); border:none; margin-bottom:30px;}
.card-01 .card-body{position:relative; padding-top:40px;}
.card-01 .badge-box{position:absolute; top:-20px; left:50%; width:100px; height:100px;margin-left:-50px; text-align:center;}
.card-01 .badge-box i{background:#DFC717; color:#fff; border-radius:50%;  width:50px; height:50px; line-height:50px; text-align:center; font-size:20px;}
.card-01.height-fix{height:455px; overflow:hidden;}
.card-01.height-fix .card-img-top{width:auto!imporat;}

.profile-box{float:left; width:100%; text-align:center; padding:30px 0; position:relative; overflow:hidden;}
.profile-box:before{background:url("<?=$bgimage?>");background-repeat: no-repeat; background-attachment: fixed; background-position: bottom; width:120%; position:absolute; content:""; height:120%; left:-10%;top:0;z-index:0;}
.profile-box img{width:170px; height:170px; position:relative; border:5px solid #fff;}
.video-foreground{float:left;width:100%; height:500px;}

.card-01.height-fix .card-img-overlay{top:unset; color:#fff;
    background: -moz-linear-gradient(top, rgba(26,96,111,0) 0%, rgba(26,96,111,0) 1%, rgba(24,87,104,0.91) 31%, rgba(21,65,89,0.91) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(26,96,111,0) 0%,rgba(26,96,111,0) 1%,rgba(24,87,104,0.91) 31%,rgba(21,65,89,0.91) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(26,96,111,0) 0%,rgba(26,96,111,0) 1%,rgba(24,87,104,0.91) 31%,rgba(21,65,89,0.91) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#001a606f', endColorstr='#e8154159',GradientType=0 );
}
.card-01.height-fix .fa{color: #fff;font-size: 22px;margin-right: 18px;};

.title{
    font-size: 20px;
}	
.summary{
    font-size: 20px;
}	
@media only screen and (max-width: 768px) {
.title{
    font-size: 17px;
}	
.summary{
    font-size: 14px;
}
}

@media only screen and (max-width: 320px) {
.title{
    font-size: 17px;
}	
.summary{
    font-size: 14px;
}	
}
</style>

<div style="color: #fff; background-color: #42a5f5; min-height: 500px; padding: 24px;">
 <header class="s24-bar s24-bar--visual-brand-focus text-color-white bg-color-black p-a">
    <div class="s24-bar__brand text-xs-center">
      <div>
        <a href="<?=PATH?>"><?=$baslik?></a>
      </div>
    </div>
 <!--   <div class="s24-bar__collapse" id="collapse-4">
      <nav role="navigation">
        <ul class="s24-list s24-list--visual-collapsible">
        </ul>
      </nav>
    </div> -->
    <div class="s24-bar__utilities">
      <ul class="s24-list">
        <li class="s24-list__item"><a class="s24-link s24-link--effect-alpha" href="<?=$facebooklnk?>" role="button"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li class="s24-list__item"><a class="s24-link s24-link--effect-alpha" href="<?=$twitterlnk?>" role="button"><i class="fa fa-twitter fa-fw"></i></a></li>
      </ul>
    </div>
   <!-- <div class="s24-bar__toggle">
      <a class="s24-js-toggle s24-link s24-link--effect-alpha" href="#" data-target="#collapse-4"><i class="fa fa-bars fa-fw"></i></a>
    </div> -->

  </header>

  <div class="card card-01">
          <div class="profile-box">
              <img class="card-img-top rounded-circle" src="<?=$profilepicture?>" alt="Kullanıcı Fotoğrafı">
          </div>
          <div class="card-body">
            <span class="badge-box"><button onclick="fixhf()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#SoruSor">Sor</button></span>
            <center><font color="#000"><h4 class="card-title"><?=$kullisim?></h4>
              <hr>
            <p class="card-text"><?=$bio?></p></font></center>
          <hr>