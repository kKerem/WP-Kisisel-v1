<?php get_header(); ?>
<div id="govde">
<div class="sol">
  <div class="govde3baslik"><i class="fa fa-list-ul" aria-hidden="true"></i> <?php single_cat_title(); ?></div>
</div>
<div class="sag responsiveSag">
  <?php if($wp_query->found_posts>0) : ?>
  <span class="kactane">Toplam <strong><?php echo $wp_query->found_posts; ?></strong></span>
  <?php endif; ?>
</div>
<div class="sol">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'sayfalama', 'genis' ); ?>
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
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
