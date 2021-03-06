<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />        
        <!--[if gte IE 9]>
                <script type="text/javascript">
                        Cufon.set('engine', 'canvas');
                </script>
        <![endif]-->
        <?php
        wp_head();
        ?>
    </head>
    <body  <?php body_class(); ?> >
        <div class="top_cornor"></div>
        <div class="body-content">
            <!--Start Container-->
            <div class="container_24">
                <!--Start Header Wrapper-->
                <div class="grid_24 header_wrapper">
                    <!--Start Header-->
                    <div class="header">
                        <div class="grid_14 alpha">
                            <div class="logo"> 
                                <?php if (inkthemes_get_option('inkthemes_logo') != '') { ?>
                                    <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo inkthemes_get_option('inkthemes_logo'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
<?php } else { ?>
                                    <hgroup>
                                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                        <h4 class="site-description"><?php bloginfo('description'); ?></h4>
                                    </hgroup>
<?php } ?>
                            </div>
                        </div>
                        <div class="grid_10 omega">
                            <div class="top_right_bar">
                                <ul class="social_logos">
                                    <?php if (inkthemes_get_option('inkthemes_facebook') != '') { ?>
                                        <li class="facebook"><a href="<?php echo esc_url(inkthemes_get_option('inkthemes_facebook')); ?>"><span></span></a></li>
                                    <?php } ?>
                                    <?php if (inkthemes_get_option('inkthemes_upon') != '') { ?>
                                        <li class="upon"><a href="<?php echo esc_url(inkthemes_get_option('inkthemes_upon')); ?>"><span></span></a></li>
                                    <?php } ?>
                                    <?php if (inkthemes_get_option('inkthemes_rss') != '') { ?>
                                        <li class="rss"><a href="<?php echo esc_url(inkthemes_get_option('inkthemes_rss')); ?>"><span></span></a></li>
                                    <?php } ?>
                                    <?php if (inkthemes_get_option('inkthemes_twitter') != '') { ?>
                                        <li class="twitter"><a href="<?php echo esc_url(inkthemes_get_option('inkthemes_twitter')); ?>"><span></span></a></li>
                                <?php } ?>
                                </ul>
<?php get_search_form(); ?>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <!--Start Menu wrapper-->
                        <div class="menu_wrapper">
                            <!--Start menu-div-->
<?php inkthemes_nav(); ?>
                            <!--End menu-div-->
                        </div>
                        <!--End Menu wrapper-->
                    </div>
                    <!--End Header-->
                </div>
                <!--End Header Wrapper-->
                <div class="clear"></div>
