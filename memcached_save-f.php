<?php
$vRevision = date("Y-m-d_H-i-s");
$fp = fopen('Memcached_'.$vRevision.'.txt', 'w');
$mem = new Memcached();
$mem->addServer("127.0.0.1", 11211);
fwrite($fp," Memcached -> search_24h \n--------------------------------------------- \n");
foreach ($mem->getAllKeys() as $s){
    fwrite($fp, $s." => ".$mem->get($s).";\n ");
}
fclose($fp);
header("Location: memcached_test.php");
?>
