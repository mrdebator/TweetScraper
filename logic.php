<?php

require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "33093650-lMlbx8bcuRLVkj5pMEiq8DBJowq2k3M8gDm7JdHKX",
    'oauth_access_token_secret' => "ZsFfmHcZBMVSmS1r8lB5F1YVhbIKRNRmWiwECN8ars",
    'consumer_key' => "5sk7dKsZGWfSycMZhRN8F93SW",
    'consumer_secret' => "CIKf9lN29zhnw6U6dc0GWtiWaaBYSwmBrcgHpUtCdqabRoAqql"
);
$keyword = $_POST['keyword'];
$keyword = str_replace(' ', '+', $keyword);
$requestMethod = "GET";
$url = "https://api.twitter.com/1.1/search/tweets.json";
$getfield = "?q=".$keyword;
if (isset($_GET['user']))  {$user = preg_replace("/[^A-Za-z0-9_]/", '', $_GET['user']);}  else {$user  = "iagdotme";};
if (isset($_GET['count']) && is_numeric($_GET['count'])) {
    $count = $_GET['count'];
    } else {
        $count = 20;
    }

$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc = TRUE);

$string = $string['statuses'];

if(array_key_exists("errors", $string)) {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
?>
