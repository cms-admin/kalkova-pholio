<?php

class onRssCtypeBasicForm extends cmsAction {

    public function run($form){

        $fieldset = $form->addFieldsetAfter('tags', LANG_RSS_CONTROLLER, 'rss');

        $form->addField($fieldset, new fieldCheckbox('options:is_rss', array(
            'title' => LANG_RSS_CTYPE_ENABLE_FEED
        )));

        return $form;

    }

}
