// import jQuery from 'jquery';

(($) => {
  Drupal.behaviors.status = {
    attach() {
      setInterval(() => {
        $('.status--error').fadeToggle();
      }, 500);
    },
  };
})(jQuery);
