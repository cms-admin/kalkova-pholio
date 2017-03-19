<div class="ui-panel__avatar">
  <a class="ui-panel__avatar-image" href="<?php echo href_to('users', $user->id); ?>">
    <?php echo html_avatar_image($user->avatar, 'small', $user->nickname); ?>
  </a>
  <a class="ui-panel__avatar-name" href="<?php echo href_to('users', $user->id); ?>">
    <?php html($user->nickname); ?>
  </a>
</div>
<nav class="ui-panel__menu">
  <?php 
    $this->menu(
      $widget->options['menu'], 
      $widget->options['is_detect'], 
      'ui-panel__menu-list', 
      $widget->options['max_items'], 
      true, 
      'menu-panel'
    );
  ?>
</nav>