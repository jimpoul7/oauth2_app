<?
// index.php

require_once('config.php');

$oauth2_server_url = 'https://account.lab.fi-ware.org/oauth2/authorize';

$query_params = array(
           'response_type' => 'code',
           'client_id' => $oauth2_client_id,
           'state' => 'xyz',
           'redirect_uri' => $oauth2_redirect,
           );

$forward_url = $oauth2_server_url . '?' . http_build_query($query_params);

header('Location: ' . $forward_url);

?>