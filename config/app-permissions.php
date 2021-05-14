<?php

return [

    'crud_permissions' => [
        'users',
        'admins',
        'categories',
        'countries',
        'cities',
        'prohibited_words',
        'testimonials',
    ],
    'policies' => [
        'index',
        'show',
        'create',
        'edit',
        'destroy'
    ],
    'standalone_permissions' => [
        'contact_us_requests'=> [
            'all',
            'confirm'
        ],
        'pages'=>[
            'all',
            'update'
        ],
        'settings'=>[
            'all',
            'save'
        ],
        'reports' => [
            'all'
        ],
    ],
];
