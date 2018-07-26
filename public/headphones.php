<?php
 require_once("../includes/initialize.php");  

 $sql ="SELECT * FROM photographs WHERE caption LIKE '%headphone%'";
 $photos = Photograph::find_by_sql($sql);


?> 
<?php include_layout_template('header.php'); ?>
		<div class="jumbotron row" id="banner">
			<h1>All Products</h1>
		</div>
		<section class="page-section row" id="shop"> 
			<div class="col-xs-12 col-sm-3">

		<div class="sidebar">
					<h4>Categories</h4>
					<ul class="list-unstyled categories-group">
						<li>
							<a class="" href="headphones.php"><span class="badge">4</span>Headphones</a>
						</li>
						<li>
							<a class="" href="speakers.php"><span class="badge">4</span>Portable Speakers</a>
						</li>
						<li>
							<a class="" href="tech.php"><span class="badge">4</span>Wearable Tech</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-xs-12 col-sm-9">
				<div id="product-list">
					<div class="product-grid">
						<div class="row" id="" style="position: relative; height: 800px;">




			<?php 
			foreach ($photos as $photo) { ?>
				<div class="col-xs-12 col-sm-6 col-md-4 product-holder" style="float: left; margin-left: 70px;">
								<form action="index.php" class="custom" method="post" onsubmit="return false">
									<div class="product-item text-center">
										
										<a class="product-img" href="photo.php?id=<?php echo $photo->id; ?> "><img class="img-responsive" src="<?php echo $photo->image_path(); ?>"></a>
										<h3 class="product-title"><a href="photo.php?id=<?php echo $photo->id; ?>"><?php echo $photo->caption; ?></a></h3>
										<div class="h4 product-price">
											<span><?php echo $photo->price; ?></span>
										</div>
										<div class="buttons-holder">
											<a class="btn btn-default btn-quick-view hidden-xs" data-original-title="Quick View" href="https://boxie.lemonstand.com/product/blue-headphones" rel="tooltip" title=""><i class="fa fa-eye"></i></a>
										</div>
									</div>
								</form>
							</div>

			<?php } ?>


<?php include_layout_template('footer.php'); ?>




 