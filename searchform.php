<div id="search-form">
    <form method="get" action="<?php bloginfo('url'); ?>/">
        <label for="s">Search: </label>
        <input type="text" id="s" name="s" value="<?php the_search_query(); ?>">
        <input class="submit" type="submit" value="Search">
    </form>
</div><!-- end .search-form -->