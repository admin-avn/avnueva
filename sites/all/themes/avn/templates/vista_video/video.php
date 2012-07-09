<?php
function print_video_youtube($url, $width, $height) {
$video = <<<EOF
        <object width=$width height=$height>
        <param name="movie" value="$url"</param>
        <param name="allowFullScreen" value="true"></param>
        <param name="allowScriptAccess" value="always"></param>
        <embed src="$url" 
                type="application/x-shockwave-flash"
                allowfullscreen="true"
                allowscriptaccess="always"
                width=$width height=$height>
        </embed>
        </object>
EOF;
return $video;
}

function video($url, $play, $width, $height, $image) {
        if(!empty($url)) {
                $is_youtube = substr_count($url, "youtube");
                if($is_youtube != 0) {
                        $url_video_youtube = explode("%3D", $url);
                        if($play == "reproducir") {
                                $url_video = 'http://www.youtube.com/v/' . $url_video_youtube[1] . '&autoplay=1';
                        } else {
                                $url_video = 'http://www.youtube.com/v/' . $url_video_youtube[1];
                        }
                        return print_video_youtube($url_video, $width, $height);
                } else {
                        return print_video_flowplayer($url, $play, $width, $height, $image);
                }
        }
}
?>
