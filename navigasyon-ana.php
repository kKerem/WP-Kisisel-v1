<div class="paginate-container" >
  <div class="pagination">
    <?php if( get_previous_posts_link() ){
    previous_posts_link( 'Geri' );
    }
    else {
    echo '<span class="disabled">Geri</span>';
    }
    if( get_next_posts_link() ){
    next_posts_link( 'İleri' );
  }
  else {
    echo '<span class="disabled">İleri</span>';}
     ?>
  </div>
</div>
