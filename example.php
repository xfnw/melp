<?php

$url = "http://feesh:7700/indexes/movies/search";

$title = 'movie search';

function handleItem($row) {
	echo "<img src='$row->poster' height='150px' width='100px'>";
	echo "<h2>$row->title</h2>";
	echo $row->overview;
	echo '<div class=clear></div>';
}


require('melp.php');




