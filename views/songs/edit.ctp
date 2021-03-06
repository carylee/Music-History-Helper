<div class="songs form">
<?php echo $form->create('Song');?>
	<fieldset>
 		<legend><?php __('Edit Song');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('composer_id');
		echo $form->input('nawm');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Song.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Song.id'))); ?></li>
		<li><?php echo $html->link(__('List Songs', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Composers', true), array('controller' => 'composers', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Composer', true), array('controller' => 'composers', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Recordings', true), array('controller' => 'recordings', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Recording', true), array('controller' => 'recordings', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Responses', true), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Response', true), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
