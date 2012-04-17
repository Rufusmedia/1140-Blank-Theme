<?php get_header(); ?>
<section class="container">
    <div class="row main-content">
        <div class="eightcol content-area">
            <div class="padding">
                <article class="post">
                    <div class="error-404">
                        <h1>404 Error!</h1>
                        <p>Sorry we couldn't find what you're looking for.  Where to go from here?</p>
                        <p><a href="<?php bloginfo('url') ?>/">Back to the home page</a></p>
                        <?php echo get_search_form(); ?>
                    </div><!-- end .fourofour -->
                </article><!-- end .post -->
            </div><!-- end .padding -->
        </div><!-- end .eightcol.content-area-->
    
        <?php get_sidebar(); ?>
    
    </div><!-- end .row.main-content -->
</section><!-- end .container -->
<?php get_footer(); ?>