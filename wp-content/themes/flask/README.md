Flask theme for WordPress
===

Flask is an elegant and highly configurable theme for bloggers with a clean, minimalist design that focuses on typography and compatibility with smartphones and tablets.  It features AJAX page loading and comments, several custom page templates, the ability to include a logo in the header, and left-swipe menu access for mobile and touch-enabled devices.  Through the WordPress customizer, users can configure fonts and font-sizes, page layout, social media integration, and more.  Flask also integrates seamlessly with popular plugins including Contact Form 7, Jetpack Contact Forms, and the WooCommerce e-commerce package.

Key Features in Flask
---------------------

* Clean, minimalist design that focuses on readability and image display.
* Sidebar, alternate sidebar, and footer widget areas.
* Several custom page templates including two full-width templates.
* Extensive customizability, including: 
    * The ability to change fonts and font sizes
    * The ability to choose where the sidebar is located by default (or if it should appear at all)
    * The ability to choose whether full posts or excerpts should appear on the blog page, on archive pages, and in searches
    * The ability to add links to your social media profiles
    * The ability to decide whether to display 'share this' links in posts and on pages
    * Space to include a custom site license
* The ability to use a custom logo in addition to, or instead of, the site's usual header text.
* Content-loading (where appropriate) that does not require reloading the whole page (AJAX page loading).
* The latest HTML5 and CSS3 for maximum compatibility and SEO.
* Integration with Contact Form 7 and Jetpack Contact Forms (two of the most popular contact-form plugins for WordPress).
* Seamless integration with the WooCommerce e-commerce package.

For Developers
--------------

Flask is designed to facilitate easy customization through plugins and child themes.  Flask features twelve custom action hooks that allow easy additions to almost any part of the theme from the top of the body, to the header, to the main content, to the site's very bottom:

* flask_before_the_page
* flask_before_the_header
* flask_in_the_header_before_the_inner
* flask_in_the_header
* flask_after_the_header
* flask_top_of_the_content
* flask_top_of_the_primary
* flask_bottom_of_the_content
* flask_above_the_footer
* flask_in_the_footer
* flask_after_the_footer
* flask_after_the_page

In addition, most of Flask's functions are wrapped in 'if' statements, allowing you to easily create drop-in replacements for almost anything in the theme.

Tips and Instructions
---------------------

*Sticky Posts* - Sticky posts for which featured images have been defined are transformed into attention-grabbing featured posts that sit at the top of your blog's home.  If you have not included a featured image, sticky posts will still be displayed at the top, but will look more or less like ordinary blog posts.

*Page Templates* - Several page templates are available with Flask, and can be accessed on the righthand sidebar of the New or Edit Page screen in the WordPress admin area.

*Alternate Sidebar* - In the widgets setup area, you will see an alternate sidebar.  To display this sidebar instead of the primary sidebar, choose the 'Alternate Sidebar' page template.

*Footer Widget Areas* - In the widgets setup area, you will see four possible footer widget areas.  For best results, each of these should have only one widget in them.  The theme can see how many footer widget areas are full, and will adjust their positioning for optimal layout.  There is no need to fill all four, but we would recommend that you fill at least two.

*WooCommerce Integration* - In addition to stylistic integration, Flask will use WooCommerce breadcrumbs, when they are available, to replace page titles for archives and searches. This may create some small SEO advantage. But it will certainly create a more unified feel for the site.

*VideoPress* - Unfortunately, because it is incompatible with AJAX page loading, VideoPress is disabled in this theme.  YouTube, Vimeo, and other video services should not be affected.

Credit Where Credit is Due
--------------------------

The Flask theme was based initially on the Underscores starter theme by Automattic.  Underscores is awesome and deserves a huge round of applause.

Changelog
---------
1.0.0 - Welcome to the first version of Flask!
