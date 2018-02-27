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


		<div class="m-5">

					<h2>Posts <a class="btn btn-primary" href="<?php echo ROOT_URL; ?>?url=admin/posts/new">New Post</a></h2>
					<table>
						<thead>
							<tr>
								<th>
									PostID
								</th>
								<th>
									PostTitle
								</th>
								<th>
									PostContent
								</th>
								<th>
									PostAuthor
								</th>
								<th>
									DateCreated
								</th>
								<th>
									DateModified
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data as $post) { ?>
							<tr>
								<td>
									<?php echo $post->PostID; ?>
								</td>
								<td>
									<?php echo $post->PostTitle; ?>
								</td>
								<td>
									<?php echo $post->PostContent; ?>
								</td>
								<td>
									<?php echo $post->PostAuthor; ?>
								</td>
								<td>
									<?php echo $post->DateCreated; ?>
								</td>
								<td>
									<?php echo $post->DateModified; ?>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>

				</div>

		</div>


		</div>

		<?php $this->footer('admin'); ?>
	</body>
</html>
