<div class="container">
<form action="process.php?do=yasakla" method="post">
<input type="text" class="form-control" id="ban" name="banip" aria-describedby="bi" placeholder="IP Adresi">
    <small id="bi" class="form-text text-muted">Girdiğiniz IP Adresinin soru sorması yasaklanacak fakat soruları görüntüleyebilir.</small>
<button type="submit" class="btn btn-primary">BAN !</button>
</form></center>
<table class="table table-hover"><thead><tr><th>IP</th><th>İşlemler</th></tr></thead><tbody>
<?php
	$bannedip = $db->query("SELECT * FROM yasaklilar");
    $bannedip = $bannedip->rowCount(); 
	if($bannedip == 0){
	echo ' <td class="bg-info" colspan="3">Ooo Güzel Hiçç Rahatsız Edenin yok :)</td>';
	}else{
  $query = $db->query("SELECT * FROM yasaklilar", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
        foreach( $query as $row ){
      print '<tr><td>'.$row['id'].'</td><td>'.$row['ip'].'</td><td><a href="./process.php?do=unban&id='.$row['id'].'">banı kaldır</a></td></tr>';
	}}}
?>
</tbody></table></div>