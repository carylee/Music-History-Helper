<?php 
$player->addjs();
?>
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
	<th><?php echo $paginator->sort('Song', 'Song.title');?></th>
	<th><?php echo $paginator->sort('Composer', 'Song.composer');?></th>
	<th><?php echo $paginator->sort('genre');?></th>
	<th><?php echo $paginator->sort('period');?></th>
	<th><?php echo $paginator->sort('language');?></th>
	<th><?php echo $paginator->sort('instrumentation');?></th>
	<th><?php echo $paginator->sort('texture');?></th>
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
			<?php echo $html->link($response['Song']['title'], array('controller' => 'responses', 'action' => 'view', $response['Response']['id'])); ?>
      <br />
      <?php echo $player->embed($response['Song']['mp3list'], $response['Response']['id']); ?>
		</td>
		<td>
			<?php echo $html->link($response['Song']['composer'], array_merge($this->passedArgs, array('composer'=>$response['Song']['composer']))); ?>
		</td>
		<td>
      <?php echo $html->link($response['Response']['genre'], array_merge($this->passedArgs, array('genre'=>$response['Response']['genre']))); ?>
		</td>
		<td>
			<?php echo $html->link($response['Response']['period'], array_merge($this->passedArgs, array('period'=>$response['Response']['period']))); ?>
		</td>
		<td>
			<?php echo $html->link($response['Response']['language'], array_merge($this->passedArgs, array('language'=>$response['Response']['language']))); ?>
		</td>
		<td>
			<?php echo $response['Response']['instrumentation']; ?>
		</td>
		<td>
			<?php echo $response['Response']['texture']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Details', true), array('action' => 'view', $response['Response']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $response['Response']['id'])); ?>
			<?php //echo $html->link(__('Delete', true), array('action' => 'delete', $response['Response']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $response['Response']['id'])); ?>
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
	</ul>
</div>
