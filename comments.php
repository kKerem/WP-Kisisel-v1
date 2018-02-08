
<?php if( $post->comment_status == 'open' ) : ?>
  <?php
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    return;
?>
  <div class="yorumAlani">
    <?php comments_number('<label for="comment"><i class="fa fa-comments" aria-hidden="true"></i>Görüş Bildir</label>','<span><i class="fa fa-comments" aria-hidden="true"></i>1 Yorum</span>','<span><i class="fa fa-comments" aria-hidden="true"></i>% Yorum</span> <label for="comment"><span class="gorusBildir"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Görüş Bildir</span></label>'); ?></label>
  </div>
<section id="comments">
<?php
if (have_comments()):
    global $comments_by_type;
    $comments_by_type =& separate_comments($comments);
    if (!empty($comments_by_type['comment'])):
?>
<section id="comments-list" class="comments">
<?php
        if (get_comment_pages_count() > 1):
?>
<?php
        endif;
?>
<ul>

  <?php wp_list_comments( 'type=comment&callback=mytheme_comment&avatar_size=64' ); ?>
</ul>
  <div class="paginate-container" >
    <div class="pagination">
      <?php
      if( get_previous_comments_link() ){
      previous_comments_link( 'Geri' );
      }
      else {
      echo '<span class="disabled">Geri</span>';
      }
      if( get_next_comments_link() ){
      next_comments_link( 'İleri' );
      }
      else {
      echo '<span class="disabled">İleri</span>';}
      ?>
    </div>
 </div>
<?php
        if (get_comment_pages_count() > 1):
?>
<nav id="comments-nav-below" class="comments-navigation" role="navigation">

</nav>
<?php
        endif;
?>
</section>
<?php
    endif;
    if (!empty($comments_by_type['pings'])):
        $ping_count = count($comments_by_type['pings']);
?>
<section id="trackbacks-list" class="comments">
<h3 class="comments-title"><?php
        echo '<span class="ping-count">' . $ping_count . '</span> ' . ($ping_count > 1 ? __('Trackbacks', 'blankslate') : __('Trackback', 'blankslate'));
?></h3>
<ul>
<?php
        wp_list_comments('type=pings&callback=blankslate_custom_pings');
?>
</ul>
</section>
<?php
    endif;
endif;
if (comments_open())
{
  $args = array(
  'id_form'           => 'commentform',
  'class_form'      => 'yorumyaz',
  'id_submit'         => 'submit',
  'class_submit'      => 'submit',
  'name_submit'       => 'submit',
  'title_reply'       => __( '' ),
  'title_reply_to'    => __( 'Leave a Reply to %s' ),
  'cancel_reply_link' => __( '<i class="fa fa-times" aria-hidden="true"></i> Alıntıyı iptal et' ),
  'label_submit'       => 'Yorumu Gönder',
  'format'            => 'xhtml',

  'comment_field' =>  '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Yorumunu buraya yaz...">' .
    '</textarea>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' . get_avatar( $current_user->user_email, 48 ) .
    sprintf(
    __( '<a href="%1$s">%2$s</a> olarak giriş yapılmış. <a href="%3$s" title="Hesaptan Çıkış Yap" class="link"><i class="fa fa-sign-out" aria-hidden="true"></i> Çıkış Yap</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '',

    'fields' => apply_filters(
  		'comment_form_default_fields', array(
  			'author' =>'<input id="author" placeholder="İsim" name="author" type="text" value="' .
  				esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'
  				,
  			'email'  => '<input id="email" placeholder="E-Posta (Yayınlanmayacak)" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
  				'" size="30"' . $aria_req . ' />'
  		)
  	),
);
  echo '<div id="yorumGovde">'.
  comment_form($args, $post_id ).'</div>';
}
?>

</section>
<?php endif; ?>
