<?php
class PlayerHelper extends AppHelper {
  function embed( $urlList, $id=1 ) {
    $songPath = "/Users/cary/Music/";
    $embedCode = "<p id=\"audioplayer_$id\">Flash disabled</p>\n";
    $embedCode .= "<script type=\"text/javascript\">\n";
    $embedCode .= "AudioPlayer.embed(\"audioplayer_$id\", ";
    $embedCode .= "{soundFile: \"" . $songPath . $urlList . "\"});\n";
    $embedCode .= "</script>";
    return $this->ouput($embedCode);
  }
}
?>
