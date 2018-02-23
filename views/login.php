<!DOCTYPE html>
<html class="h-100">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php $this->header('admin'); ?>
  </head>
  <body class="h-100">
    <div class="container-fluid h-100">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-5">
          <form id="login-form" class="text-center" method="post">
            <h3 class="text-dark">Login</h3>
            <hr />
            <div class="form-info"></div>
            <div class="form-group">
              <input class="form-control" name="email" placeholder="E-mail Address" type="email"  />
              <div class="form-text text-muted text-left"></div>
            </div>
            <div class="form-group">
              <input class="form-control" name="password" placeholder="Password" type="password" />
            </div>
            <div class="text-right">
              <input class="btn btn-primary" type="submit" value="Login" />
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php $this->footer("admin"); ?>

    <script>
    $(document).on("submit", "#login-form", function(event) {
      event.preventDefault();
      var infoMessage, form = this, formInfo = $(form).find(".form-info"); emailAddressField = form.email, emailAddressFieldValue = emailAddressField.value, passwordField = form.password, passwordFieldValue = passwordField.value;
      if(!emailAddressFieldValue && !passwordFieldValue) {
        infoMessage = '<p class="text-danger">Please enter your e-mail address and password.</p>';
        $(emailAddressField).add(passwordField).addClass("is-invalid");
      } else if(!emailAddressFieldValue) {
        infoMessage = '<p class="text-danger">Please enter your e-mail address.</p>';
        $(passwordField).removeClass("is-invalid").addClass("is-valid");
        $(emailAddressField).addClass("is-invalid");
      } else if(!passwordFieldValue) {
        infoMessage = '<p class="text-danger">Please enter your password.</p>';
        $(emailAddressField).removeClass("is-invalid").addClass("is-valid");
        $(passwordField).addClass("is-invalid");
      } else {
        $(emailAddressField).add(passwordField).removeClass("is-invalid").addClass("is-valid");

        $.ajax({
          beforeSend: function() {
            infoMessage = '<p class="text-info">Sending request&hellip;</p>';
          },
          complete: function() {
            $(formInfo).html(infoMessage);
          },
          error: function() {
            infoMessage = '<p class="text-danger">The requested file wasn\'t found.</p>';
          },
          success: function(response) {
            console.log(response);
          },
          type: "POST",
          url: "http://localhost/mentfri/?url=ajax/checkLogin"
        });

      }


    });
    </script>
  </body>
</html>
