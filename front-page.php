<?php get_header(); ?>

<?php 
  $home = esc_url(home_url('/'));
  $news = esc_url(home_url( '/news' ));
  $concept = esc_url(home_url( '/concept' ));
  $liquor = esc_url(home_url( '/liquor' ));
  $about = esc_url(home_url( '/about' ));
  $blog = esc_url(home_url( '/blog' ));
  $contact = esc_url(home_url( '/contact' ));
?>

<section class="mv js-mv">
  <div class="mv__inner">
    <div class="mv__images">
      <div class="swiper js-mv-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="slide-img mv__img">
              <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header1.jpg')) ?>" alt="">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slide-img mv__img">
              <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header2.jpg')) ?>" alt="">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slide-img mv__img">
              <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header3.jpg')) ?>" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="mv__body">
        <h2 class="mv__title">Islay Malt Whisky</h2>
        <p class="mv__subtitle">アイラ島で造られているシングルモルトウイスキー</p>
      </div>
    </div>
  </div>
</section>

<section class="news top-news">
  <div class="news__inner inner">

    <?php
      $news_query = new WP_Query(
        array(
          'post_type'      => 'post',
          'posts_per_page' => 3,
        )
      );
    ?>
    <?php if ( $news_query->have_posts() ) : ?>
    <?php while ( $news_query->have_posts() ) : ?>
    <?php $news_query->the_post(); ?>

    <div class="news__contents">
      <div class="news__content news-content">
        <time datetime="<?php the_time('Y.m.d') ?>" class="news-content__date"><?php the_time('Y.m.d') ?></time>
        <p class="news-content__category">
          <?php
            $terms = get_the_terms($post->ID,'category');
            foreach($terms as $term) {
              echo $term->name ;
            }
          ?>
        </p>
      </div>
      <div class="news__body">
        <a href="<?php the_permalink(); ?>" class="news__text"><?php the_title(); ?></a>
      </div>
    </div>
    
    <?php wp_reset_postdata(); ?>
    <?php endwhile; ?>
    <?php endif; ?>
    <div class="news__btn">
      <a href="<?php echo $news ?>" class="button button--news">すべて見る</a>
    </div>
  </div>
</section>


<section class="content top-content">
  <div class="content__inner inner">
    <div class="content__header section-header">
      <h2 class="section-header__title">概念</h2>
      <div class="section-header__subtitle">CONCEPT</div>
    </div>
  </div>
  <div class="content__cards">
    <a href="<?php echo esc_url(home_url('/concept/#concept1')); ?>" class="content__card content-card scroll-fade-left">
      <div class="content-card__images">
        <img src="<?php echo esc_url(get_theme_file_uri('../images/common/concept2.jpg')) ?>" alt="">
      </div>
      <div class="content-card__body">
        <p class="content-card__text">MADE</p>
      </div>
    </a>
    <a href="<?php echo esc_url(home_url('/concept/#concept2')); ?>" class="content__card content-card scroll-fade-left">
      <div class="content-card__images">
        <img src="<?php echo esc_url(get_theme_file_uri('../images/common/concept3.jpg')) ?>" alt="">
      </div>
      <div class="content-card__body">
        <p class="content-card__text">FEATURE</p>
      </div>
    </a>
    <a href="<?php echo esc_url(home_url('/concept/#concept3')); ?>" class="content__card content-card scroll-fade-left">
      <div class="content-card__images">
        <img src="<?php echo esc_url(get_theme_file_uri('../images/common/concept4.jpg')) ?>" alt="">
      </div>
      <div class="content-card__body">
        <p class="content-card__text">HISTORY</p>
      </div>
    </a>
  </div>
</section>

