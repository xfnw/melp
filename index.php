<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<!DOCTYPE HTML>
<html lang="en">
<link rel="stylesheet" type="text/css" href="assets/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<meta name="description" content="a search engine">
<title>melp</title>

<div class='wrapper'>
<h1>melp</h1>

<div class='box search-container'>
<form action="./">
      <input type="text" placeholder="Search.." name="q" value="<?php if (isset($_GET['q'])) {echo htmlspecialchars($_GET['q']); } ?>" autofocus>
      <button type="submit"><i class="icon-search"></i></button>
    </form>
</div>

<?php
require('config.php');

if (isset($_GET['q']) && preg_replace('/\s+/', '', $_GET['q']) != '') {

	$data = file_get_contents($url,false,$context);



	foreach ($results as $row) {
?>

<div class='box'>
<?php
		handleItem($row);
?>
</div>
<?php

	}
	if (!$results)
		echo '<div class="box">No results.</div>';

}
?>
</div>

