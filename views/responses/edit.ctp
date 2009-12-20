<div class="responses form">
<?php echo $form->create('Response');?>
	<fieldset>
 		<legend><?php __('Edit Response');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('song_id');
		echo $form->input('genre_id');
		echo $form->input('period_id');
		echo $form->input('language_id');
		echo $form->input('instrumentation');
		echo $form->input('texture');
		echo $form->input('notes');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Response.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Response.id'))); ?></li>
		<li><?php echo $html->link(__('List Responses', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Songs', true), array('controller' => 'songs', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Song', true), array('controller' => 'songs', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Genres', true), array('controller' => 'genres', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Genre', true), array('controller' => 'genres', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Periods', true), array('controller' => 'periods', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Period', true), array('controller' => 'periods', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Languages', true), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Language', true), array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>
