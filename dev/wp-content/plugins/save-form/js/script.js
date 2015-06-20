$ = jQuery;
$(document).ready(function() {

    var height = 300,
        width = 600,

        slides = 6,
            
        tabs = $('.tab'),
        contentNum = 1;
    
    $('.main_inner').css({
        width: slides * width
    });

    $('a.tab_link').click(function() {

        tabs.filter('.active').removeClass('active');
        $(this).parent().addClass('active');
        
        // make sure contentNum is a number and not a string
        contentNum = parseInt( $(this).attr('rel'), 10 );

        $('.main_inner').animate({
            marginLeft: '-' + (width * contentNum - width)
        }, 600);

        return false;

    });

    $('.previous a').click(function(){
        if (contentNum > 1) {
            // find previous tab, trigger a click on the link
            // subtract 2 because eq() uses zero based index
            tabs.eq(contentNum - 2).find('a').trigger('click');
        }
        return false;
    });
    
    $('.next a').click(function(){
        if (contentNum < slides) {
            // find previous tab, trigger a click on the link
            // contentNum doesn't need + 1 because it is +1 relative to eq()
            // which is a zero based index
            tabs.eq(contentNum).find('a').trigger('click');
        }
        return false;
    });
    
});
