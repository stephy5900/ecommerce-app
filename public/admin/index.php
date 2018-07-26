<?php
require_once('../../includes/initialize.php');
require_once("../../includes/user.php");


if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php echo output_message($message); ?>


<?php include_layout_template('admin_header.php'); ?>

	<h1 style="text-align: center;">Authorized Personnel Only!</h1>
		<ul>
		<li><a href="list_photos.php">List Photos</a></li>
		<li><a href="logfile.php">Log Out</a></li>
		<li><a href="logfile.php">View Log File</a></li>
	</ul>

<?php include_layout_template('footer.php'); ?>
