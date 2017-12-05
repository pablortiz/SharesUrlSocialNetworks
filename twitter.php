<?php
ini_set('display_errors', 0);
require_once('./libs/TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "936522195957960704-GI4kw81YWfeNFqJXjTlgXBFz7aKVk3j",
    'oauth_access_token_secret' => "u32RzOwgrAwYF5GEHWEu7BDPit2bVJ1Md6VlKiA595Mbq",
    'consumer_key' => "PWiU40YrPB0GtLAAr7mMhZ4le",
    'consumer_secret' => "WwduOigTTAztOc2hwFupSwNS0OxQzn9dfqvDmYGjwo4BNbgs0Q",
	'count'=> 5,
);

$total = 0;
$error="";

if ( isset ($_REQUEST["q"] ) )
{	
	$q = '?q='.$_REQUEST["q"].'&count=100';		
	do {
		$next = Search($q);
		sleep(.1);  
	}while ( strlen($next) > 0   );
	$ret =  strlen($error) ? $error: $total;
	echo $ret ;
}


function Search($getfield)
{		
	global $settings;
	global $total;
	global $error;	
	$next = "";		
	$url = 'https://api.twitter.com/1.1/search/tweets.json';
	$requestMethod = 'GET';
	$twitter = new TwitterAPIExchange($settings);
	$data = json_decode( $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(), true );	
	if ( isset($data['statuses']) ) $total += count($data['statuses']);	
	if (isset($data['search_metadata']['next_results'])) $next = $data['search_metadata']['next_results'];	
	if (isset($data['errors'][0]['message'] )) $error = $data['errors'][0]['message'];		
	//echo "<pre>",print_r($data);
	return $next;
}


?>
