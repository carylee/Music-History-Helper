<?php
class PlayerHelper extends AppHelper {
  var $helpers = array('Javascript');
  function addjs() {
    $swf = '/cakephp/flash/player.swf';
    $this->Javascript->link('audio-player', false);
    $this->Javascript->codeBlock("AudioPlayer.setup(\"$swf\", { 
      width: 200,
      transparentpagebg: \"yes\",
      });",
      array( 'inline' => false ));
  }

  // This should be changed to use codeBlock
  function embed( $urlList, $id=1 ) {
    //$songPath = "/staticmusic/";
    $urlList = $this->Javascript->escapeString($urlList);

    //foreach 

    return $this->output("<p id=\"audioplayer_$id\">Flash disabled</p>
      <script type=\"text/javascript\">
      AudioPlayer.embed(\"audioplayer_$id\",{soundFile: \"$urlList\"});
      </script>");
  }
}
?>
