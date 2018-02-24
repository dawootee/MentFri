
		<div class="panel-wrapper">
			<div class="panel-layer"></div>
			<div class="panel-inner py-5">


				<nav class="nav leading-panel-navigation flex-column">

				<?php foreach($this->pages as $page_url => &$page_name) { ?>

					<a class="nav-link active" href="<?php echo ROOT_URL; ?>?url=admin/<?php echo $page_url; ?>"><?php echo $page_name; ?></a>

				<?php } ?>
				</nav>

			</div>
		</div>
