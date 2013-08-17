<?
	session_start();
	
	define('DB_NAME', 'and17023_g');
	define('DB_USER', 'and17023_g');
	define('DB_PASSWORD', 'and17023_g');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');
	define('DEBUG',1);
	
	class m {
		
		function m() {
			
		} // END FUNCTION m
		
		function check() {
			// questa funziona controlla se l'utente è autenticato
			// in caso contrario viene rimandato al login
			if ($_SESSION['auth']==1) {
				// utente autenticato regolarmente
				return 1;
			} else {
				// utente non autenticato
				return 0;
			}
		}
		
		function footer() {
			echo "<h4>AB Consuting GROUP 2013</h4>";
		}
		
		function authop() {
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
				// $_SESSION['u']=$username;
				// $_SESSION['p']=$password;
				$db=new dbz;
				$sql="select * from operatori where email='$username' and password='$password';";
				$r=$db->exsql($sql);
				$nr=mysql_num_rows($r);
				if ($nr==1) {
					// utente autenticato regolarmente
					$_SESSION['auth']=1;
					$_SESSION['rs']=mysql_result($r,0,"ragionesociale");
					$_SESSION['email']=mysql_result($r,0,"email");
					$_SESSION['piva']=mysql_result($r,0,"piva");
				} else {
					session_unset();
				}
			}
		} // END FUNCTION authop
		
	} // END CLASS m
	
	class dbz {
		var $pid;
		
		function dbz() {
			$this->pid=NULL;
			$this->connectmysql();
		}
		
		function connectmysql() {
			if (!$this->pid) {
				$link=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
				if (!$link) {
					die('connessione al server SQL non riuscita; ERR: ' . mysql_error());
				}
				$linkdb=mysql_select_db(DB_NAME);
				if (!$linkdb) {
					die('connessione al DB ' . DB_NAME . ' non riuscita; ERR: ' . mysql_error());
				}
				$this->pid=$linkdb;
			}
		}
		
		function exsql($sql) {
			if (!$this->pid) {
				$this->connectmysql();
			}
			$result=mysql_query($sql);
			if (!$result) {
				echo "pid: " . $this->pid . "\n";
				die('query ' . $sql . ' non riuscita; ERR: ' . mysql_error());
			}
			return $result;
		}		
		
		function closedb() {
			mysql_close($this->pid);
		}
	
	} // END CLASS DBZ
?>