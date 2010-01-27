<?php 
$player->addjs();
//echo $javascript->link('prototype');
//echo $javascript->link('scriptaculous');
//$paginator->options(array('update' => 'content', 'indicator' => 'spinner'));
$paginator->options(array('url' => $this->passedArgs));
?>
<div class="responses index">
<h2><?php __('Pieces');?></h2>
<?php if(!$filters) {__('<p>Click on an attribute to filter</p>');};?>
<div class="actions">
  <?php if(count($filters) > 0) echo '<p>Songs currently filtered by</p>'; ?>
	<ul>
  <?php foreach($filters as $type=>$urlArgs): ?>
  <li><?php echo $type . ' ' . $html->link('[x]', $urlArgs); ?></li>
  <?php endforeach; ?>
	</ul>
  <?php if(count($filters) > 1) echo '<p>' . $html->link('View all songs', 'index') . '</p>'; ?>
</div>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% pieces out of %count% total, starting on piece %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('NAWM', 'Song.nawm');?></th>
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
			<?php echo $response['Song']['nawm']; ?>
		</td>
		<td>
      <?php echo $html->link($response['Song']['title'], 
          array('controller' => 'responses', 
                'action' => 'view', 
                $response['Response']['id']),
          null, null, false); ?>
      <br />
      <?php echo $player->embed($response['Song']['mp3list'], $response['Response']['id'], $response['User']['id']); ?>
		</td>
		<td>
<?php echo $html->link($response['Song']['composer'], 
array_merge($this->passedArgs, 
            array('composer'=>$response['Song']['composer'])),
null, null, false); ?>
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
			<?php echo $html->link($response['Response']['instrumentation'], array_merge($this->passedArgs, array('instrumentation'=>$response['Response']['instrumentation']))); ?>
		</td>
		<td>
			<?php echo $html->link($response['Response']['texture'], array_merge($this->passedArgs, array('texture'=>$response['Response']['texture']))); ?>
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
	<?php echo $paginator->prev('<< '.__('previous', true), null, null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', null, null, array('class' => 'disabled'));?>
</div>
