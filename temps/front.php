<div class="jumbotron">
	<h1>Jumbotron heading</h1>
	<p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
	<p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
</div>

<?php foreach($jobs as $job): ?>
	<div class="row marketing">
		<div class="col-md-10">
			<h4><?php echo $job->job_title; ?></h4>
			<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
		</div>
		<div class="col-md-2 veiw_btn">
			<a class="btn btn-primary" href="#">View</a>
		</div>
	</div>
<?php endforeach; ?>
