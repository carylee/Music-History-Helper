<?php
class PlayerHelper extends AppHelper {
  var $helpers = array('Javascript');
  function addjs() {
    $this->Javascript->link('audio-player', false);
    $this->Javascript->codeBlock("AudioPlayer.setup(\"/flash/player.swf\", { width: 290 });",
      array( 'inline' => false ));
  }

  // This should be changed to use codeBlock
  function embed( $urlList, $id=1 ) {
    $songPath = "/Users/cary/Music/";
    $embedCode = "<p id=\"audioplayer_$id\">Flash disabled</p>\n";
    $embedCode .= "<script type=\"text/javascript\">\n";
    $embedCode .= "AudioPlayer.embed(\"audioplayer_$id\", ";
    $embedCode .= "{soundFile: \"" . $songPath . $urlList . "\"});\n";
    $embedCode .= "</script>";
    return $this->output("<p id=\"audioplayer_$id\">Flash disabled</p>
      <script type=\"text/javascript\">
      AudioPlayer.embed(\"audioplayer_$id\",{soundFile: \"$songPath$urlList\"});
      </script>");
  }
}
?>
