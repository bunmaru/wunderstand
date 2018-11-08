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
            
            <?php if(has_post_thumbnail()): ?>
            <div class="catch">
                <?php the_post_thumbnail("large") ; ?>
            </div>
            <?php endif; ?>

            <?php the_content(); ?>

<div class="share">

<ul>
    <li><a href="" class="share_tw"><i class="fab fa-twitter"></i>twitterでシェア</a></li>
    <li><a href="" class="share_fb"><i class="fab fa-facebook"></i>facebookでシェア</a></li>
    <li><a href="" class="share_gp"><i class="fab fa-google-plus-square"></i>Google+ でシェア</a></li>
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