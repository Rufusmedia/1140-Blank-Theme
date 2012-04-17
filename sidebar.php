<div class="fourcol sidebar-area last">
    <div class="padding">
        <aside>
            <ul>
            <?php
            //displays on all pages
            if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) : ?>
            <?php endif; ?>
            </ul>
        </aside>
    </div><!-- end .padding -->
</div><!-- end .fourcol.sidebar-area.last -->