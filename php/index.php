<?php 
  require_once 'header.php';

  echo "<div class='main'>";
  $error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
/*     if ($user == "" || $pass == "")
        $error = "Not all fields were entered<br>";
    else
    {
      $result = queryMySQL("SELECT userid,password FROM users
        WHERE userid='$user' AND password='$pass'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        die("You are now logged in. Please <a href='members.php?view=$user'>" .
            "click here</a> to continue.<br><br>");
      }
    } */
  }
if (!$loggedin){
  echo <<<_END
  
  
    <div class="container">


  
<div class="container">

    <div class="row">

        <div class="col-sm-6 col-md-4 col-md-offset-4">

            <h1 class="text-center login-title">Sign in to continue to your image wall</h1>

            <div class="account-wall">

                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"

                    alt="">

                <form class="form-signin" method='post' action='auth.php'>$error
				<span class='fieldname'>Username</span>
				

                <input type="text" class="form-control" maxlength='16' name='user' value='$user' placeholder="Username" required autofocus>
				<br>
				<span class='fieldname'>Password</span>

                <input type="password" class="form-control" maxlength='16' name='pass' value='$pass' placeholder="Password" required>

                <button class="btn btn-lg btn-primary btn-block" type="submit">

                    Sign in</button>

                <label class="checkbox pull-left">

                    <input type="checkbox" value="remember-me">

                    Remember me

                </label>

                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>

                </form>

            </div>

            <a href="signup.php" class="text-center new-account">Create an account </a>

        </div>

    </div>

</div>
	  
    </div> <!-- /container -->
_END;
}
?>
  </body>
</html>
