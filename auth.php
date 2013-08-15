<?
	$action = $_REQUEST['action']; // We dont need action for this tutorial, but in a complex code you need a way to determine ajax action nature
    $formData = json_decode($_REQUEST['formData']); // Decode JSON object into readable PHP object

    $username = $formData->{'username'}; // Get username from object
    $password = $formData->{'password'}; // Get password from object

    
	// $username=$_POST['username'];
	// $password=$_POST['password'];
	
	echo $username, $password;
	echo "...";
	exit;
?>