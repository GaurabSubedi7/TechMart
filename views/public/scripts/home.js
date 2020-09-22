$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('.materialboxed').materialbox();
});

var header = document.getElementById("navlist");
var btns = header.getElementsByClassName("navlist");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}