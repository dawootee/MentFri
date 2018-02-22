
<?php


$this->stylesheets = [
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css',
    $this->get_template_path() . 'style.css'
];




foreach($this->stylesheets as $stylesheet) {
	echo '<link rel="stylesheet" href="' . $stylesheet . '" />';
}

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
