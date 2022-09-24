jQuery(function($){
    /* LOAD MORE FUNCTION */
    $('#cc_loadmore').click(function(){
      $.ajax({
        url : cc_loadmore_params.ajaxurl, // AJAX handler
        data : {
          'action': 'loadmorebutton', // the parameter for admin-ajax.php
          'query': cc_loadmore_params.posts, // loop parameters passed by wp_localize_script()
          'page' : cc_loadmore_params.current_page // current page
        },
        type : 'POST',
        beforeSend : function ( xhr ) {
          $('#cc_loadmore').text('Loading...'); // some type of preloader
        },
        success : function( posts ){
          if( posts ) {
    
            $('#cc_loadmore').text( 'More posts' );
            $('#cc_posts_wrap').append( posts ); // insert new posts
            cc_loadmore_params.current_page++;
    
            if ( cc_loadmore_params.current_page == cc_loadmore_params.max_page ) 
              $('#cc_loadmore').hide(); // if last page, HIDE the button
    
          } else {
            $('#cc_loadmore').hide(); // if no data, HIDE the button as well
          }
        }
      });
      return false;
    });

});