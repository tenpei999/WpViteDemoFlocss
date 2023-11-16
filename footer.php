<?php
$template_directory_uri = get_template_directory_uri();
$logo_footer_img_path = '/assets/images/logo-header.png?';
$logo_footer_path = $template_directory_uri . $logo_footer_img_path . filemtime(get_template_directory() . $logo_header_img_path);
?>

</main>

<footer class="c-background--gold py-9  px-30">
  <nav class="footer-logo">
    <a href="#">
      <img src="<?php echo $logo_footer_path ?>" alt="大学入試小論文指導カンザキジュク" width="175px" height="25px">
    </a>
  </nav>
  <div class="flex">
    <address>
      〒158-0094<br>
      東京都世田谷区玉川4丁目12-15<br>
      GranDuo二子玉川Ⅳ 1階<br>
      TEL: <a href="tel:+810364310415">03−6431−0415</a>
      (<time datetime="13:00">平日13:00</time>～<time datetime="17:00">17:00</time>)
    </address>
    <ul>
      <li><a href=""></a></li>
      <li><a href=""></a></li>
      <li><a href=""></a></li>
      <li><a href=""></a></li>
    </ul>

  </div>

</footer>
<?php wp_footer(); ?>
</body>

</html>