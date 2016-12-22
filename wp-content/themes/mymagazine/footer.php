<?php

?>
        </div>
        <!-- end .start .row -->
        
        <?php
        if ( is_active_sidebar( 'sidebar-2' ) ) {
        ?>
        <footer id="colophon" class="site-footer">
            <div class="row">
                
                    <?php dynamic_sidebar( 'sidebar-2' ); ?>
                
          </div><!-- .row -->
        </footer><!-- footer -->
        <?php } ?>
        </div><!-- End Wrapper -->
        <?php wp_footer(); ?>
    </body>
</html>