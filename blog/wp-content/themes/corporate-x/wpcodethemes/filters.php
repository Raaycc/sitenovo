<?php
/**
 * Load Filters.
 *
 * @package Corporate_X
 */

if( !function_exists( 'corporate_x_search_form' ) ) :
	/**
     * Search form of the theme.
     *
     * @since 1.0.0
     */
	function corporate_x_search_form() {
		$form = '<form role="search" method="get" id="search-form" class="search-form" action="' . home_url( '/' ) . '" >
			    	<div class="input-group stylish-input-group">
			    		<label class="screen-reader-text" for="s">' . esc_html__( 'Search for:', 'corporate-x' ) . '</label>
			    		<input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" />
			    		<span class="input-group-addon group-addon">
			    			<button type="submit" id="searchsubmit" class="submit-btn" value="'. esc_attr__( 'Search', 'corporate-x' ).'">
			    				<i class="fa fa-search"></i>
			    			</button>
			    		</span>
			    	</div>
			    </form>';

		return $form;
	}
endif;
add_filter( 'get_search_form', 'corporate_x_search_form', 20 );
/*
* Filter For Archive Title
*/
if( !function_exists( 'corporate_x_archive_title' ) ) :
	function corporate_x_archive_title( $title ) {
		/*
		 * Archive Title
		 */
	    if ( is_category() ) {
	        $title = single_cat_title( '', false );
	    } elseif ( is_tag() ) {
	        $title = single_tag_title( '', false );
	    } elseif ( is_author() ) {
	        $title = '<span class="vcard">' . get_the_author() . '</span>';
	    } elseif ( is_post_type_archive() ) {
	        $title = post_type_archive_title( '', false );
	    } elseif ( is_tax() ) {
	        $title = single_term_title( '', false );
	    }	  
	    return $title;
	}
endif;
 
add_filter( 'get_the_archive_title', 'corporate_x_archive_title' );

if( !function_exists( 'corporate_x_comment_form_fields' ) ) :
	/**
	 * Add custom style of form field
	 */
	function corporate_x_comment_form_fileds( $fields ) {
		$commenter = wp_get_current_commenter();
		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

		$fields   =  array(
			'author'=>  '<div class="form-group">
							<label for="author">'.esc_html__("Full Name *", "corporate-x").'</label>
							<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
						</div>'. ( $req ? '<span class="required"></span>' : '' ),

			'email'=>   '<div class="form-group">
							<label for="email">'.esc_html__("Email Address *", "corporate-x").'</label>
							<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) .	'" ' . $aria_req . ' />
						</div>' . ( $req ? '<span class="required"></span>' : '' ),

			'url'=>     '<div class="form-group">
							<label for="url">'.esc_html__('Website', 'corporate-x').'</label>
							<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" />
						</div>',
		);

		return $fields;
	}
endif;
add_filter( 'comment_form_default_fields', 'corporate_x_comment_form_fileds' );



if( !function_exists( 'corporate_x_comment_form' ) ) :
	/**
	 * Add custom default values of form.
	 */
	function corporate_x_comment_form( $args ) {
		$args['class_form'] = esc_attr__('comment_news comment-form', 'corporate-x');
		$args['title_reply'] = esc_html__('Leave comment','corporate-x');
		$args['title_reply_before'] = '<h3 class="reply-title">';
		$args['title_reply_after'] = '</h3>';
		$args['comment_notes_before'] = '<p>'. esc_html__( 'Your email address will not be published. Required fields are marked with *.','corporate-x' ).'</p>';
		$args['comment_field'] = '<div class="form-group">
									<label for="comment">'.esc_html__('Comment','corporate-x').'</label>
								  	<textarea id="comment" class="form-control" name="comment" rows="5" placeholder="'.''.'" aria-required="true"></textarea>
								  	</div>';
		$args['class_submit'] = esc_attr__('btn btn-default submit-comment', 'corporate-x'); 
		$args['label_submit'] = esc_attr__('Post Comment', 'corporate-x');

		return $args;
	}
endif;
add_filter( 'comment_form_defaults', 'corporate_x_comment_form' );
