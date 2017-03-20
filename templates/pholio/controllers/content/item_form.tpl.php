<?php

  $this->addJS('templates/default/js/content.js');
  $this->addJS('templates/default/js/jquery-chosen.js');
  $this->addJS('templates/'. $this->name . '/js/jquery.nice-select.js');
  $this->addJS('templates/'. $this->name . '/js/switchery.js');

  $this->addCSS('templates/default/css/jquery-chosen.css');
  $this->addCSS('templates/'. $this->name . '/css/nice-select.css');
  $this->addCSS('templates/'. $this->name . '/css/switchery.css');

  $page_title =   $do=='add' ?
    sprintf(LANG_CONTENT_ADD_ITEM, $ctype['labels']['create']) :
    $item['title'];

  $this->setPageTitle($page_title);

  if ($ctype['options']['list_on'] && !$parent){
    $this->addBreadcrumb($ctype['title'], href_to($ctype['name']));
  }

  $this->addToolButton(array(
    'class' => 'save',
    'title' => LANG_SAVE,
    'href'  => "javascript:icms.forms.submit()"
  ));

  if ($cancel_url){
    $this->addToolButton(array(
      'class' => 'cancel',
      'title' => LANG_CANCEL,
      'href'  => $cancel_url
    ));
  }

  $is_multi_cats = !empty($ctype['options']['is_cats_multi']);

  $this->addBreadcrumb($page_title);

?>
<section class="ui-dash">
  <header class="ui-dash__header">
    <div class="container">
      <div class="ui-dash__header-inner">
        <h1 class="ui-dash__header-title"><?php echo html($page_title) ?></h1>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="ui-dash__form">
      <?php
      $this->renderForm($form, $item, 
        array(
          'action' => '',
          'cancel' => array('show' => (bool)$cancel_url, 'href' => $cancel_url),
          'method' => 'post',
          'toolbar' => false,
          'hook' => array(
            'event' => "content_{$ctype['name']}_form_html",
            'param' => array(
              'do' => $do,
              'id' => $do=='edit' ? $item['id'] : null
            )
          ),
        ), 
        $errors
      );
      ?>
    </div>
    <?php if ($is_premoderation && !$is_moderator) { ?>
      <div class="ui-dash__notice is-info">
        <?php echo LANG_MODERATION_NOTICE; ?>
      </div>
    <?php } ?>

    <?php if ($is_multi_cats) { ?>
      <div class="ui-dash__multicats">
        <?php echo html_select('add_cats', array(), '', array('multiple'=>true)); ?>
      </div>
    <?php } ?>
  </div>
</section>

<?php if ($props || $is_multi_cats){ ?>
  <script>
    <?php if ($is_multi_cats){ ?>
      <?php echo $this->getLangJS('LANG_LIST_EMPTY','LANG_SELECT', 'LANG_CONTENT_SELECT_CATEGORIES'); ?>
      var add_cats = []; /** оставлено для совместимости **/
      var add_cats_data = [];
      <?php if (!empty($add_cats)) { ?>
        <?php foreach($add_cats as $cat_id){ ?>
          add_cats_data.push(<?php echo $cat_id; ?>);
        <?php } ?>
      <?php } ?>
      icms.content.initMultiCats(add_cats_data);
    <?php } ?>
    <?php if ($props){ ?>
      <?php echo $this->getLangJS('LANG_LOADING'); ?>
        icms.content.initProps('<?php echo href_to($ctype['name'], 'props'); ?>'<?php if($do=='edit'){ ?>, <?php echo $item['id']; ?><?php } ?>);
        <?php if ($is_load_props){ ?>
        icms.content.loadProps();
      <?php } ?>
    <?php } ?>
  </script>
<?php } ?>