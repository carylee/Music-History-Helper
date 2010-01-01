<fieldset>
<legend>Give songs to user</legend>
<?php
echo $form->create(false, array('action'=>'grantSongs'));
echo $form->input('quarter', array('options' => 
  array(1=>'Fall',2=>'Winter',3=>'Spring')));
echo $form->input('user_id', array('type'=>'hidden','value'=>$userId));
echo $form->end('Submit');
?>
</fieldset>
