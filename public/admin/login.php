<?php
require_once("../../includes/initialize.php");

//if($session->is_logged_in()) {
 //	redirect_to("index.php");
//}

// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  
  // Check database to see if username/password exist.
	$found_user = User::authenticate($username, $password);
	
  if ($found_user) {
    $session->login($found_user);
		log_action('Login', "{$found_user->username} logged in.");
    redirect_to("index.php");
  } else {
    // username/password combo was not found in the database
    $message = "Username/password combination incorrect.";
  }
  
} else { // Form has not been submitted.
  $username = "";
  $password = "";
}

?>


<?php include_layout_template('admin_header.php'); ?>

		<h2>Staff Login</h2>
		<?php echo output_message($message); ?>




				<section class="page-section row" id="shop">
		<div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-1">
				<form method="post" action="login.php">
						<div class = "row">
							<div class="col-xs-12 form-group">
								<input type="text" name="username" value="<?php echo htmlentities($username); ?>" placeholder="Username" class="form-control" >
								<label for="username">Username</label>
							</div>
							<div class="col-xs-12 form-group">
								<input type="password" name="password" value="<?php echo htmlentities($password); ?>" placeholder="Password" class="form-control" id="password">
								<label for="password">Password</label>
							</div>
						</div>
						<a class="btn btn-default forget-link pull-left" href="//boxie.lemonstand.com/password-restore">forgot your password?</a>
						<!--<button class="btn btn-primary pull-right" type="submit">Log In <i class="fa fa-lock"></i></button> -->
						<input type="submit" name="submit" value="login" class="btn btn-primary pull-right">

				</form>

		</div>

		<?php include_layout_template('footer.php'); ?>


