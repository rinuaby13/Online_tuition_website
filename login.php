<?php 
require_once ("include/initialize.php");   
if (isset($_SESSION['StudentID'])) {
  # code...
  redirect('index.php');
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo web_root; ?>css/login.css" rel="stylesheet"> 
</head>
<body>


<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="register.php" method="POST">
			<h1>Create Account</h1>
      <!--
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>-->
			<span>Use your email for registration</span>
			<input type="text" placeholder="Name" name="FNAME" required />
			<input type="email" placeholder="Email" name="USERNAME" required />
			<input type="password" placeholder="Password" name="PASS" required/>
			<button name="btnRegister">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" method="POST">
			<h1>Sign in</h1>
			
			<div class="social-container">
				<?php check_message(); ?>
				<!--
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			-->
			</div>
			<span>Use your account</span>
			<input type="email" placeholder="Email" name="user_email" required />
			<input type="password" placeholder="Password" name="user_pass" required />
			<!--<a href="#">Forgot your password?</a>-->
			<button name="btnLogin">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start learning with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		<a href="<?php echo web_root; ?>index1.php">Home.</a>
		<a href="<?php echo web_root; ?>admin/login.php">Login as Admin</a>
	</p>
</footer>
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/login.js"></script>





<?php 

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      redirect (web_root."login.php");
         
    } else {  
      //it creates a new objects of member
        $student = new Student();
        //make use of the static function, and we passed to parameters
        $res = $student::studentAuthentication($email, $h_upass);
        if ($res==true) {  
             redirect(web_root."index.php"); 

          echo $_SESSION['StudentID'];
        }else{
          message("Account does not exist! Please contact Administrator.", "error");
          redirect (web_root."login.php");
        }
   }
 } 
 ?> 
</body>
</html>