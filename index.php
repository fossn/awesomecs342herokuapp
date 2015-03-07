<?php
/*
 * term
 * country
 * media
 * entity
 * attribute
 * callback
 * limit
 * lang
 * version
 * explicit
 *
 */
$url = 'http://itunes.apple.com/search?';
$search = 'term=Katy+Perry';
$page = file_get_contents($url . $search);
$page = json_decode($page);

$array = $page->results["0"];
$version = $array->version;
$artistname = $array->artistName;
$artistid = $array->artistId;

echo $version . "<br>";
echo $artistname . "<br>";
echo $artistid ."<br>";
?>
