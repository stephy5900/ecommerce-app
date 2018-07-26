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
  

  if(isset($_POST['submit'])) {
	  $author = trim($_POST['author']);
	  $body = trim($_POST['body']);
	
	  $new_comment = Comment::make($photo->id, $author, $body);
	  if($new_comment && $new_comment->save()) {
			
	    redirect_to("photo.php?id={$photo->id}");
	
		} else {
			// Failed
	    $message = "There was an error that prevented the comment from being saved.";
		}
	} else {
		$author = "";
		$body = "";
	}
	
	$comments = $photo->comments();

 ?>

<?php include_layout_template('header.php'); ?>

		<div class="jumbotron row" id="banner">
			<h1><?php echo $photo->caption; ?></h1>
		</div>
		<section class="page-section row" id="shop">
			<div class="row">
				<div id="product-images">
					<div class="col-xs-12 col-sm-6">
						<div class="carousel slide" data-interval="false" data-ride="carousel" id="product-gallery">
							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active" id="slide1" style="padding-left: 20px;">
									<img class="product-gallery" src="<?php echo $photo->image_path(); ?>">
								</div>
							</div><!-- Indicators -->
						</div>
					</div>
				</div>
				<div id="product-page">
					<div class="col-sm-6">
						<h1 itemprop="name"><?php echo $photo->caption; ?></h1>
						<div class="product-rating-container"></div>
						<div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
							<h2 itemprop="price"><?php echo $photo->price; ?></h2>
							<link href="http://schema.org/InStock" itemprop="availability">
						</div>
						<div class="excerpt" itemprop="description">
							<p><?php echo $photo->description; ?></p>
						</div><br>
						<br>
						<br>
						<div>
							<!--<form action= "buy.php">
							<input type="submit" name="Buy" value="Buy Now" class="btn btn-primary btn-lg btn-block" style="width: 50%"  href= "buy.php?id=<?php echo $photo->id; ?>">
							</form> -->

							<a href="buy.php?id=<?php echo $photo->id; ?>"><input type="submit" name="buy" value="Buy Now" class="btn btn-primary btn-lg btn-block" style= "width: 50%"></a>
						</div>
						<div><p></p></div>
						<div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
							<h4 itemprop="price">Reviews</h4>
							<?php foreach($comments as $comment): ?><div class="comment" style="margin-bottom: 2em;">
								<div class="author">
	      					<strong><?php echo htmlentities($comment->author); ?> : </strong>
	    					</div>
	    					<div>
							<?php echo strip_tags($comment->body, '<strong><em><p>'); ?>
							</div>
							<div class="meta-info" style="font-size: 0.8em;">
	     					 <?php echo datetime_to_text($comment->created); ?>
	    					</div>
   							 </div>
   							 <?php endforeach; ?>
   							 <?php if(empty($comments)) { echo "No Comments."; } ?>
						</div>
						<div style="width: 50%;">
							<br>
							<p>Write your review</p>
							<?php echo output_message($message); ?>
							<form action="photo.php?id=<?php echo $photo->id; ?>" method="post">

							 <table>
     						 <tr>
        					<td><input type="text" name="author" value="<?php echo $author; ?>" placeholder="  author" style="width: 100%" /></td>
      						</tr>
      						<tr>
        					<td><textarea name="body" cols="40" rows="8" placeholder=" Leave your review here "><?php echo $body; ?> </textarea></td>
     						 </tr>
     						 <tr>
        					<td>&nbsp;</td>
        					</tr>
        					</div>
        					<td><input type="submit" name="submit" value="Submit Comment" style="width: 100%" class="btn btn-primary btn-lg btn-block"/></td>
      						</tr>
   							 </table>
								
								<!--<div class="row field-row">
									<div class="col-xs-12 col-sm-12 form-group">
										<input class="required form-control" id="subject" name="author" placeholder="author" type="text" value="<?php echo $author; ?>"> <span class="error"></span>
									</div>
								</div>
								<div class="row field-row">
									<div class="col-xs-12 col-sm-12 form-group">
										<textarea class="required form-control" id="contact_message" name="fields[message]" placeholder="Your review" rows="10"><?php echo $body; ?></textarea> <span class="error"></span>
									</div>
								</div><input class="btn btn-primary btn-lg btn-block" style="width: 100%" type="submit" value="Submit">-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php include_layout_template('footer.php'); ?>

 