<div class="kutu-icerik uzun">
        <a href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('large');}  ?>
          <h1><?php the_title(''); ?></h1>
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
