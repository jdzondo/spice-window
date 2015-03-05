<?php
$rss = new DOMDocument();
$rss->load('http://www.bing.com/HPImageArchive.aspx?format=rss&idx=0&n=1&mkt=en-US');

$feed = array();
foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	$limit = 1;
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = $feed[$x]['desc'];
		//echo '<img src=http://www.bing.com'.$link.'>';
		//$plugin_background = '<img src=http://www.bing.com'.$link.'>';
		//echo $plugin_background;
		$plugin_background = 'http://www.bing.com'.$link;
	}
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.tzineClock/jquery.tzineClock.js"></script>
<script type="text/javascript" src="script.js"></script>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link rel="stylesheet" type="text/css" href="jquery.tzineClock/jquery.tzineClock.css" />
    <style type="text/css">
      html { 
  		background: url(<?php echo $plugin_background; ?>) no-repeat center center fixed; 
  		-webkit-background-size: cover;
  		-moz-background-size: cover;
  		-o-background-size: cover;
  		background-size: cover;
		}
    </style>
  </head>
  <body>
  <div id="center">
  <div id="fancyClock" style="opacity: 1;"></div>
  <div id="greeting"></div>
  	<h2>Welcome 
  	</h2>
  </div>
  </body>
