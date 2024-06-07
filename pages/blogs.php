<!-- Blogs -->
<?php
// GET id là lấy id từ bên MENU.php 
$sql_blog = "SELECT * FROM tbl_blog ORDER BY id_blog DESC LIMIT 3";
$query_blog = $conn->query($sql_blog);
?>
<div class="blogs">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title">
					<h2>Latest Blogs</h2>
				</div>
			</div>
		</div>

		<div class="row blogs_container">
			<?php
			foreach ($query_blog as $row) {


			?>
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url(images/<?php echo $row['hinhanhblog']?>)"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title"><?php echo $row['tieude']?></h4>
							<span class="blog_meta">by admin | <?php echo $row['ngaydang']?></span>
							<a class="blog_more" href="blog_detail.php?idblog=<?php echo $row['id_blog']?>">Read more</a>
						</div>
					</div>
				</div>
			<?php
			}
			?>

		</div>
	</div>
</div>