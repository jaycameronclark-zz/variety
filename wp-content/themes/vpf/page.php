<?php get_header(); ?>

<div class="outer-container">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php
    $sidebar_content = get_post_meta( get_the_ID(), '_cmb_page_sidebar_content', true );
    $sidebar_background = get_post_meta( get_the_ID(), '_cmb_page_sidebar_background', true);
    $columns;
    if (!empty($sidebar_content)){
        $columns = 'two-thirds';
    } else {
        $columns = 'full-width';
    }
    ?>
    <section class="page-default">
        <div class="content--main <?= $columns; ?>">
            <?php the_content(); ?>
            <?php edit_post_link(); ?>

            <?php endwhile; else: ?>
                <h2><?php _e( 'Sorry, nothing to display.', 'varietypetfoods' ); ?></h2>
            <?php endif; ?>

        </div>
        <?php if (!empty($sidebar_content)) : ?>
            <aside class="page-sidebar" style="background-image:url(<?= $sidebar_background; ?>)">
                <?= $sidebar_content; ?>
            </aside>
        <?php endif; ?>
    </section>
</div>

<?php get_footer(); ?>