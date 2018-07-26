<?php
 require_once("../includes/initialize.php"); 

 if(empty($_GET['id'])) {
    $session->message("No photograph ID was provided.");
    redirect_to('index.php');
  }
  
  $photo = Photograph::find_by_id($_GET['id']);
  if(!$photo) {
    $session->message("The photo could not be located.");
    redirect_to('index.php');
  }


  $total = '';
  $name = '';
  $phone_num = '';
  $product = '';
  $qty = '';
  $address = '';
  $price = '';
  $total = '';

  if(isset($_POST['generate'])){

  	$name = $_POST['name'];
  	$phone_num =  $_POST['number'];
  	$product = $_POST['product'];
  	$qty = $_POST['qty'];
  	$address = $_POST['address'];
  	$price = $_POST['price'];
  	$total = $_POST['price'] * $_POST['qty'];
  }
  
 if(isset($_POST['submit'])){

 	$order = new Order();

 	$order->name = $_POST['name'];
	$order->phone_num = $_POST['number'];
	$order->product = $_POST['product'];
	$order->qty = $_POST['qty'];
	$order->address = $_POST['address'];
	$order->price =$_POST['price'];
	$order->total = $_POST['total'];

	$order->save();

	//if($order->save()){
		redirect_to('photo.php');
		//echo "Order added successfully";
	//}else{
		//echo "Unable to purcahse";
	//}
}
	
 ?>

<?php include_layout_template('header.php'); ?>

		<div class="jumbotron row" id="banner">
			<h1>Order Form</h1>
		</div>
<section class="page-section row" id="shop">
 <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-2">
		<form  method="post" action="">
				<div class="row">
				<div class="col-xs-12 form-group">
					<input name="name" type="text" class="form-control" placeholder="Name *" value="<?php echo $name; ?>">
					<label for="name">Name</label>
				</div>
				<div class="col-xs-12 form-group">
					<input name="number" type="tel" class="form-control" placeholder="Phone Number *" value="<?php echo $phone_num; ?>">
					<label for="phone_num">Phone Number</label>
				</div>
				<div class="col-xs-12 form-group">
					<input type="text" name="product" class="form-control" placeholder="Product *" value="<?php echo $photo->caption; ?>">
					<label for="product">Product</label>
				</div>
				<div class="col-xs-12 form-group">
					<input name="qty" type="text" class="form-control" placeholder="Quantity *" value="<?php echo $qty; ?>">
					<label for="qty">Quantity</label>
				</div>
				<div class="col-xs-12 form-group">
					<input name="address" type="text" class="form-control" placeholder="Delivery Address*" value="<?php echo $address; ?>" >
					<label for="address">Address</label>
				</div>	
				<div class="col-xs-12 form-group">
					<input name="price" type="text" class="form-control" placeholder="Unit Price*" value="<?php echo $photo->price; ?>">
					<label for="price">Unit Price</label>
				</div>
				<div class="col-xs-12 form-group">
					<input name="total" type="text" class="form-control" placeholder="Total*" value="<?php echo $total; ?>" >
					<label for="total">Total</label>
				</div>	
			</div>
			<!--<input type="checkbox" name="accepts_marketing" id="accepts_marketing" checked=""> Recieve promotional emails<br><br> -->
			<div>
			<table>
			<tr>
			<td width="30%"><input type="submit" name="generate" value="generate cost" class="btn btn-primary pull-right"></td>
			<td><input type="submit" name="submit" value="submit" class="btn btn-primary pull-right"></td>
			</tr>
			</table>
			</div>

		</form>
	</div>

	
		<div class="row">
				<div id="product-images">
					<div class="col-xs-12 col-sm-6">
						<!--<div class="carousel slide" data-interval="false" data-ride="carousel" id="product-gallery"> -->
							<!-- Wrapper for slides -->
							<!-- <div class="carousel-inner"> -->
								<div class="item active" id="slide1" style="padding-left: 80px;">
									<img class="product-gallery" src="<?php echo $photo->image_path(); ?>">
								</div>
								<div><h2 style="text-align: center;"><?php echo $photo->caption; ?></h2></div>
							
							</div><!-- Indicators -->
						</div>
					</div>
				</div>
				</section>
		

<?php include_layout_template('footer.php'); ?>

 