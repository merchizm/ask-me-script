<?php
// database backup system
// https://github.com/vkt005/php-mysql-db-backup/blob/master/mysql_backup.php
ini_set('display_errors', '1');    // 0 or 1 set 1 if unable to download database it will show all possible errors
ini_set('max_execution_time', 0);  // setting 0 for no time limit
define('BACKUP_DIR', './backups/' );
if(isset($_GET['task'])&& $_GET['task']=='clear'){
    $file_name=$_GET['file'];
    $file=BACKUP_DIR.DIRECTORY_SEPARATOR.$file_name;
    if(file_exists($file)){ if(unlink($file)) $rmsg="<div class=\"alert alert-info\" role=\"alert\">$file_name adlı dosya silindi.</div>";}
    else { $rmsg="<div class=\"alert alert-info\" role=\"alert\"><b>$file_name </b> dosyası bulunamadı, zaten silinmiş olabilir.</div>";}
}

if(isset($_REQUEST['submit'])){
    $fileName = 'mysqlbackup--' . date('d-m-Y') . '@'.date('h.i.s').'.sql' ;
    if(function_exists('max_execution_time')) {
        if( ini_get('max_execution_time') > 0 ) 	set_time_limit(0) ;
    }

    if (!file_exists(BACKUP_DIR)) mkdir(BACKUP_DIR , 0700) ;
    if (!is_writable(BACKUP_DIR)) chmod(BACKUP_DIR , 0700) ;

    $content = 'Allow from all' ;
    $file = new SplFileObject(BACKUP_DIR . '/.htaccess', "w") ;
    $file->fwrite($content) ;

    $mysqli = new mysqli(HOST , USER , PASSWORD , DB_NAME) ;
    if (mysqli_connect_errno())
    {
        printf("Bağlantı hatası: %s", mysqli_connect_error());
        exit();
    }
    // Introduction information
    $return='';
    $return .= "--\n";
    $return .= "-- A Mysql Backup System \n";
    $return .= "--\n";
    $return .= '-- Export created: ' . date("Y/m/d") . ' on ' . date("h:i") . "\n\n\n";
    $return = "--\n";
    $return .= "-- Database : " . DB_NAME . "\n";
    $return .= "--\n";
    $return .= "-- --------------------------------------------------\n";
    $return .= "-- ---------------------------------------------------\n";
    $return .= 'SET AUTOCOMMIT = 0 ;' ."\n" ;
    $return .= 'SET FOREIGN_KEY_CHECKS=0 ;' ."\n" ;
    $tables = array() ;
// Exploring what tables this database has
    $result = $mysqli->query('SHOW TABLES' ) ;
// Cycle through "$result" and put content into an array
    while ($row = $result->fetch_row())
    {
        $tables[] = $row[0] ;
    }
// Cycle through each  table
    foreach($tables as $table)
    {
        // Get content of each table
        $result = $mysqli->query('SELECT * FROM '. $table) ;
        // Get number of fields (columns) of each table
        $num_fields = $mysqli->field_count  ;
        // Add table information
        $return .= "--\n" ;
        $return .= '-- Tabel structure for table `' . $table . '`' . "\n" ;
        $return .= "--\n" ;
        $return.= 'DROP TABLE  IF EXISTS `'.$table.'`;' . "\n" ;
        // Get the table-shema
        $shema = $mysqli->query('SHOW CREATE TABLE '.$table) ;
        // Extract table shema
        $tableshema = $shema->fetch_row() ;
        // Append table-shema into code
        $return.= $tableshema[1].";" . "\n\n" ;
        // Cycle through each table-row
        while($rowdata = $result->fetch_row())
        {
            // Prepare code that will insert data into table
            $return .= 'INSERT INTO `'.$table .'`  VALUES ( '  ;
            // Extract data of each row
            for($i=0; $i<$num_fields; $i++)
            {
                $return .= '"'.$mysqli->real_escape_string($rowdata[$i]) . "\"," ;
            }
            // Let's remove the last comma
            $return = substr("$return", 0, -1) ;
            $return .= ");" ."\n" ;
        }
        $return .= "\n\n" ;
    }
// Close the connection
    $mysqli->close() ;
    $return .= 'SET FOREIGN_KEY_CHECKS = 1 ; '  . "\n" ;
    $return .= 'COMMIT ; '  . "\n" ;
    $return .= 'SET AUTOCOMMIT = 1 ; ' . "\n"  ;
//$file = file_put_contents($fileName , $return) ;
    $zip = new ZipArchive() ;
    $resOpen = $zip->open(BACKUP_DIR . '/' .$fileName.".zip" , ZIPARCHIVE::CREATE) ;
    if( $resOpen ){
        $zip->addFromString( $fileName , "$return" ) ;
    }
    $zip->close() ;
    $fileSize = get_file_size_unit(filesize(BACKUP_DIR . "/". $fileName . '.zip')) ;
// Function to append proper Unit after file-size .
}

