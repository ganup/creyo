<?php
$catTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC', 'exclude' => '17,77')); 
    $ul = '<ul class="wrapperul"><li class="showcategory"><a href="#" class="activecategory">Menu 2</a><ul class="sub-menu">';
    foreach($catTerms as $catTerm){
        
        $ul .= '<li><a href="/product-category/' . $catTerm->slug . '">' . $catTerm->name . '</a></li>';
    }
    $ul .= '</ul></li></ul>';

 
$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
    <div>
        <input type="text" id="mainsearchbox" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search for a product...', 'woocommerce' ) . '" />    
        <div class="categorynav">'. $ul .'</div>
        <input type="submit" id="searchsubmit" value="'. esc_attr__( '', 'woocommerce' ) .'" />
        <input type="hidden" name="post_type" value="product" />
    </div>
</form>';
 
echo $form;

/*   No touch Main form*/
/*$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
    <div>
        <label class="screen-reader-text" for="s">' . __( 'Search for:', 'woocommerce' ) . '</label>
        <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'My Super Search form', 'woocommerce' ) . '" />    
        <div>'. $ul .'</div>
        <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'woocommerce' ) .'" />
        <input type="hidden" name="post_type" value="product" />
    </div>
</form>';
 
echo $form;*/

?>

