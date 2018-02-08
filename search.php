<?php get_header(); ?>
<div id="govde">
<div class="sol">
<?php if ( have_posts() ) : ?>
  <div class="govde3baslik">
    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
      <i class="fa fa-search" aria-hidden="true"></i>
      <input type="text"
      placeholder="<?php echo esc_attr_x( 'Ara...', 'placeholder' ) ?>"
      value="<?php echo get_search_query(); ?>" name="s"
      title="<?php echo esc_attr_x( 'Arama Formu', 'label' ) ?>" />
      <input type="hidden" />
    </form>
  </div>
<?php else : ?>
  <div class="govde3baslik">
    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
      <i class="fa fa-search" aria-hidden="true"></i>
      <input type="text"
      placeholder="<?php echo esc_attr_x( 'Ara...', 'placeholder' ) ?>"
      value="" name="s"
      title="<?php echo esc_attr_x( 'Arama Formu', 'label' ) ?>" />
      <input type="hidden" />
    </form>
  </div>
<?php endif; ?>
</div>
<div class="sag responsiveSag">
  <?php if ( have_posts() ) : ?>
    <?php if($wp_query->found_posts>0) : ?>
    <span class="kactane">Toplam <strong><?php echo $wp_query->found_posts; ?></strong></span>
    <?php endif; ?>
  <?php endif; ?>
</div>
<div class="sol">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'sayfalama', 'genis' ); ?>
  <?php endwhile; ?>
    <?php get_template_part( 'navigasyon', 'ana' ); ?>

<?php else : ?>
  <div class="kutu-icerik arama">
    <center>
      <p><?php _e( 'Aradığına uygun birşey bulunamadı.', 'blankslate' ); ?></p>
    </center>

  </div>
<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
