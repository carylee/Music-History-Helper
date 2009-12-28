<div class="songs view">
<h2><?php  __('Song');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $song['Song']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $song['Song']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Composer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($song['Composer']['name'], array('controller' => 'composers', 'action' => 'view', $song['Composer']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $song['Song']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $song['Song']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nawm'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $song['Song']['nawm']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Song', true), array('action' => 'edit', $song['Song']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Song', true), array('action' => 'delete', $song['Song']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $song['Song']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Songs', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Song', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Composers', true), array('controller' => 'composers', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Composer', true), array('controller' => 'composers', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Recordings', true), array('controller' => 'recordings', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Recording', true), array('controller' => 'recordings', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Responses', true), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Response', true), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Recordings');?></h3>
	<?php if (!empty($song['Recording'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Url'); ?></th>
		<th><?php __('Song Id'); ?></th>
		<th><?php __('Weight'); ?></th>
		<th><?php __('Cd'); ?></th>
		<th><?php __('Track'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($song['Recording'] as $recording):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $recording['id'];?></td>
			<td><?php echo $recording['url'];?></td>
			<td><?php echo $recording['song_id'];?></td>
			<td><?php echo $recording['weight'];?></td>
			<td><?php echo $recording['cd'];?></td>
			<td><?php echo $recording['track'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'recordings', 'action' => 'view', $recording['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'recordings', 'action' => 'edit', $recording['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'recordings', 'action' => 'delete', $recording['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recording['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Recording', true), array('controller' => 'recordings', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Responses');?></h3>
	<?php if (!empty($song['Response'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Song Id'); ?></th>
		<th><?php __('Genre Id'); ?></th>
		<th><?php __('Period Id'); ?></th>
		<th><?php __('Language Id'); ?></th>
		<th><?php __('Instrumentation'); ?></th>
		<th><?php __('Texture'); ?></th>
		<th><?php __('Notes'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($song['Response'] as $response):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $response['id'];?></td>
			<td><?php echo $response['user_id'];?></td>
			<td><?php echo $response['song_id'];?></td>
			<td><?php echo $response['genre_id'];?></td>
			<td><?php echo $response['period_id'];?></td>
			<td><?php echo $response['language_id'];?></td>
			<td><?php echo $response['instrumentation'];?></td>
			<td><?php echo $response['texture'];?></td>
			<td><?php echo $response['notes'];?></td>
			<td><?php echo $response['created'];?></td>
			<td><?php echo $response['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'responses', 'action' => 'view', $response['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'responses', 'action' => 'edit', $response['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'responses', 'action' => 'delete', $response['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $response['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Response', true), array('controller' => 'responses', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
