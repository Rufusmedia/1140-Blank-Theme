<?php get_header(); ?>
<section class="container">
    <div class="row main-content">
        <div class="eightcol content-area">
            <div class="padding">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="post" id="post-<?php the_ID(); ?>">
                    <h2><?php the_title(); ?></h2>
                    <div class="post-content">
                    <p class="post-meta">Posted on <?php the_time('F jS, Y'); ?> by <?php the_author(); ?> | <?php comments_number(); ?></p><!-- end .post-meta --> 
                    <?php the_content(); ?>
                    </div><!-- end .post-content -->
                    <p><?php edit_post_link('Edit', '', ''); ?></p>
                </article><!-- end .post -->
                <div class="comment-area">
                    <?php comments_template(); ?>
            
                    <div class="pagination">
                        <p><?php posts_nav_link('&nbsp;&bull;&nbsp;'); ?></p>
                    </div><!-- end .pagination -->
                </div><!-- end .comment-area -->
                <?php endwhile; endif; ?>          
            </div><!-- end .padding -->
        </div><!-- end .eleven.columns.content-area-->
    
        <?php get_sidebar(); ?>
    
    </div><!-- end .container.main-content -->
</section><!-- end .container -->
<?php get_footer(); ?>