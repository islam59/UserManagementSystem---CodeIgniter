<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login &mdash; Form</title>
  </head>
  <body>
	<h1>Login Form !</h1>
	<form action="<?php echo base_url('index.php/User/Login/'); ?>" method="post">
		<label for="userid">User ID</label>
		<input name="userid" type="text" id="userid" placeholder="Enter User ID !">

		<label for="password">Password</label>
		<input name="password" type="password" id="password" placeholder="Password">
		
		<button type="submit">Login</button>
		&nbsp; <?php echo $this->session->flashdata('msg'); ?>
	</form>
  </body>
</html>