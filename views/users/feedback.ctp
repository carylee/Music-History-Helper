<fieldset>
  <legend>Feedback</legend>
<?php
echo $form->create(null, array('action'=>'feedback'));
echo $form->input('name', array('value'=>$name));
echo $form->input('email', array('value'=>$email));
echo $form->input('feedback', array('type'=>'textarea'));
echo $form->end('Send');
?>