<section class="works top-works">
  <div class="works__inner inner">
    <div class="works__header section-header">
      <h2 class="section-header__title">お酒</h2>
      <div class="section-header__subtitle section-header__subtitle--right">LIQUOR</div>
    </div>
  </div>
  <div class="works__bg">
    <div class="works__contents inner">
      <div class="works__images">
        <div class="works__wrapper">
          <div class="swiper js-works-Swiper">
            <div class="swiper-wrapper">

            <?php
              $news_query = new WP_Query(
                array(
                  'post_type'      => 'liquor',
                  'posts_per_page' => 3,
                  // 'orderby' => 'modified',
                )
              );
            ?>
            
            <?php if ( $news_query->have_posts() ) : ?>
            <?php while ( $news_query->have_posts() ) : ?>
            <?php $news_query->the_post(); ?>
            
              <div class="swiper-slide works__img">
                <!-- <img src="" alt="<?php the_title() ?>のアイキャッチ画像"> -->
                <?php if (has_post_thumbnail()) { ?>
                <?php the_post_thumbnail(); ?>
                <?php } ?>
              </div>
                    
            <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
            <?php endif; ?>

            </div>
          </div>
          <div class="swiper-pagination js-works-pagination"></div>
        </div>
      </div>
      
      <div class="content-body works__body inner">
        <h3 class="content-body__title">厳選されたウイスキー</h3>
        <p class="content-body__text">アイラ島で生産されているシングルモルトウイスキーを、現地の蒸留所やショップから店長が厳選してご提供しております。</p>
        <div class="content-body__btn">
          <a href="<?php echo $liquor; ?>" class="button">詳しく見る</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="overview top-overview">
  <div class="overview__inner inner">
    <div class="overview__header section-header">
      <h2 class="section-header__title">店舗情報</h2>
      <div class="section-header__subtitle section-header__subtitle--overview">ABOUT</div>
    </div>
  </div>
  <div class="overview__bg">
    <div class="overview__contents">
      <div class="overview__images scroll-fade-left">
        <img src="<?php echo esc_url(get_theme_file_uri('../images/common/about1.jpg')) ?>" alt="">
      </div>
      <div class="content-body overview__body inner">

        <h3 class="content-body__title">Islay Malt Whisky</h3>
        <p class="content-body__text">ウイスキーの知識や経験の少ない方でも、スタッフが専門知識を元にサポートします。今まで出会ったことないウイスキーに出会えるかもしれません。ウイスキーも全て最適な状態を保つよう品質管理いたしております。どうぞご利用下さいませ。</p>
        <div class="content-body__btn">
          <a href="<?php echo $about; ?>" class="button">詳しく見る</a>
        </div>
      </div>
    </div>
  </div>
</section>
  
<section class="blog top-blog">
  <div class="blog__inner inner">
    <div class="blog__header section-header">
      <h2 class="section-header__title">ブログ</h2>
      <div class="section-header__subtitle section-header__subtitle--right">Blog</div>
    </div>
    <div class="blog__cards cards">
      
      <?php
        $blog_query = new WP_Query(
          array(
            'post_type'      => 'blog',
            'posts_per_page' => 3,
          )
        );
      ?>
      <?php if ( $blog_query->have_posts() ) : ?>
      <?php while ( $blog_query->have_posts() ) : ?>
      <?php $blog_query->the_post(); ?>

        <a href="<?php the_permalink(); ?>" class="cards__item card">
          <div class="card__icon">
            
            <?php    
            $limit =2;
            $num = $blog_query->current_post;
            if ( $limit > $num ):
                echo '<div class="card__icon-text">New</div>';
            endif;
            ?>
          </div>
          
          <div class="card__img">
            <?php if (has_post_thumbnail()) { ?>
              <?php the_post_thumbnail(); ?>
              <?php } else { ?>
                <img src="<?php echo esc_url(get_theme_file_uri('../images/common/noimage.jpg')); ?>" alt="画像がありません">
            <?php } ?>
          </div>
          <div class="card__contents">
            <div class="card__content">
              <h3 class="card__title"><?php the_title(); ?></h3>
              <div class="card__text">
                <?php
                  if ( mb_strlen( $post->post_content, 'UTF-8' ) > 26 ) {
                    $content = mb_substr( strip_tags( $post->post_content ), 0, 26, 'UTF-8' );
                    echo $content . '…';
                  } else {
                    echo strip_tags( $post->post_content );
                  }
                ?>
              </div>
            </div>
            <div class="card__body">
              <div class="card__category">
                <?php 
                  $terms = get_the_terms($post->ID,'blog_category') ;
                  foreach($terms as $term) {
                    echo $term->name ;
                  }
                  ?>
                  
              </div>
              <time datetime="<?php the_time('Y.m.d'); ?>" class="card__date"><?php the_time('Y.m.d') ?></time>
            </div>
          </div>
        </a>
      
      <?php wp_reset_postdata(); ?>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <div class="blog__btn">
      <a href="<?php echo $blog; ?>" class="button button--blog">詳しく見る</a>
    </div>
  </div>
</section>

<section class="contact top-contact">
  <div class="contact__inner inner">
    <div class="contact__header section-header">
      <h2 class="section-header__title">お問い合わせ</h2>
      <div class="section-header__subtitle section-header__subtitle--top">Contact</div>
    </div>
    <div class="contact__content">
      <div class="contact__body">
        <p class="contact__text">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
      </div>
      <div class="contact__btn">
        <a href="<?php echo $contact ?>" class="button button--contact">お問い合わせへ</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer();  ?>