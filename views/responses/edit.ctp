<?php $player->addjs(); ?>
<div class="responses form">
<?php echo $form->create('Response');?>
	<fieldset>
 		<legend><?php __('Edit Response');?></legend>
    <h3><?php echo $response['Song']['title'];?></h3>
    <h4><?php echo $response['Song']['composer'];?></h4>
    <?php echo $player->embed($response['Song']['mp3list']); ?>
	<?php
		echo $form->input('id');
		echo $form->input('genre');
		echo $form->input('period');
		echo $form->input('language');
		echo $form->input('instrumentation');
		echo $form->input('texture');
		echo $form->input('notes');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
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
