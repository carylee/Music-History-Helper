<fieldset>
  <legend>Login</legend>
<?php
$session->flash('auth');
echo $form->create('User', array('action' => 'login'));
echo $form->input('username', array('label' => 'email', 'value'=>$email));
echo $form->input('password');
echo $form->end('Login');
?>
</fieldset>
