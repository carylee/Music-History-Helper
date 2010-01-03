<?php 
$javascript->link('prototype', false);
$javascript->link('scriptaculous', false);
echo $javascript->link('effects');
echo $javascript->link('controls');
$player->addjs(); 
?>
<div class="responses form">
<?php echo $form->create('Response');?>
	<fieldset>
 		<legend><?php __('Edit Notes for Piece');?></legend>
    <h3><?php echo $response['Song']['title'];?></h3>
    <h4><?php echo $response['Song']['composer'];?></h4>
    <?php echo $player->embed($response['Song']['mp3list']); ?>
	<?php
		echo $form->input('id');
  ?>
  <div id="shortanswers">
    <div class="input text">
      <label for="Genre">Genre</label>
      <?php echo $ajax->autoComplete('genre', '/genres/autoComplete'); ?>
    </div>
    <div class="input text">
      <label for="Period">Period</label>
      <?php echo $ajax->autoComplete('period', '/periods/autoComplete'); ?>
    </div>
    <div class="input text">
      <label for="Language">Language</label>
      <?php echo $ajax->autoComplete('language', '/languages/autoComplete'); ?>
    </div>
    <div class="input text">
      <label for="Instrumentation">Instrumentation</label>
      <?php echo $ajax->autoComplete('instrumentation', '/instrumentations/autoComplete'); ?>
    </div>
    <div class="input text">
      <label for="Texture">Texture</label>
      <?php echo $ajax->autoComplete('texture', '/textures/autoComplete'); ?>
    </div>
  </div>
  <div id="notes">
<?php
		//echo $form->input('language');
		//echo $form->input('instrumentation');
		//echo $form->input('texture');
    echo $form->input('notes', array('type'=>'textarea', 'rows'=>14));
	?>
  </div>
<?php echo $form->submit('Save');
/*echo $form->submit('Cancel');*/
echo $form->end();?>
	</fieldset>
</div>
<!--<div class="actions">
	<ul>
		<li><?php //echo $html->link(__('List Responses', true), array('action' => 'index'));?></li>
		<li><?php //echo $html->link(__('List Genres', true), array('controller' => 'genres', 'action' => 'index')); ?> </li>
		<li><?php //echo $html->link(__('New Genre', true), array('controller' => 'genres', 'action' => 'add')); ?> </li>
		<li><?php //echo $html->link(__('List Periods', true), array('controller' => 'periods', 'action' => 'index')); ?> </li>
		<li><?php //echo $html->link(__('New Period', true), array('controller' => 'periods', 'action' => 'add')); ?> </li>
		<li><?php //echo $html->link(__('List Languages', true), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php //echo $html->link(__('New Language', true), array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
