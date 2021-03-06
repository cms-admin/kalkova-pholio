<?php

    $this->setPageTitle($group['sub_title'], $group['title']);
    $this->setPageDescription($group['title'].' · '.$group['sub_title']);

    $this->addBreadcrumb(LANG_GROUPS, href_to('groups'));
    $this->addBreadcrumb($group['title'], $this->href_to($group['id']));
    $this->addBreadcrumb($group['sub_title']);

    $content_menu = array();

    foreach($content_counts as $ctype_name=>$count){
        if (!$count['is_in_list']) { continue; }
        $content_menu[] = array(
            'title' => $count['title'],
            'url' => $this->href_to($group['id'], array('content', $ctype_name)),
            'counter' => $count['count']
        );
    }

    $this->addMenuItems('group_content_types', $content_menu);

    if (cmsUser::isAllowed($ctype['name'], 'add')) {

        $this->addToolButton(array(
            'class' => 'add',
            'title' => sprintf(LANG_CONTENT_ADD_ITEM, $ctype['labels']['create']),
            'href'  => href_to($ctype['name'], 'add') . "?group_id={$group['id']}"
        ));

    }

    if (cmsUser::isAdmin()){
        $this->addToolButton(array(
            'class' => 'page_gear',
            'title' => sprintf(LANG_CONTENT_TYPE_SETTINGS, mb_strtolower($ctype['title'])),
            'href'  => href_to('admin', 'ctypes', array('edit', $ctype['id']))
        ));
    }

?>

<div id="group_profile_header">
    <?php $this->renderChild('group_header', array('group'=>$group, 'content_counts'=>$content_counts)); ?>
</div>

<div id="group_content_pills">
    <?php $this->menu('group_content_types', true, 'pills-menu-small'); ?>
</div>

<div id="group_content_list"><?php echo $html; ?></div>