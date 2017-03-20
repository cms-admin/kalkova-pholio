<?php 
  $core = cmsCore::getInstance(); 
  $is_panel = $this->hasWidgetsOn('panel');
?><!DOCTYPE html>
<html>
<head>
  <title><?php $this->title(); ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php $this->addMainCSS("templates/{$this->name}/css/normalize.css"); ?>
  <?php $this->addMainCSS("templates/{$this->name}/css/flexboxgrid.css"); ?>
  <?php $this->addMainCSS("templates/{$this->name}/css/fonts.css"); ?>
  <?php $this->addMainCSS("templates/{$this->name}/css/icons.css"); ?>
  <?php $this->addMainCSS("templates/{$this->name}/css/ui.css"); ?>

  <?php $this->addMainJS("templates/{$this->name}/js/jquery.js"); ?>
  <?php $this->addMainJS("templates/{$this->name}/js/jquery-modal.js"); ?>
  <?php $this->addMainJS("templates/{$this->name}/js/core.js"); ?>
  <?php $this->addMainJS("templates/{$this->name}/js/modal.js"); ?>

  <?php $this->head(); ?>

  <?php include('theme-options.php'); ?>

  <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $THEME['favicon']; ?>" />
  <link rel="SHORTCUT ICON" href="<?php echo $THEME['favicon']; ?>" />
</head>
<body class="device_<?php echo $device_type; ?><?php if ($is_panel) { ?> has-panel<?php } ?>">
  <?php $messages = cmsUser::getSessionMessages(); ?>
  <?php if ($messages): ?>
    <div class="ui-messages">
      <?php
        foreach($messages as $message){
          echo $message;
        }
      ?>
    </div>
  <?php endif; ?>

  <div class="wrapper">
    <header class="header">
      <?php $this->widgets('top'); ?>
    </header>
    <div class="content">
      <?php $this->body(); ?>
    </div>
  </div>

  <footer class="footer">
    
  </footer>

  <?php if ($is_panel) : ?>
    <aside class="ui-panel">
      <?php $this->widgets('panel'); ?>
    </aside>
  <?php endif; ?>

  <?php $this->insertJS("templates/{$this->name}/js/jquery.nice-select.js"); ?>

  <?php $this->insertJS("templates/{$this->name}/js/ui.js"); ?>
</body>
</html>
