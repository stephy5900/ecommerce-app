<?php
require_once("../includes/customer.php");
require_once("../includes/session.php");
require_once("../includes/functions.php");



//if($session->is_logged_in()) {
//	redirect_to("index.php");
//}

// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.

  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  
  // Check database to see if username/password exist.
	$found_user = Customer::authenticate($email, $password);
	
  if ($found_user) {
    $session->login($found_user);
		log_action('Login', "{$found_user->email} logged in.");
    redirect_to("index.php");
  } else {
    // username/password combo was not found in the database
    $message = "email/password combination incorrect.";
  }
  
} else { // Form has not been submitted.
  $email = "";
  $password = "";
}


	$firstname = '';
	$lastname = '';
	$email = '';
	$password = '';


if (isset($_POST['register'])){

	$firstname = '';
	$lastname = '';
	$email = '';
	$password = '';


	$new_customer->firstname = $_POST['firstname'];
	$new_customer->lastname= $_POST['lastname'];
	$new_customer->email = $_POST['email'];
	$new_customer->password = $_POST['password'];


	  $new_customer-> save();

	  redirect_to('photo.php');

}

?>

<?php include_layout_template('header.php'); ?>
		<div class="jumbotron row" id="banner">
			<h1>Sign In/Register</h1>
		</div>



				<section class="page-section row" id="shop">
		<div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-1">
				<form method="post" action="C_login.php">
				<h2>Sign In</h2>
						<div class = "row">
							<div class="col-xs-12 form-group">
								<input type="email" name="email" value="<?php echo htmlentities($email); ?>" placeholder="email" class="form-control" >
								<label for="email">Email</label>
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


		<div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-2">
		<form  method="post" action="">
			<h2>Register a New Account</h2>
				<div class="row">
				<div class="col-xs-12 form-group">
					<input name="firstname" type="text" class="form-control" placeholder="First Name *" value="<?php echo htmlentities($firstname); ?>">
					<label for="firstname">First Name</label>
				</div>
				<div class="col-xs-12 form-group">
					<input name="lastname" type="text" class="form-control" placeholder="Last Name *" value="<?php echo htmlentities($lastname); ?>">
					<label for="lastname">Last Name</label>
				</div>
				<div class="col-xs-12 form-group">
					<input id="signup[email]" type="text" name="email" class="form-control" placeholder="Email *" value="<?php echo htmlentities($email); ?>">
					<label for="signup[email]">Email</label>
				</div>
				<div class="col-xs-12 form-group">
					<input name="password" type="password" class="form-control" placeholder="Password *" value="<?php echo htmlentities($password); ?>">
					<label for="password">Password</label>
				</div>
				<div class="col-xs-12 form-group">
					<input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password *" >
					<label for="password_confirmation">Confirm Password</label>
				</div>	
			</div>
			<!--<input type="checkbox" name="accepts_marketing" id="accepts_marketing" checked=""> Recieve promotional emails<br><br> -->
			<div>
			<input type="submit" name="register" value="register" class="btn btn-primary pull-right">
			</div>
		</form>
	</div>

	<div aria-hidden="true" aria-labelledby="productModal" class="modal fade" id="product-quick-view" role="dialog" tabindex="-1">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
					</div>
					<div class="modal-body">
						<div class="text-center">
							<i class="fa fa-refresh fa-spin"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer id="page-footer">
		<div class="container">
			<div class="footer-contact text-center row">
				<div class="col-xs-12 col-sm-4 col-lg-2 col-lg-offset-3">
					<a href="https://boxie.lemonstand.com/shop#"><i class="fa fa-envelope-o"></i>info@boxie.com</a>
				</div>
				<div class="col-xs-12 col-sm-4 col-lg-2">
					<a href="https://boxie.lemonstand.com/shop#"><i class="fa fa-phone"></i>555.555.5555</a>
				</div>
				<div class="social-buttons col-xs-12 col-sm-4 col-lg-2">
					<a class="facebook" href="http://facebook.com/lemonstand"><i class="fa fa-facebook"></i></a> <a class="twitter" href="http://twitter.com/LemonStand"><i class="fa fa-twitter"></i></a> <a class="gplus" href="http://google.com/"><i class="fa fa-google-plus"></i></a>
				</div>
			</div>
			<div class="footer-info wrap row">
				<div class="col-sm-8">
					<ul class="list-unstyled">
						<li>© BOXIE! 2014</li>
						<li>
							<a href="https://boxie.lemonstand.com/shop">Shop</a>
						</li>
						<li>
							<a href="https://boxie.lemonstand.com/contact">Contact</a>
						</li>
						<li>
							<a href="https://boxie.lemonstand.com/terms">Terms &amp; Conditions</a>
						</li>
					</ul>
				</div>
				<div class="col-sm-4">
					<p class="credit">Powered by <a href="http://www.lemonstand.com/">LemonStand</a></p>
				</div>
			</div>
		</div>
	</footer>
	<script src="js/plugins.min.js">
	</script> 
	<script src="js/main.min.js">
	</script> 
	<script src="js/jquery.raty.min.js" type="text/javascript">
	</script>
</body>
</html>