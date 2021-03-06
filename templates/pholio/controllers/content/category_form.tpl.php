<?php
  $this->addJS('templates/'. $this->name . '/js/jquery.nice-select.js');
  $this->addJS('templates/'. $this->name . '/js/switchery.js');

  $this->addCSS('templates/'. $this->name . '/css/nice-select.css');
  $this->addCSS('templates/'. $this->name . '/css/switchery.css');
  
  $page_title =   $do=='add' ?
    $ctype['title'] . ': <span>' . LANG_ADD_CATEGORY . '</span>':
    $ctype['title'] . ': <span>' . LANG_EDIT_CATEGORY . '</span>';

  $this->setPageTitle($do=='add' ? LANG_ADD_CATEGORY : LANG_EDIT_CATEGORY);

  if ($ctype['options']['list_on']){
    $this->addBreadcrumb($ctype['title'], href_to($ctype['name']));
  }

  $this->addBreadcrumb($do=='add' ? LANG_ADD_CATEGORY : LANG_EDIT_CATEGORY);

  $this->addToolButton(array(
    'class' => 'save',
    'title' => LANG_SAVE,
    'href'  => "javascript:icms.forms.submit()"
  ));

  $this->addToolButton(array(
    'class' => 'cancel',
    'title' => LANG_CANCEL,
    'href'  => $back_url ? $back_url : href_to($ctype['name'])
  ));

?>

<section class="ui-dash">
  <header class="ui-dash__header">
    <div class="container">
      <div class="ui-dash__header-inner">
        <h1 class="ui-dash__header-title"><?php echo $page_title ?></h1>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="ui-dash__form">
      <?php

      $category['ctype_name'] = $ctype['name'];

      $this->renderForm($form, $category, array(
        'action' => '',
        'cancel' => array('show' => true, 'href' => $back_url ? $back_url : href_to($ctype['name'])),
        'method' => 'post',
        'toolbar' => false
      ), $errors);
      ?>
    </div>
  </div>
</section>