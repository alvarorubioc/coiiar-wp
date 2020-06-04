/*global $ */
$ = jQuery;
jQuery(document).ready(function(){
    
    /**
     * Filters | Blog
     */

    $('.filters-bar .dropdown.categories').on('click', function(e) {
        e.preventDefault();
        $('.filters-wrapper .categories').slideToggle(200);
        $('.filters-wrapper .tags').css('display', 'none');
      });

      $('.filters-bar .dropdown.tags').on('click', function(e) {
        e.preventDefault();
        $('.filters-wrapper .tags').slideToggle(200);
        $('.filters-wrapper .categories').css('display', 'none');
      });  
 
});

