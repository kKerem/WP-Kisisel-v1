<?php
$to = 'mail@adresi.com';

$isim = $_POST['isim'];
$mail = $_POST['mail'];

if (isset($_POST['submit'])) {
  wp_mail( 'mail@adresi.com', $_POST['konu'], $_POST['mesaj'], array('Content-Type: text/html; charset=UTF-8','Reply-To: '.$isim.' <'.$mail.'>',));
}
?>

<div class="genis-tekil">
<?php if ( has_post_thumbnail() ) {
  echo '<a href="'; the_post_thumbnail_url(); echo '" target="_blank">';
  the_post_thumbnail('thumbnail',['class' => 'thumbnail-foto']);
  echo '</a>'; } ?>

<?php the_content(''); ?>

<center class="dugmeler">
<?php if(!empty(get_post_meta($post->ID, "onizleme", true))): ?>
<a href="<?php echo get_post_meta($post->ID, "onizleme", true); ?>" class="onizleme" target="_blank">Önizleme</a>
<?php endif; ?>
<?php if(!empty(get_post_meta($post->ID, "kaynak", true))): ?>
<a href="<?php echo get_post_meta($post->ID, "kaynak", true); ?>" class="kaynak" target="_blank">Kod Kaynağı</a>
<?php endif; ?>
<?php if(!empty(get_post_meta($post->ID, "indir", true))): ?>
<a href="<?php echo get_post_meta($post->ID, "indir", true); ?>" class="indir">Dosyaları İndir</a>
<?php endif; ?>
</center>

<form class="ulasim" action="" method="post">
  <input type="text" name="isim" value="" placeholder="Adın ve Soyadın*">
  <input type="text" name="mail" value="" placeholder="E-Mail*"><br>
  <label for="mesaj">Mesajın</label>
  <input type="text" name="konu" value="" placeholder="Konu*">
  <textarea name="mesaj" rows="8" cols="80" placeholder="Konu içeriği*"></textarea>

  <button class="g-recaptcha" data-sitekey="6Le_Ei0UAAAAAHlAFgPypOlazRonyb-shSpEMN1_" data-callback="YourOnSubmitFn" name="submit">Mesajı Gönder</button>
</form>

<div class="sil"></div>

</div>
