$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('.scrollspy').scrollSpy();
    $('.dropdown-trigger').dropdown();
    $('.materialboxed').materialbox();
  //   $('.carousel.carousel-slider').carousel({
  //     dist: 0,
  //     fullWidth: false,
  //     indicators: true
  //   });autoplay();
  // function autoplay() {
  //     $('.carousel').carousel('next');
  //     setTimeout(autoplay, 4500); }
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