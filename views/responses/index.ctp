<?php $javascript->link('audio-player', false);
$javascript->link('audio-config', false); ?>
<div class="responses index">
<h2><?php __('Responses');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('song_id');?></th>
	<th><?php echo $paginator->sort('genre_id');?></th>
	<th><?php echo $paginator->sort('period_id');?></th>
	<th><?php echo $paginator->sort('language_id');?></th>
	<th><?php echo $paginator->sort('instrumentation');?></th>
	<th><?php echo $paginator->sort('texture');?></th>
	<th><?php echo $paginator->sort('notes');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
  <th>Mp3s</th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($responses as $response):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $response['Response']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($response['User']['id'], array('controller' => 'users', 'action' => 'view', $response['User']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($response['Song']['title'], array('controller' => 'songs', 'action' => 'view', $response['Song']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($response['Genre']['name'], array('controller' => 'genres', 'action' => 'view', $response['Genre']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($response['Period']['name'], array('controller' => 'periods', 'action' => 'view', $response['Period']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($response['Language']['name'], array('controller' => 'languages', 'action' => 'view', $response['Language']['id'])); ?>
		</td>
		<td>
			<?php echo $response['Response']['instrumentation']; ?>
		</td>
		<td>
			<?php echo $response['Response']['texture']; ?>
		</td>
		<td>
			<?php echo $response['Response']['notes']; ?>
		</td>
		<td>
			<?php echo $response['Response']['created']; ?>
		</td>
		<td>
			<?php echo $response['Response']['modified']; ?>
		</td>
    <td>
      <?php echo $player->embed($response['Song']['mp3list']); ?>
    </td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $response['Response']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $response['Response']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $response['Response']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $response['Response']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Response', true), array('action' => 'add')); ?></li>
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
