<?php get_header(); ?>
<div id="govde">
  <div class="govde3baslik"><i class="fa fa-list-ul" aria-hidden="true"></i> <?php single_cat_title(); ?>
    <?php if($wp_query->found_posts>0) : ?>
    <span class="kactane">Toplam <strong><?php echo $wp_query->found_posts; ?></strong></span>
    <?php endif; ?>
  </div>
</div>
<?php if (!is_search()) { ?>

<?php } ?>
<div id="govde">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'sayfalama', 'dikey' ); ?>
  <?php endwhile; ?>
  <?php else : ?>
    <div class="kutu-icerik arama">
      <center>
        <p><?php _e( 'Henüz bir yazı yok.', 'blankslate' ); ?></p>
      </center>

    </div>
  <?php endif; ?>
  <?php if ( have_posts() ) : ?>
    <?php get_template_part( 'navigasyon', 'ana' ); ?>
  <?php endif; ?>


</div>
<?php get_footer(); ?>
