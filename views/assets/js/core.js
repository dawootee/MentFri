
$(document).ready(function() {
  $(".panel-toggler").on("click", function(event) {
    event.preventDefault();
    $("body").toggleClass("has-active-panel");
  });
});
