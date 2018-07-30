jQuery(document).ready(function() {
    var offset = jQuery('.mystar1').offset().left;
    jQuery('.mystar0').mousemove(function(e){
        var width = e.clientX-offset;
        var points = (Number((width/93)*5)).toFixed(1);
        if(width < 94){
            jQuery(this).children('span').text(points);
            jQuery(this).children('input').val(points);
            jQuery(this).children('.mystar1').css('width',width+'px');
        }
    }) 
})
