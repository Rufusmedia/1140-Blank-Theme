<?php get_header(); ?>
<section class="container">
    <div class="row main-content">
        <div class="eightcol content-area">
            <div class="padding">
                <?php if (have_posts()) : ?>
        
                <div class="post" id="post-<?php the_ID(); ?>">
                        <h1>Search Results for &ldquo;<?php the_search_query(); ?>&rdquo;</h1>
                        <ol>	
                        <?php while (have_posts()) : the_post(); ?>		
                        <li>
                        <h3><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                        <?php the_excerpt(); ?>
                        </li>		
                        <?php endwhile; ?>	
                        </ol>
                </div><!-- end.post -->
                
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