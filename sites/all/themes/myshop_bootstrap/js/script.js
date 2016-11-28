(function($) {
  
  $(document).ready(function ()
  {
     var expanded_item=$('.navbar-nav').find('li.expanded');
     $(expanded_item).find('ul').prop('class','dropdown-menu');
  });
})(jQuery);