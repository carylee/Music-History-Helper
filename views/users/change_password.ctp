<div class="user password form">
<?php echo $form->create('User', array('action'=>'changePassword'));?>
	<fieldset>
 		<legend><?php __('Change password');?></legend>
	<?php
		//echo $form->input('username');
    $session->flash('auth');
		echo $form->input('old_password', array('type'=>'password'));
		echo $form->input('password', array('label'=>'New Password'));
		echo $form->input('confirm_password', array('type'=>'password'));
    echo $form->input('id', array('type'=>'hidden', 'value'=>$user['User']['id'] ) );
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
