import jQuery from 'jquery';

(($) => {
  Drupal.behaviors.sliderexample = {
    attach() {
      const $carousel = $('.slider');
      if ($carousel) {
        $($carousel).not('slick-initialized').slick({
          autoplay: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplayspeed: 1000,
          arrows: true,
          dots: true,
        });
      }
    },
  };
})(jQuery);
