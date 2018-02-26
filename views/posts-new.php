<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Posts</title>
		<?php $this->header('admin'); ?>
	</head>
	<body>



		<div class="container-fluid p-0">

					<?php $phase = "posts"; require_once("assets/inc/panel.inc"); ?>



		<div class="content">

		<?php require_once("assets/inc/navbar.inc"); ?>

			<div class="row justify-content-center m-5">

				<div class="col-md-6">
					<form method="post">
						<div class="form-group">
							<input class="form-control" placeholder="Post Title" type="text" />
						</div>
						<div class="form-group">
							<div class="text-editor"></div>
						</div>
					</form>
				</div>

				<div class="col-md-3">
					<p>Some attributes for the post.</p>
				</div>


			</div>

		</div>


		</div>

		<?php $this->footer('admin'); ?>
	</body>
</html>
