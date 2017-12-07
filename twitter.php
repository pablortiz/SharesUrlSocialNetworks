<?php
ini_set('display_errors', 0);
require_once('./libs/TwitterAPIExchange.php');
$settings = array(
    'oauth_access_token'=>"YOUR-ACCESS-TOKEN",
    'oauth_access_token_secret'=>"YOUR-ACCESS-TOKEN-SECRET",
    'consumer_key'=>"YOUR-CUNSUMER-KEY",
    'consumer_secret'=>"YOUR-CONSUMER-SECRET",
);

$total = 0;
$error="";

if ( isset ($_REQUEST["q"] ) )
{	
	$q = '?q='.$_REQUEST["q"].'&count=100';		
	do {
		$q = Search($q);
		sleep(.1);  
	}while ( strlen($q) > 0   );
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
