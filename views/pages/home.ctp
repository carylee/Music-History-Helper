<?php
echo $html->css('home.css'); ?>
<div id='title'>
  <h2 class='home'>Music History Helper</h2>
  <h1>The easy, effective, and efficient way to study for listening exams</h1>
</div>
<div id='info'>
  <div id="features">
    <h3>Study Smarter, Not Harder</h3>
    <h4>Learn this quarter's music by exploring the relationships between pieces, not by rote memorization</h4>
    <!--<h4>Take structured notes on pieces. When it comes time to study, use those notes to sort and filter them.</h4>-->
    <p>With the music history helper, your notes are more than just words on a page. They are tags that allow you to sort, filter, and navigate historical music.</p>
  <div id="register">
<?php echo $html->link('Register', array('controller'=>'users', 'action'=>'register')); ?>
  </div>
  </div>
  <div id="preview">
<?php echo $html->image('screenshot.png', array('alt'=>'Screenshot')) ?>
  </div>
</div>
