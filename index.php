<?php
/* heroku stuff
 * Nate Foss <fossn@students.wwu.edu>
 *
 * do sum stuff...
 */

// user form
?>
<html>
<head><title>iTunes and stuff</title></head>
<body>
<form action="index.php" method="post" target="_self" enctype="multipart/form-data">
<table>
<tr><td colspan="2" align="center">Media search</td></tr>
<tr><td align="right">Name:</td><td align="left"><input type="text" name="name" size="20"></td></tr>
<tr><td align="right">Limit:</td><td align="left"><input type="text" name="limit" size="4"></td></tr>
<tr><td align="right">Attribute:</td><td align="left"><select name="attribute">
<option value="">(none)</option>
<option value="audiobook">Audio book</option>
<option value="ebook">eBook</option>
<option value="movie">Movie</option>
<option value="musicArtist">Music</option>
<option value="musicVideo">Music video</option>
<option value="podcast">Podcast</option>
<option value="shortFilm">Short film</option>
<option value="software">Software</option>
<option value="tvShow">TV show</option>
</td></tr>
<tr><td align="right">Country:</td><td align="left"><input type="text" name="country" size="2" maxlength="2"></td></tr>
<tr><td align="right" colspan="2"><input type="submit" name="submit" value="Submit"></td></tr>
</table>
</form>
<?php

// perform itunes search
$url = 'https://itunes.apple.com/search?';
$search = "";

if(!empty($_POST['name']))
    $search .= 'term=' . urlencode($_POST['name']);
if(!empty($_POST['limit']))
    $search .= '&limit=' . urlencode($_POST['limit']);
if(!empty($_POST['attribute']))
    $search .= '&entity=' . urlencode($_POST['attribute']);
if(!empty($_POST['country']))
    $search .= '&country=' . urlencode($_POST['country']);

$page = file_get_contents($url . $search);
$page = json_decode($page);

// display search results
foreach($page->results as $array) {
    echo 'Artist: ' . $array->artistName . "<br>";
    echo '&nbsp;&nbsp;Collection name: ' . $array->collectionName . "<br>";
    echo '&nbsp;&nbsp;&nbsp;&nbsp;Track name: ' . $array->trackName . "<br><br>";
}
?>
</body>
</html>
