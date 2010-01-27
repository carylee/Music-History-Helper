<?php
class PlayerHelper extends AppHelper {
  var $helpers = array('Javascript', 'Html');
  var $components = array('Auth');
  function addjs() {
    $swf = '/flash/player.swf';
    $this->Javascript->link('audio-player', false);
    $this->Javascript->codeBlock("AudioPlayer.setup(\"$swf\", { 
      width: 200,
      transparentpagebg: \"yes\",
      });",
      array( 'inline' => false ));
  }

  // This should be changed to use codeBlock
  function embed( $urlList, $id=1, $user=0 ) {
    if(!empty($urlList)) {
      $urlList = $this->Javascript->escapeString($urlList);
      return $this->output("<p id=\"audioplayer_$id\">Flash disabled</p>
        <script type=\"text/javascript\">
        AudioPlayer.embed(\"audioplayer_$id\",{soundFile: \"$urlList\"});
        </script>");
    }
    else {
      $link = $this->Html->link('Unlock mp3 players', array(
        'controller' => 'users',
        'action' => 'unlock',
        $user));
      return $this->output("<p class='notverified'>$link</p>");
    }
  }
}
?>
