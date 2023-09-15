<?php if(isset($job) && is_numeric($_GET['id'])){ ?>
	<h2 class="text-center">Edit '<?php echo $job->job_title; ?>' Job</h2>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<!-- Hidden input for Job id -->
		<input type="hidden" name="id" value="<?php echo $job->id; ?>" />
		<div class="form-group cn_fg">
			<label>Job Title :</label>
			<input type="text" class="form-control" name="job_title" value="<?php echo $job->job_title; ?>" />
		</div>
		<div class="form-group cn_fg">
			<label>Company :</label>
			<input type="text" class="form-control" name="company" value="<?php echo $job->company; ?>" />
		</div>
		<div class="form-group cn_fg">
			<label>Category :</label>
			<select class="form-select" name="cat_id">
				<option value="0">Choose Category</option>
				<?php foreach($cats as $category): ?>
					<?php if($job->cat_id == $category->id): ?>
						<option value="<?php echo $category->id; ?>" selected><?php echo $category->name; ?></option>
					<?php else: ?>
						<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group cn_fg">
			<label>Descriptoin :</label>
			<textarea class="form-control" name="description" rows="4"><?php echo $job->description; ?></textarea>
		</div>
		<div class="form-group cn_fg">
			<label>Salary :</label>
			<input type="text" class="form-control" name="salary" value="<?php echo $job->salary; ?>" />
		</div>
		<div class="form-group cn_fg">
			<label>Location :</label>
			<input type="text" class="form-control" name="location" value="<?php echo $job->location; ?>" />
		</div>
		<div class="form-group cn_fg">
			<label>User Name :</label>
			<input type="text" class="form-control" name="user" value="<?php echo $job->user; ?>" />
		</div>
		<div class="form-group cn_fg">
			<label>Email :</label>
			<input type="text" class="form-control" name="email" value="<?php echo $job->email; ?>" />
		</div>
		<div class="form-group cn_fg">
			<input type="submit" class="btn btn-primary" name="update" value="Update">
		</div>
	</form>
	<br><br>

<?php }else{
	echo "NO Jobs ";
	echo '<a class="go_back" href="index.php">Go Back</a><br><br>';
} ?>