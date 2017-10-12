<?php

return [

  'user/register' => 'user/register',
  'user/login' => 'user/login',
  'user/logout' => 'user/logout',
  'cabinet' => 'cabinet/index',
    'prognoz/page-([0-9]+)' => 'prognoz/index/$1',
  'prognoz' => 'prognoz/index/1',

  'contact' => 'contact/index',
  'developing' => 'develop/index',
  'livechat' => 'livechat/index',
  'uslugi' => 'uslugi/index',
  'faq' => 'faq/index',
  'bk' => 'bk/index',

    // Управление прогнозами:
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product/page-([0-9]+)' => 'adminProduct/index/$1',
    'admin/product' => 'adminProduct/index/1',
    'admin' => 'admin/index',
  '' => 'site/index',
];