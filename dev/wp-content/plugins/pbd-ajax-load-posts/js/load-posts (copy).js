jQuery(document).ready(function($) {
    
    var status = false;

    // The number of the next page to load (/page/x/).
    var pageNum = parseInt(pbd_alp.startPage) + 1;

    // The maximum number of pages the current query can return.
    var max = parseInt(pbd_alp.maxPages);

    // The link of the next page of posts.
    var nextLink = pbd_alp.nextLink;

    /**
     * Replace the traditional navigation with our own,
     * but only if there is at least one page of new posts to load.
     */
    if (pageNum <= max) {
        // Insert the "More Posts" link.
        $('#primary')
            .append('<div class="pbd-alp-placeholder-' + pageNum + '"></div>')
            .append('<div id="pbd-alp-load-posts">Click here To Load More Posts</div>');

        // Remove the traditional navigation.
        $('.navigation').remove();
    }

    function load_post() {
        // Are there more posts to load?
        if (pageNum <= max) {

            // Show that we're working.
            $('#pbd-alp-load-posts').text('Loading posts...');
            $('#pbd-alp-load-posts').append('&nbsp;<img src="http://hublog.iksulabeta.com/wp-content/uploads/2014/10/load.gif" />');

            status = false;

            $('.pbd-alp-placeholder-' + pageNum).load(nextLink + ' .load-article',
                function() {
                    // Update page number and nextLink.
                    pageNum++;
                    nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/' + pageNum);

                    // Add a new placeholder, for when user clicks again.
                    $('#pbd-alp-load-posts')
                        .before('<div class="pbd-alp-placeholder-' + pageNum + '"></div>')

                    // Update the button message.
                    if (pageNum <= max) {
                        $('#pbd-alp-load-posts').text('Scroll Down To Load More Posts');
                    } else {
                        $('#pbd-alp-load-posts').text('Sorry No more posts to load.');
                    }
                    function status_true(){
                    status = true;
                    }
                    status_true().delay(3000);
                });
        }
    }



    // Load new posts when the user click first time.
    $('#pbd-alp-load-posts').click(function() {
        if (pageNum == 2) {
            load_post();
        }
        return false;
    });


    function ispost() {
            var posttop = $("#pbd-alp-load-posts").offset().top;
            var postbottom = $(document).scrollTop() + $(window).height();
            return (postbottom >= posttop+150);            
        }
    
        // Load posts in infinite scroll.
   $(window).scroll(function() {
    if (pageNum > 2) {
        if (ispost()) {           
               if(status == true){
                  load_post();
                }             
            }
            return false;
        }
    });

    // Load posts in infinite scroll.
    /* $(window).scroll(function() {
         if ($(window).scrollTop() == $(document).height() - $(window).height()) {
             if (pageNum > 2) {
                 load_post();
             }
             return false;
         }
     }); */


});
