<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>AskMe | Yönetici Paneli</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
			<link rel="stylesheet" href="./minified/themes/default.min.css" id="theme-style" />
		<script src="./minified/sceditor.min.js"></script>
		<script src="./minified/icons/monocons.js"></script>
		<script src="./minified/formats/bbcode.js"></script>
    <style type="text/css">
    @import url("http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css");

html, body {
    height: 100%;
}
body {    
    padding-top: 75px;
}
body.navbar-more-show  {
  overflow: hidden;
}

.animate {
    -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.navbar {
    height: calc(100%);
  max-height: 300px;
  -webkit-transform: translate(0px, calc(-100% + 69px));
  transform: translate(0px, calc(-100% + 69px));
}
.navbar .container:not(.navbar-more) {
    padding: 0px;
}
.navbar-more-overlay {
  background-color: rgba(102, 102, 102, 0.55);
  display: none;
  height: 100%;
  left: 0px;
  position: fixed;
  top: 0px;
  width: 100%;
  z-index: 1029;
}
.navbar-more-show > .navbar-more-overlay {
  display: block;
}
.navbar-more-show > .navbar {
  -webkit-transform: translate(0px, 0px);
  transform: translate(0px, 0px);
}
.navbar-nav.mobile-bar {
  list-style: none;
  -ms-box-orient: horizontal;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -moz-flex;
  display: -webkit-flex;
  display: flex;
  -webkit-justify-content: space-around;
  justify-content: space-around;
  -webkit-flex-flow: row wrap;
  flex-flow: row wrap;
  -webkit-align-items: stretch;
  align-items: stretch;
  margin: 0px 0px;
}
.navbar-nav.mobile-bar > li {
  -webkit-flex-grow: 1;
  flex-grow: 1;
  text-align: center;
}
.navbar-nav.mobile-bar > li > a > span.menu-icon {
  display: block;
  font-size: 1.8em;
}
.navbar-more {
  background-color: rgb(255, 255, 255);
  height: calc(100% - 69px);
  overflow: auto;
}
.navbar-more .navbar-form {
  border-width: 0px;
}
.navbar-more .navbar-nav > li > a {
    color: rgb(64, 64, 64);   
}
.navbar-more > .navbar-nav > li > a > span.menu-icon {
  margin-left: 10px;
  margin-right: 10px;
}

@media (min-width: 768px) {
	
  .navbar {
        height: auto;
    -webkit-transform: translate(0px, 0px);
    transform: translate(0px, 0px);
  }
  .navbar-nav.mobile-bar {
    display: block;
    max-height: 64px;
    margin: 0px -15px;
  }
  .navbar-nav.mobile-bar > li > a > span.menu-icon {
    display: none;
  }
}
    </style>
</head>
<body>
      <div class="navbar-more-overlay"></div>
  <nav class="navbar navbar-inverse navbar-fixed-top animate">
    <div class="container navbar-more visible-xs">
      <ul class="nav navbar-nav">
        <li>
          <a href="?do=backups">
            <span class="menu-icon fa fa-server"></span>
            Yedekler
          </a>
        </li>
        <li>
            <a href="?do=themesettings">
                <span class="menu-icon fa fa-cog"></span>
                Tema Ayarları
          </a>
        </li>
      </ul>
    </div>
    <div class="container">
      <div class="navbar-header hidden-xs">
        <a class="navbar-brand" href="#">AskMe Yönetici Paneli</a>
      </div>

      <ul class="nav navbar-nav navbar-right mobile-bar">
        <li>
          <a href="?do=main">
            <span class="menu-icon fa fa-question"></span>
            Sorular
          </a>
        </li>
        <li>
          <a href="?do=ipban">
            <span class="menu-icon fa fa-ban"></span>
            <span class="hidden-xs">IP Ban</span>
            <span class="visible-xs">IP Ban</span>
          </a>
        </li>
          <li class="hidden-xs">
          <a href="?do=themesettings">
            <span class="menu-icon fa fa-cog"></span>
              Tema Ayarları
          </a>
        </li>
        <li class="hidden-xs">
          <a href="?do=backup">
            <span class="menu-icon fa fa-server"></span>
            Yedekler
          </a>
        </li>
        <li>
          <a href="./process.php?do=logout">
            <span class="menu-icon fa fa-sign-out"></span>           
            <span class="hidden-xs">Çıkış Yap</span>
            <span class="visible-xs">Çıkış Yap</span>
          </a>
        </li>
        <li class="visible-xs">
          <a href="#navbar-more-show">
            <span class="menu-icon fa fa-bars"></span>
            Fazlası
          </a>
        </li>
      </ul>
    </div>
  </nav>
<div class="container">