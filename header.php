<?php
$template_directory_uri = get_template_directory_uri();
$logo_header_img_path = '/assets/images/logo-header.png?';
$logo_header_path = $template_directory_uri . $logo_header_img_path . filemtime(get_template_directory() . $logo_header_img_path);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta name="description" content="多数の学習参考書を執筆し、リクルート・スタディサプリ講師を務める代表・神﨑史彦が監修・指導する小論文塾（総合型・学校推薦型選抜対策塾）です。">
  <meta name="keywords" content="学習塾,小論文,高校入試">
  <?php wp_head(); ?>
</head>

<body>
  <header class="header fixed w-screen flex justify-around">
    <nav class="header-logo mt-5">
      <a href="#">
        <img src="<?php echo $logo_header_path ?>" alt="" width="175px" height="25px">
      </a>
    </nav>
    <nav class="flex flex-col mt-5">
      <div class="c-button-square">
        <div class="c-button-square__square"></div>
        <div class="c-button-square__square"></div>
        <div class="c-button-square__square"></div>
        <div class="c-button-square__square"></div>
      </div>
      <P>menu</P>
    </nav>
  </header>