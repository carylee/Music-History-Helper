<div class="songs index">
<h2><?php __('Songs');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('composer_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('nawm');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($songs as $song):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $song['Song']['id']; ?>
		</td>
		<td>
			<?php echo $song['Song']['title']; ?>
		</td>
		<td>
			<?php echo $html->link($song['Composer']['name'], array('controller' => 'composers', 'action' => 'view', $song['Composer']['id'])); ?>
		</td>
		<td>
			<?php echo $song['Song']['created']; ?>
		</td>
		<td>
			<?php echo $song['Song']['modified']; ?>
		</td>
		<td>
			<?php echo $song['Song']['nawm']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $song['Song']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $song['Song']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $song['Song']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $song['Song']['id'])); ?>
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
		<li><?php echo $html->link(__('New Song', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Composers', true), array('controller' => 'composers', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Composer', true), array('controller' => 'composers', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Recordings', true), array('controller' => 'recordings', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Recording', true), array('controller' => 'recordings', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Responses', true), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Response', true), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
