<?php
/**
* post_tweet.php
* Example of posting a tweet with OAuth
* Latest copy of this code: 
* http://140dev.com/twitter-api-programming-tutorials/hello-twitter-oauth-php/
* @author Adam Green <140dev@gmail.com>
* @license GNU Public License
*/

$tweet_text = 'Testing Twitter API';
print "Posting...\n";
$result = post_tweet($tweet_text);
print "Response code: " . $result . "\n";

function post_tweet($tweet_text) {

  // Use Matt Harris' OAuth library to make the connection
  // This lives at: https://github.com/themattharris/tmhOAuth
  require_once('tmhoauth/tmhOAuth.php');
      
  // Set the authorization values
  // In keeping with the OAuth tradition of maximum confusion, 
  // the names of some of these values are different from the Twitter Dev interface
  // user_token is called Access Token on the Dev site
  // user_secret is called Access Token Secret on the Dev site
  // The values here have asterisks to hide the true contents 
  // You need to use the actual values from your Twitter app
  $connection = new tmhOAuth(array(
    'consumer_key' => 'OJDA9u7Io3WrfS6rVMZOg',
    'consumer_secret' => 'UYl7SVE8TswWNMuopyksMW2dGITiejFIrRdVzBBc9c',
    'user_token' => '141946076-w9Kz8q52YyU7928m98NwLxbDx9wpFQd2ZXtaWDdi',
    'user_secret' => 'bBGqdrChoXvUlX0ihI9aIAax4rhBF04C69gSky6n7E',
  )); 
  
  // Make the API call
  $connection->request('POST', 
    $connection->url('1/statuses/update'), 
    array('status' => $tweet_text));
  
  return $connection->response['code'];
}
?>