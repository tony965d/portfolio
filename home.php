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

<section class="mv-sub js-mv">
  <div class="mv-sub__inner">
  <div class="mv-sub__images">
    <div class="mv-sub__img">
      <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header5.jpg'))?>" alt="">
    </div>
    <div class="mv-sub__body">
      <h2 class="mv-sub__title">お知らせ</h2>
    </div>
  </div>
  </div>
</section>

<div class="wp-breadcrumb wp-breadcrumb--news inner">
  <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>

<section class="news top-news top-sub">
  <div class="news__inner news__inner--sub inner">
    <?php if (have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="news__contents news__contents--sub">
        <div class="news__content news__content--sub news-content">
          <time datetime="<?php the_time('Y.m.d') ?>" class="news-content__date news-content__date--sub"><?php the_time('Y.m.d') ?></time>
          <p class="news-content__category news-content__category--sub">
            <?php 
              $terms = get_the_terms($post->ID,'category');
                foreach ( $terms as $term ) {
                  echo $term->name ;
                }
              ?>
          </p>
        </div>
        <div class="news__body news__body--sub">
          <a href="<?php the_permalink(); ?>" class="news__text news__text--sub"><?php the_title(); ?></a>
        </div>
      </div>
    <?php endwhile; ?>
    <?php else: ?>
    <!-- 投稿が無い場合の処理 -->
    投稿がありません
    <?php endif; ?>

    <div class="page-nav page-nav--news inner">
      <?php if(function_exists("wp_pagenavi")) wp_pagenavi(); ?>
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

<?php get_footer(); ?>