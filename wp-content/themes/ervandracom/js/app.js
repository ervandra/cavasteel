var jQvan = jQuery.noConflict();
jQvan(document).ready(function($){
  $(document).foundation();
  var controller = new ScrollMagic.Controller({
    globalSceneOptions: {
      duration: 100
    }
  });
  $(".section").each(function() {
    var $section = this;
    new ScrollMagic.Scene({
      triggerElement: $section,
      duration: 600,
      offset: 200,
      triggerHook: 1
    })
      .on("enter", function() {
        $($section).addClass("active");
      })
      .addTo(controller);
  });
  $('.scroll-down a').on('click', function(e){
    e.preventDefault();
    var body = $("html, body");
    var maincontent = $('#maincontent').offset().top;
    $('html, body').animate({ scrollTop: maincontent }, 1000);
  })
  $('.product-carousel').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 5,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  })
})
