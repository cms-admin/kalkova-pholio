<?php

class onExtendAdminContentGrid extends cmsAction {

  public function run($ctype){
    $fields = cmsDatabase::getInstance()->getTableFields('con_' . $ctype['name']);

    if (in_array('ordering', $fields)){
      $grid = $this->loadDataGrid('content_items_extend', false, 'admin.grid_filter.content.'.$ctype['name']);
    } else {
      $grid = false;
    }

    return $grid;
  }

}
