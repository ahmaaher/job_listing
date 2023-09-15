<div class="jumbotron">
	<h1>Filter Jobs</h1>
	<form method="GET" action="<?php echo $_SERVER['PHP_SELF']?>">
		<select name="cat_id" class="form-control">
			<option value="0">Choose Category</option>
			<?php foreach($cats as $category): ?>
				<option value="<?php echo $category->id; ?>"><?php echo $category->name ?></option>
			<?php endforeach; ?>
		</select>
		<br>
		<input type="submit" class="btn btn-primary" value="Filter" />
	</form>
</div>

<br><br>

<h3><?php echo $jobsTitle; ?>:</h3>
<?php foreach($jobs as $job): ?>
	<div class="row marketing">
		<div class="col-md-10">
			<h4><?php echo $job->job_title; ?></h4>
			<p><?php echo $job->description; ?></p>
		</div>
		<div class="col-md-2 veiw_btn">
			<a class="btn btn-primary" href="job.php?id=<?php echo $job->id; ?>">View</a>
		</div>
	</div>
<?php endforeach; ?>

