<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Alico
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-hentry archive'); ?>>
    
    <?php if (has_post_thumbnail()) {
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
        echo '<div class="entry-featured">'; ?>
            <a href="<?php echo esc_url( get_permalink()); ?>" style="background-image: url(<?php echo esc_url($featured_img_url); ?>);"><?php the_post_thumbnail('full'); ?></a>
        <?php echo '</div>';
    } ?>
    <div class="entry-body">
        <div class="entry-holder">
            <h2 class="entry-title">
                <a href="<?php echo esc_url( get_permalink()); ?>">
                    <?php if(is_sticky()) { ?>
                        <i class="fa fa-thumb-tack"></i>
                    <?php } ?>
                    <?php the_title(); ?>
                </a>
            </h2>
            <?php alico_archive_meta(); ?>
            <div class="entry-excerpt">
                <?php
                    alico_entry_excerpt();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>
            <div class="entry-readmore">
                <a href="<?php echo esc_url( get_permalink()); ?>" class="btn-text">
                    <i class="fac fac-angle-right space-right"></i>
                    <span><?php echo esc_html__('Read more', 'alico'); ?></span>
                </a>
            </div>
        </div>
    </div>
</article><!-- #post -->