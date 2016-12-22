<?php   
global $product, $products, $content;
					$id=$products->post->ID;
					$sku = get_post_meta( $id, '_sku');
					$currency = get_woocommerce_currency_symbol();

					$regular_price = get_post_meta( $id, '_regular_price');
					$sales_price = get_post_meta( $id, '_sale_price'); 

					$price = $regular_price[0] - $sales_price[0];
					$price = round($price, 2);
					$price = explode ('.',$price);
					$price1= $price[0];$price2="";
		                        if (isset ($price[1]))
		                        {
					$price2 = $price[1];
		                        }
					if(!$price2){$price2 = '00';}
					$sale = $currency;
					$sale .= $price[0];
					if ( $product->is_virtual() ) {
					$add_to_cart_text = apply_filters( 'not_purchasable_text', __( 'Read More', 'woocommerce' ) );
					$add_to_cart_url = apply_filters( 'add_to_cart_url', get_permalink( $id ) );
					} elseif ( $product->is_purchasable() ) {
					$add_to_cart_text= apply_filters( 'add_to_cart_text', __( 'Add to Cart', 'woocommerce' ) );
					$add_to_cart_url = get_site_url().'/?add-to-cart='.$id;
					} else {
					$add_to_cart_text= apply_filters( 'not_purchasable_text', __( 'Read More', 'woocommerce' ) );
					$add_to_cart_url = apply_filters( 'add_to_cart_url', get_permalink( $id ) );
					}
                   			$content.= '<div class="col-lg-3 col-sm-4"><div class="similar-related-div"><div class="tumbnails">';    
                   			$content.='<a id="'.get_the_id().'" href="'.get_permalink().'" title="'.get_the_title().'">';
                            		if ( $product->is_on_sale() ) : 
		                    	$content.= apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( $sale.'<sup>.'.$price2.'</sup> off', 'woocommerce' ) . '</span>', $product, $product );
					endif;
					if (has_post_thumbnail( $products->post->ID )) $content.= get_the_post_thumbnail($products->post->ID, array(220,240)); else $content.= '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder"/>';
					
					$content.='</a></div><div class="details-other-products">';
                        		$content.='<a href="'.get_the_permalink().'"><h3 class="inline_title">'.get_the_title().'</h3></a>';
                        		$content.='<div class="posted-by-div">'.e_shopper_posted_by().'</div>';
					
		          		$content.='<div class="row"><div class="col-md-5 col-xs-5 add-to-cart-div" style="padding-right: 0px;">'.apply_filters( 'woocommerce_loop_add_to_cart_link',sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="add-to-cart-button %s product_type_%s">%s</a>',
                esc_url( $add_to_cart_url ),
                esc_attr( $id ),
                esc_attr( $sku[0]),
                esc_attr( isset( $quantity ) ? $quantity : 1 ),
                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                esc_attr( $product->product_type ),
                esc_html( $add_to_cart_text )
        ),$product ).'</div>';

					
					
					if ( in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
                      			$content.= '<div class="wishlist col-md-4 col-xs-4" style="padding-left: 0px;">'.do_shortcode('[yith_wcwl_add_to_wishlist]') .'</div>';
					}
					$post_id = get_the_id();
					$content.='<div class="related-short-desc col-md-3 col-xs-3"><button data-target="#collapse-s'.$post_id.'" class="nav-toggle"><span class="glyphicon glyphicon-chevron-down"></span></button></div></div>';
				
        				$content.= '<div class="row"><div class="col-md-12"><div id="collapse-s'.$post_id.'" class="collapsible" style="display:none">'.get_post($post_id)->post_excerpt;
        				$content.='</div></div></div></div></div></div>';
					 ?>