?>
        <div class="main">
            <?php echo isset($rmsg)?$rmsg:''; ?>
            <fieldset><legend><h2>Yedekleme İşlemi</h2></legend>
                <form name="backup" id="backup" method="post">
                    veritabanını yedekle tuşuna tıkladığınızda veriler yeni sql dosyasına aktarılır ardından arşivlenir ve aşağıdaki tabloda görünür. ayrıca farklı yedekler alabilir ve yedekleri yönetebilirsiniz.
                    <div style="text-align: center;margin-top: 15px"><input onclick="vky(this)" type="submit" id="getdb" name="submit"  class="btn btn-primary" value="Veritabanını Yedekle" /></div>
                    <div class="cls"></div>
                </form>
            </fieldset>
        </div>
        <script type="text/javascript">
            function vky(x){
                x.value='işlem devam ediyor.';
            }
        </script>
        <div class="backup_list">
            <div class=""></div>
            <?php echo display_download(BACKUP_DIR); ?>
    </div>
<?php
function get_file_size_unit($file_size){
    switch (true) {
        case ($file_size/1024 < 1) :
            return intval($file_size ) ." Bytes" ;
            break;
        case ($file_size/1024 >= 1 && $file_size/(1024*1024) < 1)  :
            return intval($file_size/1024) ." KB" ;
            break;
        default:
            return intval($file_size/(1024*1024)) ." MB" ;
    }
}
function display_download($BACKUP_DIR){
    $msg='';
    $msg.='<h2>Yedekler Tablosu</h2>
 <table class="table"><thead><tr><th>Dosya İsmi</th><th>Boyut</th><th>&nbsp;</th></tr> 
</thead><tbody>';
    $downloads=getDownloads($BACKUP_DIR);
    if(count($downloads)>0)
        foreach ($downloads as $k => $v) {
            $msg.= '<tr><td>'.$v['name'].'</td><td>'.$v['size'].'</td><td><div class="btn-group btn-group-xs">
        <a href="'.BACKUP_DIR . "/". $v['name'] .'" target="_blank" type="button" class="btn btn-success">Yedeği indir</a>
        <a  onclick="return confirm(\'Yedeği silmek istediğinize emin misiniz ? bu işlem geri alınamaz.\')" href="?do=backup&task=clear&file='.$v['name'].'" type="button"  class="btn btn-danger">Yedeği sil</a>
</div>
</td></tr>';
        }
    return $msg.='</tbody></table>';
}
function getDownloads($dir="./Backups"){
    if (is_dir($dir)){
        $dh  = opendir($dir);
        $files=array();
        $i=0;
        $xclude=array('.','..','.htaccess');
        while (false !== ($filename = readdir($dh))) {
            if(!in_array($filename, $xclude))
            {
                $files[$i]['name'] = $filename;
                $files[$i]['size'] = get_file_size_unit(filesize($dir.'/'.$filename));
                $i++;
            }
        }
        return $files;
    }}?>