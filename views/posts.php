
<?php

$this->header('admin');

?>

<h2>Posts</h2>
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
