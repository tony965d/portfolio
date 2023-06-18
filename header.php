<!DOCTYPE html>
<html lang="ja">
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />

  <?php wp_head(); ?>
</head>

<?php 
  $home = esc_url(home_url('/'));
  $news = esc_url(home_url( '/news' ));
  $concept = esc_url(home_url( '/concept' ));
  $liquor = esc_url(home_url( '/liquor' ));
  $about = esc_url(home_url( '/about' ));
  $blog = esc_url(home_url( '/blog' ));
  $contact = esc_url(home_url( '/contact' ));
?>

<body>
  <?php wp_body_open(); ?>  
  <header class="header js-header">
    <div class="header__inner">
      <div class="header__logo">
        <h1><a href="<?php echo $home ?>"><img src="<?php echo esc_url(get_theme_file_uri('../images/common/logo1.png')); ?>" alt=""></a></h1>
      </div>
      <div class="header__hamburger hamburger js-hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <nav class="header__pc-nav pc-nav">
        <ul class="pc-nav__items">
          <li class="pc-nav__item"><a href="<?php echo $news ?>">NEWS</a></li>
          <li class="pc-nav__item"><a href="<?php echo $concept ?>">CONCEPT</a></li>
          <li class="pc-nav__item"><a href="<?php echo $liquor ?>">LIQUOR</a></li>
          <li class="pc-nav__item"><a href="<?php echo $about ?>">ABOUT</a></li>
          <li class="pc-nav__item"><a href="<?php echo $blog ?>">BLOG</a></li>
          <li class="pc-nav__item"><a href="<?php echo $contact ?>">CONTACT</a></li>
        </ul>
      </nav>
      <nav class="header__sp-nav sp-nav js-sp-nav">
        <ul class="sp-nav__items">
          <li class="sp-nav__item"><a href="<?php echo $home ?>">TOP</a></li>
          <li class="sp-nav__item"><a href="<?php echo $news ?>">NEWS</a></li>
          <li class="sp-nav__item"><a href="<?php echo $concept ?>">CONCEPT</a></li>
          <li class="sp-nav__item"><a href="<?php echo $liquor ?>">LIQUOR</a></li>
          <li class="sp-nav__item"><a href="<?php echo $about ?>">ABOUT</a></li>
          <li class="sp-nav__item"><a href="<?php echo $blog ?>">BLOG</a></li>
          <li class="sp-nav__item"><a href="<?php echo $contact ?>">CONTACT</a></li>
        </ul>
      </nav>
    </div>
  </header>
  


