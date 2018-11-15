<?php get_header(); ?>

<div class="sub-header">
    <div class="bread">
        <ol>
            <li><a href="<?php echo home_url(); ?>"><span class="fas fa-home ic-home"></span><span class="link-top">TOP</span></a></li>
            <li>検索結果</li>
        </ol>
    </div>
</div>

<div class="container">
    <div class="contents">
        <h1><?php echo get_search_query(); ?>に一致した記事</h1>

        <?php if(have_posts()):while(have_posts()):the_post();?>
            <?php get_template_part('gaiyou', 'midium'); ?>
        <?php endwhile; endif; ?>

        <div class="pagination pagination-index">
            <?php echo paginate_links(array(
                'type' => 'list',
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
                'end_size' => '2',
                'mid_size' => '3'
            )); ?>
        </div>
    </div>

    <div class="sub">
        <?php get_sidebar();?>
    </div>     
</div>
<?php get_footer(); ?>
<!-- test -->