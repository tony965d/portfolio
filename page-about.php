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
      <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header6.jpg'))?>" alt="">
    </div>
    <div class="mv-sub__body">
      <h2 class="mv-sub__title">店舗情報</h2>
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

<section class="sub-overview top-sub--page">
  <div class="sub-overview__inner inner ">
    <div class="sub-overview__wrapper">
      <dl class="explain sub-overview__info">

        <?php
        $info = SCF::get('infomation');
        foreach ($info as $fields ) { ?>

        <div class="explain__block">
          <dt class="explain__header"><?php echo $fields['info_title']; ?></dt>
          <dd class="explain__description"><?php echo $fields['info_text']; ?></dd>
        </div>
        
        <?php }; ?>

        <!-- <div class="explain__block">
          <dt class="explain__header explain__header--establish">設立</dt>
          <dd class="explain__description">テキストが入ります。</dd>
        </div>
        <div class="explain__block">
          <dt class="explain__header">資本金</dt>
          <dd class="explain__description">テキストが入ります。</dd>
        </div>
        <div class="explain__block">
          <dt class="explain__header">売上高</dt>
          <dd class="explain__description">テキストが入ります。</dd>
        </div>
        <div class="explain__block">
          <dt class="explain__header">代表者</dt>
          <dd class="explain__description">テキストが入ります。</dd>
        </div>
        <div class="explain__block">
          <dt class="explain__header explain__header--sub">従業員数</dt>
          <dd class="explain__description">テキストが入ります。</dd>
        </div>
        <div class="explain__block">
          <dt class="explain__header explain__header--sub">事業内容</dt>
          <dd class="explain__description">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<span class="pc-text">テキストが入ります。</span></dd>
        </div>
        <div class="explain__block">
          <dt class="explain__header">所在地</dt>
          <dd class="explain__description">東京駅</dd>
        </div> -->
        
      </dl>
    </div>
  </div>
  <div class="sub-overview__map inner">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.654202854752!2d130.3933755!3d33.58832650000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3541918654212d3f%3A0x60a0fa291c807c2e!2z44CSODEwLTAwNDEg56aP5bKh55yM56aP5bKh5biC5Lit5aSu5Yy65aSn5ZCN77yS5LiB55uu77yS4oiS77yV77ySIO-8ku-8kO-8kO-8ke-8re-8tOODk-ODqw!5e0!3m2!1sja!2sjp!4v1679386466432!5m2!1sja!2sjp" 
      style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

      <!-- <dl class="explain">
        <div class="explain__block">
          <dt class="explain__header">会社名</dt>
          <dd class="explain__description">テキストが入ります</dd>
        </div>
      </dl> -->