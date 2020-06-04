/*global $ */
$ = jQuery;
jQuery(document).ready(function(){
    
$('a[href*="#"]').on('click', function(e) {
    e.preventDefault()
    
    $('html, body').animate(
        {
        scrollTop: $($(this).attr('href')).offset().top - 40,
        },
        300,
        'linear'
    )
    });
 
});