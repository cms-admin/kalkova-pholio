<ul class="<?php echo $css_class; ?>">

  <?php $last_level = 0; ?>

  <?php foreach($menu as $id=>$item){ ?>

    <?php for ($i=0; $i<($last_level - $item['level']); $i++) { ?>
      </li></ul>
    <?php } ?>

    <?php if ($item['level'] <= $last_level) { ?>
      </li>
    <?php } ?>

    <?php

      $is_active = in_array($id, $active_ids);

      $css_classes = array();
      if ($is_active) { $css_classes[] = 'active'; }
      if ($item['childs_count'] > 0) { $css_classes[] = 'is-folder'; }
      if ($item['disabled']) { $css_classes[] = 'is-disabled'; }
      
      if (!empty($item['options']['class'])) {
        $css_icon = $item['options']['class'];
      }

      $onclick = isset($item['options']['onclick']) ? $item['options']['onclick'] : false;
      $onclick = isset($item['options']['confirm']) ? "return confirm('{$item['options']['confirm']}')" : $onclick;

      $target = isset($item['options']['target']) ? $item['options']['target'] : false;
      $data_attr = '';
      if (!empty($item['data'])) {
        foreach ($item['data'] as $key=>$val) {
          $data_attr .= 'data-'.$key.'="'.$val.'" ';
        }
      }

    ?>

    <li <?php if ($css_classes) { ?>class="<?php echo implode(' ', $css_classes); ?>"<?php } ?>>
      <a <?php if (!empty($item['title'])) {?>title="<?php echo html($item['title']); ?>"<?php } ?> class="item" <?php echo $data_attr; ?> href="<?php echo !empty($item['url']) ? htmlspecialchars($item['url']) : 'javascript:void(0)'; ?>" <?php if ($onclick) { ?>onclick="<?php echo $onclick; ?>"<?php } ?> <?php if ($target) { ?>target="<?php echo $target; ?>"<?php } ?>>
        <?php if (!empty($css_icon)) : ?>
          <figure class="icon">
            <i class="<?php echo $css_icon; ?>"></i>
          </figure>
        <?php endif; ?>

        <?php if (!empty($item['title'])) : ?>
          <span class="title"><?php html($item['title']); ?></span>
        <?php endif;?>
        
        <?php if (isset($item['counter']) && $item['counter']) : ?>
          <span class="counter"><?php html($item['counter']); ?></span>
        <?php endif; ?>
      </a>

      <?php if ($item['childs_count'] > 0) { ?><ul><?php } ?>

      <?php $last_level = $item['level']; ?>

    <?php } ?>

    <?php for ($i=0; $i<$last_level; $i++) { ?>
        </li></ul>
    <?php } ?>