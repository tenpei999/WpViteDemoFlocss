<?php
$template_directory_uri = get_template_directory_uri();

function get_image_path($file_name, $extension = 'png')
{
    global $template_directory_uri;
    $img_path = "/assets/images/{$file_name}.{$extension}?";
    $full_path = $template_directory_uri . $img_path . filemtime(get_template_directory() . $img_path);
    return $full_path;
}

$path_logo_png = get_image_path('82per', 'png');
$path_82per_png = get_image_path('82per', 'png');
$path_90per_png = get_image_path('90per', 'png');
$path_girl_png = get_image_path('girl', 'png');
$path_boy_png = get_image_path('boy', 'png');
$path_Asan_png = get_image_path('Asan', 'png');
$path_Bsan_png = get_image_path('Bsan', 'png');
$path_kanzaki_png = get_image_path('kanzaki', 'png');


?>
