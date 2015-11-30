<ul id="store-cat" class="nolist">
	<?php
		// list all store categories
		$args = array(
	         'taxonomy'     => 'product_cat',
	         'orderby'      => 'name',
	         'hierarchical' => 1,
	         'title_li'     => '',
	         'hide_empty'   => 1
		);
	 
		$all_categories = get_categories( $args );
	
		foreach( $all_categories as $cat ) 
		{
		    if ( $cat->category_parent == 0 ) 
		    {
		        $category_id = $cat->term_id;      
		        /** 
			     * we could change the href below to '.get_term_link( $cat->slug, 'product_cat' ).' 
			     * and remove the click function in application.js to link to the category instead
			     * of filtering
			     */
		        echo '<li><a href="#" data-filter=".'. strtolower( $cat->slug ) .'">'.$cat->name.'</a> <span class="cat-count">'.$cat->category_count.'</span></li>';
		    }       
		}
	?>
</ul>