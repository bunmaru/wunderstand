<?php get_header(); ?>
<div class="sub-header">
    <div class="bread">
        <ol>
            <li><a href="<?php echo home_url(); ?>"><span class="fas fa-home ic-home"></span><span class="link-top">TOP</span></a></li>
            <li>
                <?php if(has_category()): ?>   
                    <?php $postcat = get_the_category();
                    echo get_category_parents($postcat[0], true, '</li><li>');
                    endif;
                    ?>
                <a><?php the_title();?></a>
            </li>
        </ol>
    </div>
</div>

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
            
            <?php if(has_post_thumbnail() && $page==1): ?>
            <div class="catch">
                <?php the_post_thumbnail("large") ; ?>
            </div>
            <?php endif; ?>

            <?php the_content(); ?>

            <?php wp_link_pages(array(
                'before' => '<div class="pagination"><ul><li>',
                'separator' => '</li><li>',
                'after' => '</li></ul></div>',
                'pagelink' => '<span>%</span>'
            )); ?>

            <div class="share">
                <ul>
                    <li><a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title() . ' - ' . get_bloginfo('name') ); ?>&amp; url=<?php echo urlencode(get_permalink()); ?>&amp;via=ebisucom"
                    onclick="window.open(this.href,'SNS','width=500, height=300, menubar=no, toolbar=no, scrollbars=yes'); return false;" class="share_tw"><i class="fab fa-twitter"></i><span class="spnhdn">twitter</span>でシェア</a></li>
                    <li><a href="http://www.facebook.com/share.php?u=<?php echo urlencode( get_permalink() ); ?>"
                onclick="window.open(this.href, 'SNS', 'width=500, height=500, menubar=no, toolbar=no, scrollbars=yes'); return false;" class="share_fb"><i class="fab fa-facebook"></i><span class="spnhdn">facebook</span>でシェア</a></li>
                    <li><a href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink() ); ?>"
                onclick="window.open(this.href, 'SNS', 'width=500, height=500, menubar=no, toolbar=no, scrollbars=yes'); return false;" class="share_gp"><i class="fab fa-google-plus-square"></i><span class="spnhdn">Google+</span>でシェア</a></li>
                </ul>
            </div>

        </article>
    <?php endwhile; endif; ?>
    </div>
    <div class="sub">
        <?php get_sidebar();?>
    </div>     
</div>
<?php get_footer(); ?>