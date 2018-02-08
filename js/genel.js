$(document).ready(function() {
  $('.sayac').each(function () {
      $(this).prop('Say',0).animate({
          Say: $(this).text()
      }, {
          duration: 1000,
          easing: 'swing',
          step: function (now) {
              $(this).text(Math.ceil(now));
          }
      });
  });
})
function responsiveMenu() {
    var x = document.getElementById("menu-ustmenu");
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}
