<?php 
$player->addjs();
?>
<div class="responses view">
<h2><?php  __('Notes for song');?></h2>
<h3><?php  __($response['Song']['title']);?></h3>
<h4><?php  __($response['Song']['composer']);?></h4>
  <?php echo $player->embed($response['Song']['mp3list'], 1, $response['User']['id']); ?>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Genre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($response['Response']['genre'], array('controller' => 'responses', 'action' => 'index', 'genre'=>$response['Response']['genre'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Period'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($response['Response']['period'], array('controller' => 'responses', 'action' => 'index', 'period'=>$response['Response']['period'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Language'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($response['Response']['language'], array('controller' => 'languages', 'action' => 'view', 'language'=>$response['Response']['language'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Instrumentation'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $response['Response']['instrumentation']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Texture'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $response['Response']['texture']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Function'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $response['Response']['function']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $response['Response']['notes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $response['Response']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Notes', true), array('action' => 'edit', $response['Response']['id'])); ?> </li>
		<li><?php echo $html->link(__('See all pieces', true), array('action' => 'index')); ?> </li>
	</ul>
</div>
