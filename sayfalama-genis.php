<div class="kutu-icerik genis">
        <a href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('thumbnail');}  ?>
          <h1><?php echo mb_strimwidth(get_the_title(''),0,100,'...'); ?></h1>
        <p><?php echo wp_trim_words( get_the_content(), 50, '...' ); ?></p>
      </a>

    <span class="bilgi">
      <?php
      etiket();
       ?></span>
      <span class="bilgi">
        <i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number( '0', '1', '%' ); ?>  
        <i class="fa fa-eye" aria-hidden="true"></i> <?php echo wpb_get_post_views(get_the_ID()) ?>
      </span>
</div>
