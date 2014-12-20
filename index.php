<?php

require_once('config.php');

$oauth2_server_url = 'https://account.lab.fi-ware.org/oauth2/authorize';

$query_params = array(
           'response_type' => 'code',
           'client_id' => $oauth2_client_id,
           'state' => 'xyz',
           'redirect_uri' => $oauth2_redirect,
           );

$forward_url = $oauth2_server_url . '?' . http_build_query($query_params);

?>

<!DOCTYPE html>
<html> 
<body>

<head>
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="index.css">
</head>

<div>
	<input type="button" value="Log in" onclick="fi_login()" class="action-button animate red">
</div>

<script>
	function fi_login(){
		location.replace("<?php echo $forward_url; ?>");
	}
</script>	

</body>
</html>