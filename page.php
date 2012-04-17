<?php get_header(); ?>
<section class="container">
    <div class="row main-content">
        <div class="eightcol content-area">
            <div class="padding">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="page" id="post-<?php the_ID(); ?>">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div><!-- end .page -->
                <?php endwhile; endif; ?>
            </div><!-- end .padding -->
        </div><!-- end .eightcol.content-area-->
    
        <?php get_sidebar(); ?>
    
    </div><!-- end .row.main-content -->
</section><!-- end .container -->
<?php get_footer(); ?>