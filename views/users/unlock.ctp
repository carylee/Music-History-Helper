<?php 
echo $javascript->link('webcam', false);
echo $html->css('webcam', false);
?>
<fieldset>
<legend>Unlock Mp3s</legend>
<p>In order to unlock the mp3 players, you must prove that you own a copy of the course CDs for this quarter. You may do so by sending in a "salute" - a picture of you with these CDs.  If your camera has a webcam, you may take a picture and submit it using the applet below. Otherwise, you must upload a file and submit it with this form.</p>
<?php
echo $form->create(null, array(
  'enctype' => 'multipart/form-data', 
  'action'=>'unlock',
  'name'=>'unlockform'));
?>
<div id="sidebyside">
<div id="generalinfo">
<?php echo $form->input('name', array('value'=>$name)); ?>
<?php echo $form->input('email', array('value'=>$email)); ?>
<?php echo $form->input('file', array('between'=>'<br>', 'type'=>'file', 'size'=>'17'));?>
<p class='helper'>jpeg images only, not needed if using webcam</p>
<?php echo $form->input('imageUrl');?>
</div>
<?php
$script = <<<EOD
webcam.set_api_url( '/scripts/webcam.php' );
webcam.set_quality( 90 ); // JPEG quality (1 - 100)
webcam.set_shutter_sound( true ); // play shutter click sound
EOD;

echo $javascript->codeBlock($script);
?>
<div id="webcam">
<?php
echo $javascript->codeBlock('document.write( webcam.get_html(320, 240, 640, 480) );');
?>
  <input type=button value="Take Snapshot" onClick="webcam.snap()">
  <input type=button value="Configure..." onClick="webcam.configure()">
  <!--<input type=button value="Reset" onclick="webcam.reset()">-->
</div>
</div>
<?php
$serverresponse = <<<EOD
webcam.set_hook( 'onComplete', 'my_callback_function' );
function my_callback_function(response) {
  document.getElementById('UserImageUrl').value = response;
  webcam.reset();
  
}
EOD;
echo $javascript->codeBlock($serverresponse);
echo $form->end('I salute!');
?>
</fieldset>
