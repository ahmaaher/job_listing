<?php if(isset($job) && is_numeric($_GET['id'])){ ?>

	<h2><?php echo $job->job_title ?> (<?php echo $job->location ?>)</h2>
	<small>Posted By <?php echo $job->user; ?> on <?php echo $job->post_date; ?></small>
	<hr>
	<p class="lead"><?php echo $job->description; ?></p>
	<ul class="list-group">
		<li class="list-group-item"><?php echo $job->company; ?></li>
		<li class="list-group-item"><?php echo $job->salary; ?>k</li>
		<li class="list-group-item"><?php echo $job->email; ?></li>
	</ul>
	<br><br>
	<!-- edit & delete btns -->
	<a href="?id=<?php echo $job->id; ?>&edit" class="btn btn-secondary">Edit</a>
	<form style="display: inline;" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<input type="hidden" name="id" value="<?php echo $job->id; ?>" />
		<input type="submit" class="btn btn-danger" name="delete" value="delete" />
	</form>
	<br><br>
	<a class="go_back" href="index.php">Go Back</a>
	<br><br>

<?php }else{
	echo "NO Jobs ";
	echo '<a class="go_back" href="index.php">Go Back</a><br><br>';
} ?>
