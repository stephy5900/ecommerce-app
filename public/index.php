
<?php require_once("../includes/initialize.php"); ?>
<?php

	// 1. the current page number ($current_page)
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

	// 2. records per page ($per_page)
	$per_page = 6;

	// 3. total record count ($total_count)
	$total_count = Photograph::count_all();
	

	// Find all photos
	// use pagination instead
	//$photos = Photograph::find_all();
	
	$pagination = new Pagination($page, $per_page, $total_count);
	
	// Instead of finding all records, just find the records 
	// for this page
	$sql = "SELECT * FROM photographs ";
	$sql .= "LIMIT {$per_page} ";
	$sql .= "OFFSET {$pagination->offset()}";
	$photos = Photograph::find_by_sql($sql);
	


	//$photo = Photograph::find_by_id($_GET['id']);
	// Need to add ?page=$page to all links we want to 
	// maintain the current page (or store $page in $session)
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


							<?php foreach ($photos as $photo) { ?>
							<div class="col-xs-12 col-sm-6 col-md-4 product-holder" style="float: left; margin-left: 75px;">
								<form action="index.php" class="custom" method="post" onsubmit="return false">
									<div class="product-item text-center">
										
										<a class="product-img" href="photo.php?id=<?php echo $photo->id; ?> "><img alt="Blue Headphones" class="img-responsive" src="<?php echo $photo->image_path(); ?>"></a>
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

						</div>
					</div>
					<div class="pagination-holder"></div>
				</div>
			</div>

		</section>

		<?php include_layout_template('footer.php'); ?>
