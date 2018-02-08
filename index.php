<?php get_header(); ?>
 <script type="text/javascript" src="http://tf2turkiye.net/jscripts/sayac.js"></script>
  <div class="bgGovde" style="background-image: linear-gradient(to top, rgba(51, 51, 51, 0.75), rgba(51, 51, 51, 0.5)), url(<?php echo get_template_directory_uri(); ?>/img/bgGovde.png);">
      <div id="govde">
        <ul class="ista">
          <h1>TF2 Turkiye</h1>
          <?php /*while ($w=mysql_fetch_array($q)) :*/ ?>

            <li><span>12</span>Sunucu</li>
            <li><span>23</span>Yetkili</li>
            <li><span class="sayac"><?php /* echo $w['tfToplamOnline']; */?></span><span2>/<?php /* echo $w['tfMaxOyuncu']; */?></span2> <br>Aktif Oyuncu</li>
            <li><span>+1.2B</span>&nbsp;&nbsp;Tekil Oyuncu</li>
            <li><span>+1.5M</span>Kayıtlı oyuncu</li>
          <?php /* endwhile;
          mysql_close($b); */?>
        </ul>

        <div class="aciklama">
          FPS türünde oyuncu sayısıyla en büyük topluluklardan biri olan, <span id="zaman">2 yıl 5 ay 6 gün</span>dür varolan TF2 Turkiye aynı zamanda Team Fortress 2'nin gelmiş geçmiş en büyük türk topluluğu.
        </div>
      </div>
    </div>

    <div class="govde2">
      <div class="kutu-ana">
        <h1>Herkese Açık Kaynak Kod</h1>
        <h4><a href="https://opensource.org/" target="_blank">Open Source</a>'un destekçisiyim. Gelişimin emek paylaşımı ile katlanarak artması taraftarıyım.<br>2012'den beri her bitmiş projemin kodlarını herkese açık bir şekilde paylaşıyorum.</h4>
        <a href="<?php echo esc_url(get_category_link(get_cat_ID('Projeler'))); ?>" class="dugmeA">Bitmiş Projeler</a>
      </div>
    </div>

    <div id="govde">


      <!--<div class="kutu-ana kutu-sol">
        <div class="anakose">
        <h1>Düzen Savunucusu</h1>
        <h4>Karmaşık yazım dili adamın kendi yazdığını bile anlamamasına neden olabilir.<br>
        Yazdığınız kodlara hakim olma ve yazdıklarınızın başkaları tarafından anlaşılması için düzenli, açıklayıcı notlar alarak kod yazmak en büyük gerekliliğiniz olsun. Kendinize eziyet çektirmeyin.</h4>
        </div>
        <div class="zitkose">
          <i class="fa fa-code-fork" aria-hidden="true"></i>
        </div>
      </div>

      <div class="kutu-ana kutu-sol kutu-sag">
        <div class="anakose">
        <h1>Uyumluluk</h1>
        <h4>Farklı tarayıcı platformlarından farklı işletim sistemlerine kadar projeniz belirli bir güruhu hedeflemiyorsa hepsiyle uyumlu olması esastır. Günümüzde internetin kullanımının çoğunluğu mobilden olduğu için en başta <a href="#">Responsive</a>'e uygun olacak şekilde tasarlanmasında yarar var.</h4>
        </div>
        <div class="zitkose">
          <i class="fa fa-css3" aria-hidden="true"></i>
        </div>
      </div>-->

      <!--<div class="kutu-ana kutu-ista">
        <ul>
          <li>
            +<span class="sayac">58</span>B
            <span class="kucuk">SATIR</span>
            <span class="unvan">HTML</span>
          </li>
          <li>
            +<span class="sayac">87</span>B
            <span class="kucuk">SATIR</span>
            <span class="unvan">CSS</span>
          </li>
          <li>
            +<span class="sayac">12</span>B
            <span class="kucuk">SATIR</span>
            <span class="unvan">Js</span>
          </li>
          <li>
            +<span class="sayac">90</span>B
            <span class="kucuk">SATIR</span>
            <span class="unvan">PHP</span>
          </li>
          <li>
            +<span class="sayac">2</span>B
            <span class="kucuk">SATIR</span>
            <span class="unvan">C++</span>
          </li>
        </ul>
      </div>-->


      <div class="kutu-ana kutu-ara">
        <h1>Geliştirme Sürecindekiler</h1>
      <ul>
        <center>
      <?php $query = new WP_Query( array( 'posts_per_page' => 6, 'category_name' => 'proje' ) ); ?>

      <?php while ($query -> have_posts()) : $query -> the_post(); ?>
        <?php if ( have_posts() ) : ?>
          <?php get_template_part( 'sayfalama', 'genis4' ); ?>
        <?php else : ?>
          <div class="kutu-icerik arama">
            <center>
              <p><?php _e( 'Henüz bir yazı yok.', 'blankslate' ); ?></p>
            </center>

          </div>
        <?php endif; ?>


      <?php
      endwhile;
      wp_reset_postdata();
      ?>
      </center>
      </ul>
      <center>
        <div class="paginate-container">
    <div class="pagination">
      <a href="https://keremer.com.tr/k/proje/devameden/">Daha Fazla</a>  </div>
  </div>
      </center>
    </div>

      <div class="kutu-ana">
        <i class="fa fa-book" aria-hidden="true"></i>
        <h1>Sonsuz Bir Kütüphane</h1>
        <h4>Yazılımın bir sonu yok yapmamız gereken şey emek harcayarak tecrübe kazanmak,<br>
          kazanılan tecrübeyi başkasınında faydalanmasını sağlamak.<br><b>GitHub</b> ise bunun için harika bir araç.</h4>
        <a href="https://github.com" target="_blank" class="dugmeB"><i class="fa fa-github" aria-hidden="true"></i> GitHub</a>
      </div>

    </div>

<?php get_footer(); ?>
