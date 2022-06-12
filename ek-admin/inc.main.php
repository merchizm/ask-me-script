<div class="container">
<table class="table table-hover"><thead><tr><th>#</th><th>Soru</th><th>İşlemler</th></tr></thead><tbody>
  <?php
  function kisalt($kelime, $str = 10){
		if (strlen($kelime) > $str)
		{
			if (function_exists("mb_substr")) $kelime = mb_substr($kelime, 0, $str, "UTF-8").'....';
			else $kelime = substr($kelime, 0, $str).'....';
		}
		return $kelime;
	}
	
  	$sorular = $db->query("SELECT * FROM csorular");
    $sorular = $sorular->rowCount(); 
	if($sorular == 0){
	echo ' <td class="bg-danger" colspan="3">Üzgünüm hiç onay bekleyen soru yok.</td>';
	}else{
  $query = $db->query("SELECT * FROM csorular", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
        foreach( $query as $row ){
      print '<tr><th scope="row">'.$row['id'].'</th><td>'.kisalt($row['soruyazi'], 20).'</td>
      <td><div class="btn-group btn-group-xs">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#goster" data-whatever="'.$row['id'].'">Göster</button>
<a href="./process.php?do=yasakla&banip='.$row['soruip'].'" class="btn btn-warning">IP Yasakla</a>
<a href="./process.php?do=ssa&id='.$row['id'].'" class="btn btn-danger">Sil</a>
</div></td></tr>';
	}}}
  ?>
</tbody></table>
</div>
<div class="modal fade" id="goster" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GG</h5>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" id="soru" class="col-form-label">Soru:</label>
      </div>
          <form name="scvp" action="./process.php?do=cevapla" method="post">
          <div class="form-group">
            <INPUT type="hidden" name="soruid" id="soruid" value="0"></INPUT>
            <INPUT type="hidden" name="soru" id="soruu"></INPUT>
            <INPUT type="hidden" name="katagori" id="katagori"></INPUT>
            <label for="message-text" class="col-form-label">Cevap:</label>
            <textarea name="cevap" id="message-text" rows="10"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group">
        <button type="submit" class="btn btn-primary">Cevapla</button></a>
        </form>
        <a id="dltlnk" href="<3"  type="button" class="btn btn-danger">Sil</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
			var textarea = document.getElementById('message-text');
			sceditor.create(textarea, {
				format: 'xhtml',
				icons: 'monocons',
				style: './minified/themes/content/default.min.css'
			});



</script>
<script type="text/javascript">
function soruyucek(id){
  $.get('./process.php?do=soruyucek&id=' + id + '&cek=soru', function(data){
    document.getElementById("soru").innerHTML='Soru:' + data
});}
  function soruyucek2(id){
  $.get('./process.php?do=soruyucek&id=' + id + '&cek=soru', function(data){
    document.scvp.soru.value = data;
});}
  function soridc(id){
  $.get('./process.php?do=soruyucek&id=' + id + '&cek=soruid', function(data){
    document.scvp.soruid.value = data;
});}
  function katagori(id){
  $.get('./process.php?do=soruyucek&id=' + id + '&cek=sorukat', function(data){
    document.scvp.katagori.value = data;
});
}
  $('#goster').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var idsi = button.data('whatever')
  var modal = $(this)
  soruyucek(idsi);
  soruyucek2(idsi);
  katagori(idsi);
  soridc(idsi);
  var link = document.getElementById("dltlnk");
  link.setAttribute('href', './process.php?do=ssa&id=' + idsi);
  modal.find('.modal-title').text('#'+idsi + ' Soru')
})
</script>