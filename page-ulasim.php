<?php /* Template Name: Ulaşım Formu */ ?>
<?php get_header(); wpb_set_post_views(get_the_ID()); ?>
<div id="govde">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'nav', 'kategorikonum' ); ?>

<ul class="istatistik">
  <li><i class="fa fa-eye" aria-hidden="true"></i> Görüntülenme<span><?php echo wpb_get_post_views(get_the_ID()); ?></span></li>
  <li><i class="fa fa-thumbs-up" aria-hidden="true"></i> Beğeni<span>0</span></li>
</ul>

<div class="sol">
<?php get_template_part( 'sayfalama', 'ulasim' ); ?>

<?php /* if ( ! post_password_required() ) comments_template( '', true ); */ ?>
<?php endwhile; endif; ?>
<?php
if ( ! post_password_required() ) comments_template( '', true ); ?>

</div>
<?php get_sidebar(); ?>


</div>
<?php get_footer(); ?>
