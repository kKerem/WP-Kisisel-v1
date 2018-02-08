<div class="genis-tekil">
<?php if ( has_post_thumbnail() ) {
  echo '<a href="'; the_post_thumbnail_url(); echo '" target="_blank">';
  the_post_thumbnail('thumbnail',['class' => 'thumbnail-foto']);
  echo '</a>'; } ?>

<?php the_content(''); ?>

<center class="dugmeler">
<?php if ( ! post_password_required() ) : if(!empty(get_post_meta($post->ID, "onizleme", true))): ?>
<a href="<?php echo get_post_meta($post->ID, "onizleme", true); ?>" class="onizleme" target="_blank">Önizleme</a>
<?php endif; ?>
<?php if(!empty(get_post_meta($post->ID, "kaynak", true))): ?>
<a href="<?php echo get_post_meta($post->ID, "kaynak", true); ?>" class="kaynak" target="_blank"
<?php if(empty(get_post_meta($post->ID, "onizleme", true))): ?>style="float:left !important"<?php endif; ?>>Kod Kaynağı</a>
<?php endif; ?>
<?php if(!empty(get_post_meta($post->ID, "indir", true))): ?>
<a href="<?php echo get_post_meta($post->ID, "indir", true); ?>" class="indir">Dosyaları İndir</a>
<?php endif; ?>
<?php endif; ?>
</center>

<div class="sil"></div>

</div>
