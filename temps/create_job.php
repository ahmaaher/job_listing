<h2 class="text-center">Create New Job</h2>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	<div class="form-group cn_fg">
		<label>Job Title :</label>
		<input type="text" class="form-control" name="job_title">
	</div>
	<div class="form-group cn_fg">
		<label>Company :</label>
		<input type="text" class="form-control" name="company">
	</div>
	<div class="form-group cn_fg">
		<label>Category :</label>
		<select class="form-control" name="cat_id">
			<option value="0">Choose Category</option>
			<?php foreach($cats as $category): ?>
				<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group cn_fg">
		<label>Descriptoin :</label>
		<textarea class="form-control" name="description"></textarea>
	</div>
	<div class="form-group cn_fg">
		<label>Salary :</label>
		<input type="text" class="form-control" name="salary">
	</div>
	<div class="form-group cn_fg">
		<label>Location :</label>
		<input type="text" class="form-control" name="location">
	</div>
	<div class="form-group cn_fg">
		<label>User Name :</label>
		<input type="text" class="form-control" name="user">
	</div>
	<div class="form-group cn_fg">
		<label>Email :</label>
		<input type="text" class="form-control" name="email">
	</div>
	<div class="form-group cn_fg">
		<input type="submit" class="btn btn-primary" name="submit" value="Submit">
	</div>
</form>
<br><br>
