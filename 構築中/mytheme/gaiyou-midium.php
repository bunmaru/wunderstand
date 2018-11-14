<article <?php post_class("gaiyou"); ?>>
    <a href="<?php the_permalink(); ?>">
    <div class="gaiyou-inner">
        <figure><img src="<?php echo mythumb('midium') ?>" alt=""></figure>
        <div class="text">
            <h1> <?php the_title(); ?></h1>
            <div class="kiji-date">
                <span class="fas fa-pencil-alt"></span>
                <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                    投稿：<?php echo get_the_date(); ?>    
                </time>
            </div>
            <?php the_excerpt(); ?>
        </div>
    </div>
    </a>
    </article>