<?php
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
?>
<!DOCTYPE HTML>
<html lang="en">
<link rel="stylesheet" type="text/css" href="assets/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<meta name="description" content="a search engine">
<title><?=$title?></title>

<div class='wrapper'>
<h1><?=$title?></h1>

<div class='box search-container'>
<form action="?">
      <input type="text" placeholder="Search.." name="q" value="<?php if (isset($_GET['q'])) {echo htmlspecialchars($_GET['q']); } ?>" onfocus="this.select()" autofocus>
      <button type="submit"><i class="icon-search"></i></button>
    </form>
</div>
<?php
global $url;

if (isset($_GET['q']) && preg_replace('/\s+/', '', $_GET['q']) != '') {
	$query = array('q' => $_GET['q']);

	$postdata = json_encode($query);

	$opts = array('http' =>
		array(
			'method'  => 'POST',
			'header'  => 'Content-type: application/json',
			'content' => $postdata
		)
	);

	$context = stream_context_create($opts);

	$data = file_get_contents($url,false,$context);

	if ($data === false) {
		echo '<div class="box">ut oh we could not contact the search server</div></div>';
		exit();
	}

	$results = json_decode($data);

	$leastres = false;
	foreach ($results->hits as $row) {
		$leastres = true;
?>
<div class='box'>
<?php
		handleItem($row);
?>
</div>
<?php

	}
	if (!$leastres)
		echo '<div class="box">No results.</div>';
}
?>
</div>

