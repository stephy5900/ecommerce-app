<?php require_once("../../includes/initialize.php"); ?>
<?//php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
  // Find all the photos
  $photos = Photograph::find_all();
?>
<?php include_layout_template('admin_header.php'); ?>


<h2 style="text-align: center;"><b>Products</b></h2>

<?php echo output_message($message); ?>
<br/>
<br/>
<table class ="table-bordered" style="width: 100%;">
  <tr>
    <th style="text-align: center;">Image</th>
    <th style="text-align: center;">Filename</th>
    <th style="text-align: center;">Caption</th>
    <th style="text-align: center;">Size</th>
    <th style="text-align: center;">Type</th>
		<th style="text-align: center;">Comments</th>
		<th>&nbsp;</th>
  </tr>
<?php foreach($photos as $photo): ?>
  <tr>
    <td style="text-align: center;"><img src="../<?php echo $photo->image_path(); ?>" width="95" /></td>
    <td style="text-align: center;"><?php echo $photo->filename; ?></td>
    <td style="text-align: center;"><?php echo $photo->caption; ?></td>
    <td style="text-align: center;"><?php echo $photo->size_as_text(); ?></td>
    <td style="text-align: center;"><?php echo $photo->type; ?></td>
		<td style="text-align: center;">
			<a href="comments.php?id=<?php echo $photo->id; ?>">
				<?php echo count($photo->comments()); ?>
			</a>
		</td>
		<td style="text-align: center;"><a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a></td>
  </tr>
<?php endforeach; ?>
</table>
<br />
<form action= "photo_upload.php">
<!--<a href="photo_upload.php">Upload a new photograph</a>-->
<input type="submit" name="submit" value="Upload a new Photograph" class="btn btn-primary pull-right">
<br/>
</form>
<br/>
<br/>




<?php include_layout_template('footer.php'); ?>

    

