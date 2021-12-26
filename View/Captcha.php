<?php
 $change_time = md5(microtime());
 $get_value = substr($change_time,0,6);
 // create image width and height
 $create_image = imagecreate(75,38);
 //background color in rgb
 imagecolorallocate($create_image,0,0,0);
 $text_color = imagecolorallocate($create_image,255,255,255);
 imagestring($create_image,5,10,10,$get_value,$text_color);
 //output
 header("Content-type:image/jpeg");
 imagejpeg($create_image);

?>