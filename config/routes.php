<?php

/**
 * Url routing information
 */
return [

    'u/admin'           =>  ['login/login'],
    'login'             =>  ['login/login'],

    'force/show'        =>  ['load/load'],
    'force/delete'      =>  ['delete/delete'],
    'force/add'         =>  ['set/set'],

    'template/update'   =>  ['show/show'],
    ''                  =>  ['template/template'],
];