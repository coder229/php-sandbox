<?php
    require_once("resources/secure.php");
    require_once("resources/config.php");
    require_once(TEMPLATES_PATH . "/header.php");
    require_once(TEMPLATES_PATH . "/navBar.php");
?>
<div class="container photos">
	<div class="row">
		<?php
			$result = $mysqli->query("select * from photoman_image");
			for ($row_no = $result->num_rows - 1; $row_no >= 0; $row_no--) {
				$result->data_seek($row_no);
    			$row = $result->fetch_assoc();
		?>
				<div class="col-md-3 photo-thumbnail">
					<img src="get_image.php?img=<?php echo $row['image_id']; ?>"/>
					<p id="<?php echo $row['image_id']; ?>"><?php echo $row['filename']; ?></p>
				</div>
		<?php
			}
		?>
	<div class="row">
</div>
<?php
    require_once(TEMPLATES_PATH . "/footer.php");
?>