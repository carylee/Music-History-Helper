<fieldset>
<legend>Request an account</legend>
<?php
echo $form->create(null, array('action'=>'requestAccount'));
echo $form->input('name');
echo $form->input('email');
echo $form->input('section', array('type'=>'radio', 'options'=>array('9:30am', '11:00am')));
echo $form->input('payment', array('type'=>'radio', 'options'=>array('Cash', 'Check', 'PayPal')));
echo $form->end('Send request');
?>
</fieldset>
