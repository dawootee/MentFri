<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <?php $this->header('admin'); ?>
  </head>
  <body>

    <div class="container-fluid p-0">
      <?php require_once("assets/inc/panel.inc"); ?>
      <div class="content">
        <?php require_once("assets/inc/navbar.inc"); ?>
        <h4>Dashboard</h4>
      </div>
    </div>

    <?php $this->footer('admin'); ?>
  </body>
</html>
