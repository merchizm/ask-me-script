<script>
  $(document).ready(function() {
  	getthemedata('<?php echo $tema; ?>');
  });


  function getthemedata(id){
  $.get('./process.php?do=getthemedata&tema=' + id + '', function(data){
    var obj = JSON.parse(data);
    document.getElementById('tadi').innerHTML = obj.temaadi;
    document.getElementById('ypyp').innerHTML = '<a href=' + obj.ysitesi + '>' + obj.yapimci + '</a>';
    document.getElementById('tresim').innerHTML = '<a href=./process.php?do=imgoster&resim='+ obj.temaresim + '><img class="rounded" width="300" height="200" src="./process.php?do=imgoster&resim='+ obj.temaresim + '" alt="Tema resmi">';
     $('#temaayar').load('./themesettings/'+ obj.temaadi +'.php');
  });}
</script>
<div class="row no-gutters">
  <div class="col-12 col-sm-6 col-md-8"><h3>Tema Bilgisi</h3>
-Tema Adı: <div id="tadi"></div></br>
-Yapımcı Sitesi & Yapımcı: <div id="ypyp"></div></div>	
  <div class="col-6 col-md-4"><h3>Tema Önizlemesi</h3><div id="tresim"></div></div></div>

</br>
<h3>Tema Ayarları</h3>
<h5>Tema Seçiniz</h5>
<?php
$temalar = $db->query("SELECT * FROM temalar");
    $temalar = $temalar->rowCount(); 
  if($temalar == 0){
  echo ' <div class="bg-danger">Bir Hata Var Ama ne ?</div>';
  }else{
  $query = $db->query("SELECT * FROM temalar", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
        foreach( $query as $row ){
      ?>
      <label class="custom-control custom-radio"><input id="radio<?php echo $row['id']; ?>" name="radio" type="radio" onclick="getthemedata('<?php echo $row['themename']; ?>')" class="custom-control-input"<?php if($themeid == $row['id']){ echo "checked";} ?>><span class="custom-control-indicator"></span><span class="custom-control-description"><?php echo $row['themename']; ?></span></label>
<?php
  }}}
?>
<br><h5>Tema Bölgelerini Düzenleme</h5>
<div id="temaayar"></div>