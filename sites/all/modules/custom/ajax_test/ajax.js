(function ($) {

  Drupal.behaviors.ajaxExample = {
    attach: function (context, settings) {
      
      // CSS Selector for the button which will trigger the AJAX call
      var body_class=$('body').attr('class');
      var rule= /\d+/g;
      var nodeId = body_class.match(rule);
      $('#edit-attributes-fied-boja--2', context).change(function () {
           
          $.ajax({
           url: '/ajax/get', // This is the AjAX URL set by the custom Module
           method: "GET",
           data: { idColor :$(this).val(),nid:nodeId}, // Set the number of Li items requested
           dataType: "json",          // Type of the content we're expecting in the response
           success: function(data) {
          
            $('div.image img').attr('src',data.imgUrl);  // Place AJAX content inside the ajax wrapper div
           $('.price-value').html(data.price);
          $("input[name='product_id']").val(data.product_id);
           }

         });

      });
      
    }
  };

}(jQuery));