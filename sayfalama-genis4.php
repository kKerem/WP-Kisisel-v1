<div class="kutu-icerik genis4">
        <a href="<?php the_permalink(); ?>">
          <h1><?php
          $str=str_replace( 'TF2 Turkiye :: ', '', get_the_title());
          echo mb_strimwidth( $str,0,33, '...' ); ?></h1>
          <?php
          if(!empty($post->post_excerpt)) {
            echo "<p>".mb_strimwidth( get_the_excerpt(), 0,32, '...' )."</p>";
          }
          else {
            if(!empty($post->post_content)) {
              echo "<p>".mb_strimwidth( get_the_excerpt(), 0,32, '...' )."</p>";
            }
            else {
              echo "<p>x</p>";
            }
          }
          ?>
      </a>

    <span class="bilgi">
      <?php
      etiket();
       ?></span>
      <span class="bilgi">
        <i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number( '0', '1', '%' ); ?>  
        <i class="fa fa-eye" aria-hidden="true"></i> <?php echo wpb_get_post_views(get_the_ID()); ?>
      </span>
</div>
