<?php
$url = 'http://itunes.apple.com/search?';
$search = 'term=Katy+Perry';
$page = file_get_contents($url . $search);
echo $page;
?>
