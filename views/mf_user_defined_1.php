<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User Defined 1</title>
    <?php $this->header('admin'); ?>
  </head>
  <body>

    <div class="container-fluid p-0">

      <?php $phase = "mf_user_defined_1"; require_once("assets/inc/panel.inc"); ?>
      <div class="content">
        <?php require_once("assets/inc/navbar.inc"); ?>
        <h4>User Defined 1</h4>
      </div>
    </div>

    <?php $this->footer('admin'); ?>
  </body>
</html>
