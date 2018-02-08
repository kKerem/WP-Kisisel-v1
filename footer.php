<div class="sil"></div>

<footer>
  <div id="govde">

    <ul class="sol">
      2009 - <?php echo sprintf( __( '%1$s - <a href="%2$s" title="%3$s">keremer.com.tr</a>', 'blankslate' ), date( 'Y' ), get_bloginfo('url'), get_bloginfo('name')); ?>
    </ul>

    <?php wp_nav_menu(array(theme_location => 'altMenu', menu_id => false, menu_class => 'sag', container => '')); ?>

    <center>
    <a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logoAlt.png"></a>
    </center>

</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
