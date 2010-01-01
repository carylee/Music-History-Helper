<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- Include external files and scripts here (See HTML helper for more info.) -->
<?php echo $html->css('mainstyle'); ?>
<?php echo $scripts_for_layout ?>
</head>
<body>

<!-- If you'd like some sort of menu to 
show up on all of your views, include it here -->
<div id="header">
    <div id="menu">
      <ul>
        <li><?php echo $html->link('Home', '/');?></li>
        <li><?php echo $html->link('Pieces', array('controller'=>'responses', 'action'=>'index'));?></li>
        <li><?php echo $html->link('Feedback', array('controller'=>'users', 'action'=>'feedback'));?></li>
      </ul>
    </div>
</div>

<!-- Here's where I want my views to be displayed -->
<div id="main">
  <div id="spinner" style="display: none; float: right;">
    <?php echo $html->image('spinner.gif'); ?>
  </div>
  <div id="content">
    <div id="inner">
      <?php echo $content_for_layout ?>
    </div>
  </div>
</div>

<!-- Add a footer to each displayed page -->
<div id="footer">Copyright 2010 Cary Lee<div>

</body>
</html>
