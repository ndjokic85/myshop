(function($) {
  
  $(document).ready(function ()
  {
      $(document).on('click','.mega-dropdown',function (e)
      {
         e.stopPropagation(); 
      });
        custommenu();
        
        $('.home-link').prepend('<span class="glyphicon glyphicon-home"></span>');
  });
  
  function custommenu()
{
     var expanded_item=$('.navbar-nav').find('li.expanded');
     $(expanded_item).find('ul').prop('class','dropdown-menu mega-dropdown-menu row');
     $('.navbar-nav > li.mega-dropdown > ul.dropdown-menu > li').prop('class','col-sm-2');
     $('.navbar-nav > li.mega-dropdown > ul.dropdown-menu > li >a,li.divider a').remove();
     $('li.col-sm-2 > ul').removeClass();
     $('li.dropdown-header a').contents().unwrap();
     
}
})(jQuery);

