<?php
require_once('TwitterAPIExchange.php');
require('abstract.databoundobject.php');
require('mapping.php');
require('pdofactory.php');

$settings = array(
    'oauth_access_token' => "983281999732461570-RuuS8ujot0BHew9ahcxFk73BMdGL0aP",
    'oauth_access_token_secret' => "WzTYAziE8pa3JZQFLVzSFH7ijvjCAJdp9RiA0gEeyIkDF",
    'consumer_key' => "cYUrVRIRDM8r2AZvLT4fHGNQe",
    'consumer_secret' => "G5hRh8eFIUvATriGRDq8fm5uySqEYTipFQQlHl7AW3K2RGlY6x"
);


$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=alex_esquiva&count=100';        
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$json =  $twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();

$jsons = json_decode($json);

//var_dump($json);

$user = $jsons[3];   

            $fecha = $user->created_at;
            $twit = $user->text;
            $imagen = $user->user->profile_image_url;
            $user = $user->user->screen_name;


print "Running...<br />";

        $strDSN = "pgsql:dbname=twitter;host=localhost;port=5432;user=postgres;password=";
        $objPDO = PDOFactory::GetPDO($strDSN, "twitter", "", 
            array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $objUser = new LogData($objPDO);


        $objUser->setdate($fecha)->seturl($imagen)->setimage($user)->settwit($twit)->Save();

    
       
        
        print "Saving...<br />";
        

        $id = $objUser->getID();
        
        
        unset($objUser);

?>