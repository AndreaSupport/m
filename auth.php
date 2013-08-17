<?
	session_start();
	if ($_POST['action']=="login") {
		$results = $_POST['formData'];
		$perfs = explode("&", $results);
		foreach($perfs as $perf) {
    		$perf_key_values = explode("=", $perf);
    		$key = urldecode($perf_key_values[0]);
    		$values = urldecode($perf_key_values[1]);
			if ($key=="username") { $username=$values; }
			if ($key=="password") { $password=$values; }
		}
		$_SESSION['u']=$username;
		$_SESSION['p']=$password;	
	}
?>