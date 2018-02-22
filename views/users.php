
<?php


$this->stylesheets = [
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css',
    $this->get_template_path() . 'style.css'
];




foreach($this->stylesheets as $stylesheet) {
	echo '<link rel="stylesheet" href="' . $stylesheet . '" />';
}

?>

<h2>Users</h2>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>
				UserID
			</th>
			<th>
				FirstName
			</th>
			<th>
				LastName
			</th>
			<th>
				UserName
			</th>
			<th>
				E-mail Address
			</th>
			<th>
				Password
			</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data as $user) { ?>
		<tr>
			<td>
				<?php echo $user->UserID; ?>
			</td>
			<td>
				<?php echo $user->FirstName; ?>
			</td>
			<td>
				<?php echo $user->LastName; ?>
			</td>
			<td>
				<?php echo $user->UserName; ?>
			</td>
			<td>
				<?php echo $user->EmailAddress; ?>
			</td>
			<td>
				<?php echo $user->Password; ?>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
