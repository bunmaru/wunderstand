<?php get_header(); ?>
<div class="container">
    <div class="contents">
    <?php if(have_posts()):while(have_posts()):the_post();?>
        <article <?php post_class("kiji"); ?>>

        <div class="kiji-tags">
            <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
        </div>

            <h1> <?php the_title(); ?></h1>

            <div class="kiji-date">
                <span class="fas fa-pencil-alt"></span>
                <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                    投稿：<?php echo get_the_date(); ?>    
                </time>

                <?php if (get_the_modified_date('Ymd') > get_the_date('Ymd')): ?>
                |
                <time datetime="<?php echo get_the_modified_date('Y-m-d'); ?>">
                    更新日：<?php echo get_the_modified_date(); ?>    
                </time>
                <?php endif;?>
            </div>
            
            <?php if(has_post_thumbnail()): ?>
            <div class="catch">
                <?php the_post_thumbnail("large") ; ?>
            </div>
            <?php endif; ?>

            <?php the_content(); ?>
        </article>
    <?php endwhile; endif; ?>
    </div>
    <div class="sub">
        <?php get_sidebar();?>
    </div>     
</div>
<?php get_footer(); ?>