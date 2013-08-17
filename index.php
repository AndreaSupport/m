<?
	session_start();
?>
<!DOCTYPE html> 
<html> 
    <head> 
    <title>AB Consulting Group - 02768260362</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="/_G/m/jquery/jquery.mobile-1.3.2.min.css" type="text/css" />
    <script type="text/javascript" src="/_G/m/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/_G/m/jquery/jquery.mobile-1.3.2.min.js"></script>
    <script src="/_G/m/lib.js"></script>
</head> 
<body> 
 
<div data-role="page" id="homepage">
 
    <div data-role="header">
        <h1>AB - Homepage</h1>
        <a href="#login" data-role="button" class="ui-btn-right">login</a>
    </div><!-- /header -->
 
    <div data-role="content">      
        <p>Questa e' l'homepage.</p>
        <?
        echo "u: " . $_SESSION['u'];
		echo "p: " . $_SESSION['p'];
		?>        
    </div><!-- /content -->
 
    <div data-role="footer">
        <h4>footer - footer - footer</h4>
    </div><!-- /footer -->
    
</div><!-- /page -->

<div data-role="page" id="login">

   	<div data-role="header">
    	<a href="#homepage" data-role="button">indietro</a>
    	<h1>AB - User Login</h1>
	</div>
    
   	
    <div data-role="content" data-inset="true">
    	<h3>Autenticazione operatore</h3>
        <form id="form-login">
       		<fieldset>
                <div data-role="fieldcontain">
        			<label for="username">Username:</label>
        			<input type="text" name="username" id="username" value="" placeholder="Username" />
        		</div>
                <div data-role="fieldcontain">
                    <label for="password">Password:</label>
        			<input type="password" name="password" id="password" value="" />
                </div>
                 &nbsp;
        		<input type="submit" id="submit" value="login" />
         	</fieldset>
	</form>
	</div>
    
   	<div data-role="footer">
        <h4>footer - footer - footer</h4>
    </div><!-- /footer -->
    
</div> 

<div data-role="page" id="menu">

   	<div data-role="header">
    	<a href="#homepage" data-role="button">homepage</a>
    	<h1>AB - User Login</h1>
	</div>
    
   	<div data-role="content">
   		<h3>Autenticazione operatore:</h3>
        <?
        echo "u: " . $_SESSION['u'];
		echo "p: " . $_SESSION['p'];
		?>        
	</div>
    
   	<div data-role="footer">
        <h4>footer - footer - footer</h4>
    </div><!-- /footer -->
    
</div> 

 
</body>
</html>