<?php

class formPholioTemplateOptions extends cmsForm {

  public function init() {

    $pholioConfig = [
      // ЛОГОТИПЫ
      [
        'type' => 'fieldset',
        'title' => LANG_PAGE_LOGO,
        'childs' => [
          new fieldImage('logo', [
            'hint' => LANG_PHOLIO_THEME_LOGO_MAIN,
            'options' => [
              'sizes' => array('small', 'original')
            ]
          ]),

          new fieldImage('logo_menu', [
            'hint' => LANG_PHOLIO_THEME_LOGO_MENU,
            'options' => [
              'sizes' => array('small', 'original')
            ]
          ]),

          new fieldImage('favicon', [
            'hint' => LANG_PHOLIO_THEME_LOGO_FAVICON,
            'options' => [
              'sizes' => array('small', 'original')
            ]
          ]),
        ]
      ],
      // НАСТРОЙКИ СЛАЙДЕРА
      [
        'type'    => 'fieldset',
        'title'   => LANG_PHOLIO_THEME_SLIDER,
        'childs'  => [
          new fieldString('slider_title', [
            'title' => LANG_PHOLIO_THEME_SLIDER_TITLE,
          ]),
          new fieldString('slider_description', [
            'title' => LANG_PHOLIO_THEME_SLIDER_DESCRIPTION
          ])
        ]
      ],
      // КОНТАКТЫ
      [
        'type'    => 'fieldset',
        'title'   => LANG_PHOLIO_THEME_CONTACTS,
        'childs'  => [
          new fieldText('contacts_phones', [
            'title' => LANG_PHOLIO_THEME_CONTACTS_PHONES
          ]),
          new fieldString('contacts_vk', [
            'title' => LANG_PHOLIO_THEME_CONTACTS_VK
          ]),
          new fieldString('contacts_fb', [
            'title' => LANG_PHOLIO_THEME_CONTACTS_FB
          ]),
          new fieldString('contacts_insta', [
            'title' => LANG_PHOLIO_THEME_CONTACTS_INSTA
          ])
        ]
      ]
    ];

    return $pholioConfig;

    return array(

            array(
                'type' => 'fieldset',
                'title' => LANG_PAGE_LOGO,
                'childs' => array(
                    new fieldImage('logo', array(
                        'options' => array(
                            'sizes' => array('small', 'original')
                        )
                    )),
                )
            ),

            array(
                'type' => 'fieldset',
                'title' => LANG_DEFAULT_THEME_COPYRIGHT,
                'childs' => array(

                    new fieldString('owner_name', array(
                        'title' => LANG_TITLE
                    )),

                    new fieldString('owner_url', array(
                        'title' => LANG_DEFAULT_THEME_COPYRIGHT_URL,
                        'hint' => LANG_DEFAULT_THEME_COPYRIGHT_URL_HINT
                    )),

                    new fieldString('owner_year', array(
                        'title' => LANG_DEFAULT_THEME_COPYRIGHT_YEAR,
                        'hint' => LANG_DEFAULT_THEME_COPYRIGHT_YEAR_HINT
                    )),

                )
            ),

            array(
                'type' => 'fieldset',
                'title' => LANG_DEFAULT_THEME_LAYOUT_COLUMNS,
                'childs' => array(

                    new fieldList('aside_pos', array(
                        'title' => LANG_DEFAULT_THEME_LAYOUT_SIDEBAR_POS,
                        'default' => 'right',
                        'items' => array(
                            'left'  => LANG_DEFAULT_THEME_LAYOUT_LEFT,
                            'right' => LANG_DEFAULT_THEME_LAYOUT_RIGHT
                        )
                    ))

                )
            )

        );

    }

}
