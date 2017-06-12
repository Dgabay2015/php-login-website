<?php 
  require_once 'index.php';
  if ($connection->connect_error) die($connection->connect_error);

  if (isset($_SERVER['PHP_AUTH_USER']) &&
      isset($_SERVER['PHP_AUTH_PW']))
  {
    $un_temp = mysql_entities_fix_string($connection, $user);
    $pw_temp = mysql_entities_fix_string($connection, $pass);

    $query  = "SELECT * FROM users WHERE userid='$un_temp'";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    elseif ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

		$result->close();

        $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");

        if ($token == $row[1]) {
			echo "Welcome! $row[0] : 
        	Hi $row[0], you have succesfully logged in as '$row[0]'
			";
			
				$_SESSION['user'] = $user;
				$_SESSION['pass'] = $pass;
			
				
				        die("<meta http-equiv='refresh' content='1; url=http://lamp.cse.fau.edu/~dgabay2015/p7/php/redirect.php' />
						</br>You are now logged in. Please <a href='index.php?view=$user'>" .
            "click here</a> to continue.<br><br>");
				
		}
			
        else die("Invalid username/password combination");
    }
    else die("Invalid username/password combination");
  }
  else
  {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
  }

  $connection->close();


  function mysql_entities_fix_string($connection, $string)
  {
    return htmlentities(mysql_fix_string($connection, $string));
  }	

  function mysql_fix_string($connection, $string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }
?>
