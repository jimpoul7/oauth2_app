<html> 
<body>

<head>
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="button.css">
</head>

<div class="wrapper">
	<input type="button" value="Log in" onclick="fi_login()" class="action-button shadow animate red">
</div>

<script>
	function fi_login(){
		location.replace("https://account.lab.fi-ware.org/oauth2/authorize?response_type=code&client_id=1558&state=xyz&redirect_uri=http://130.206.127.174/main.php");
	}
</script>	

</body>
</html>