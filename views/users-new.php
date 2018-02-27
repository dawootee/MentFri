<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add New User</title>
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
							<input class="form-control" placeholder="Name" type="text" />
						</div>
						<div class="form-group">
							<select class="form-control">
								<option>Choose Role</option>
								<option>Administrator</option>
								<option>Moderator</option>
								<option>Author</option>
							</select>
						</div>
						<div class="text-right">
							<input class="btn btn-primary" type="submit" value="Add User" />
						</div>
					</form>
				</div>

				<div class="col-md-4">
					<p>Some attributes for the post.</p>
				</div>


			</div>

		</div>


		</div>

		<?php $this->footer('admin'); ?>
	</body>
</html>
