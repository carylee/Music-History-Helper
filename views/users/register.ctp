<div class="user registration form">
<?php echo $form->create('User', array('action'=>'register'));?>
	<fieldset>
 		<legend><?php __('Register');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('username', array('label'=>'Email address'));
		echo $form->input('password', array('value'=>''));
		echo $form->input('account', array('type'=>'hidden', 'value'=>$op));
		//echo $form->input('password_confirm', array('type'=>'password'));
    /*echo $form->input('account', array(
      'legend' => 'Would you like to register a full account?',
      'options' => array('Yes please, take me to the payment page', 'Not yet, just a trial for now'),
      'type' => 'radio',
      'value' => 0,
    ));*/
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
