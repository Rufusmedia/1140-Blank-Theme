<?php get_header(); ?>
<section class="container">
    <div class="row main-content">
        <div class="eightcol content-area">
            <div class="padding">
    
            <?php if (have_posts()) : ?>
            <?php $post = $posts[0]; // hack: set $post so that the_date() works ?>
            <?php if (is_category()) { ?>
            <h1>Archive for the &ldquo;<?php single_cat_title(); ?>&rdquo; Category</h1>
            <?php } elseif(is_tag()) { ?>
            <h1>Posts Tagged &ldquo;<?php single_tag_title(); ?>&rdquo;</h1>
            <?php } elseif (is_day()) { ?>
            <h1>Archive for <?php the_time('F jS, Y'); ?></h1>
            <?php } elseif (is_month()) { ?>
            <h1>Archive for <?php the_time('F, Y'); ?></h1>
            <?php } elseif (is_year()) { ?>
            <h1>Archive for <?php the_time('Y'); ?></h1>
            <?php } elseif (is_author()) { ?>
            <h1>Author Archive</h1>
            <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h1>Blog Archives</h1>
            <?php } ?>
    
            <?php while (have_posts()) : the_post(); ?>
            <article class="post" id="post-<?php the_ID(); ?>">
                <h1><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <p class="post-meta">Posted on <?php the_time('F jS, Y'); ?> by <?php the_author(); ?></p>
                <?php the_excerpt(); ?>	
                <p><?php edit_post_link('Edit', '', ''); ?></p>
            </article><!-- end .post -->
    
            <?php endwhile; ?>
    
            <div class="pagination">
                <p><?php posts_nav_link('&nbsp;&bull;&nbsp;'); ?></p>
            </div><!-- end .pagination -->
            
            <?php else : ?>
    
            <div>
                <h1>Not Found</h1>
                <p>Sorry, but the requested resource was not found on this site.</p>
                <?php get_search_form(); ?>
            </div>
    
            <?php endif; ?> 
    
            </div><!-- end .padding -->
        </div><!-- end .eightcol.content-area-->
    
        <?php get_sidebar(); ?>
        
    </div><!-- end .row.main-content -->
</section><!-- end .section -->
<?php get_footer(); ?>