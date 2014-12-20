<?php

require('config.php');
require('HttpPost.class.php');

/**
 * the OAuth server should have brought us to this page with a $_GET['code']
 */
 
 
if(isset($_GET['code'])) {
    // try to get an access token
    $code = $_GET['code'];
    $token_url = 'https://account.lab.fi-ware.org/oauth2/token';
    // this will be our POST data to send back to the OAuth server in exchange
	// for an access token
    $params = array(
        "client_id" => $oauth2_client_id,
        "client_secret" => $oauth2_secret,
        "grant_type" => "authorization_code",
        "code" => $code,
        "redirect_uri" => $oauth2_redirect            
    );
 
	// build a new HTTP POST request
    $request = new HttpPost($token_url);
    $request->setPostData($params);
    $request->send();

	// decode the incoming string as JSON
    $responseObj = json_decode($request->getHttpResponse());

    // construct url for user information
    $user_url = 'https://account.lab.fi-ware.org/user?access_token=' . $responseObj->access_token ;

    $ch = curl_init($user_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $user_info = curl_exec($ch);

    $userObj = json_decode($user_info);

    curl_close($ch);

}

?>

<!DOCTYPE html>
<html> 
<body>

<head>
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<div>
    <?php
    echo " Id : $userObj->id";
    echo '<br/>';
    echo "Name : $userObj->displayName";
    echo '<br/>';
    echo "Email : $userObj->email";
    ?>
</div>


</body>
</html>