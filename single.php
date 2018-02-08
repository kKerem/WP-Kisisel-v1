<?php get_header(); wpb_set_post_views(get_the_ID()); ?>
<div id="govde">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="sol">
<?php get_template_part( 'nav', 'kategorikonum' ); ?>

<?php if(is_admin): ?>
<div class="yetkiliAlan">
<?php edit_post_link('<i class="fa fa-pencil" aria-hidden="true"></i> Yazıyı Düzenle'); ?>
</div>
</div>
<?php endif; ?>

<ul class="istatistik">
  <li><i class="fa fa-eye" aria-hidden="true"></i> Izlenim<span><?php echo wpb_get_post_views(get_the_ID()); ?></span></li>
  <li><?php do_action( 'nice_likes_custom' ); ?></li>
</ul>

<div class="sol">
<?php get_template_part( 'sayfalama', 'normal' ); ?>

<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>


</div>
<?php get_sidebar(); ?>


</div>
<?php get_footer(); ?>
