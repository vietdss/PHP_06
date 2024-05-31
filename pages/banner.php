<!-- Banner -->
<?php
$sql = "SELECT * FROM tbl_danhmuc";
$result = $conn->query($sql);?>
<div class="banner">
	<div class="container">
		<div class="row">
			<?php
			foreach ($result as $row) {
			?>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/<?php echo"$row[banner]"?>)">
						<div class="banner_category">
							<a href="product_categories.php?category=<?php echo $row['tendanhmuc']?>"><?php echo"$row[tendanhmuc]"?></a>
						</div>
					</div>
				</div>

			<?php
			}
			?>
		</div>
	</div>
</div>