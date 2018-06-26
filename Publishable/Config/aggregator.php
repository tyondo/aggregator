<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Tyondo Aggregator Package Config file
    |--------------------------------------------------------------------------
    | This file contains various customizations available for the package
    |
    |$namespace = 'Tyondo\\Aggregator\\Models\\';
    */
    'namespace'=>'\\Tyondo\\Aggregator\\Models\\',
    /*
    |--------------------------------------------------------------------------
    | Purpose of the Aggregator
    |--------------------------------------------------------------------------
    | What are you using the aggregator for? Blog, News, Online Policies or as a Journal
    |
    |
    */
    'purpose'=>'Posts',
    'use_company' => true,

    //Delegate some administration aspects to Aggregator
    'control_panel' => [
        'manage_users' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Tyondo Aggregator Navigation Menu
    |--------------------------------------------------------------------------
    |
    | The navigation links that run across the top of the Mnara master
    | layout? That's these options right here. Add as many of them as you
    | want to have appear.
    |
    */
    'navigation' => [

        [
            'group' => 'Posts',
            'class' => 'fa fa-book fa-lg',
            'links' => [
                [
                    'title' => 'Add Post',
                    'class' => 'fa fa-fw fa-plus',
                    'route' => 'admin.posts.create'
                ],
                [
                    'title' => 'Manage Posts',
                    'class' => 'fa fa-newspaper-o',
                    'route' => 'admin.posts.manage'
                ],
                [
                    'title' => 'List Posts',
                    'class' => 'fa fa-fw fa-th-list',
                    'route' => 'admin.posts.index'
                ],
            ]
        ],

        [
            'group' => 'Categories',
            'class' => 'fa fa-cubes fa-lg',
            'links' => [
                [
                    'title' => 'Add Category',
                    'class' => 'fa fa-fw fa-plus',
                    'route' => 'admin.categories.create'
                ],
                [
                    'title' => 'List Category',
                    'class' => 'fa fa-fw fa-th-list',
                    'route' => 'admin.categories.index'
                ],

            ]
        ],
    ],
    /*
|--------------------------------------------------------------------------
| Aggregator Views
|--------------------------------------------------------------------------
|
| Aggregator comes pre-equipped with views that will work out of the box.
| However, you are free to define you own views here instead.
|
*/
    'views' => [
        'layouts' => [
            'admin'        => 'aggregator::layouts.blog.admin',
            //'admin' => 'mnara::admin.layouts.app',
        ],
        'auth' => [
            'login'     => 'aggregator::auth.login',
            'register'  => 'aggregator::auth.register',
            'email-request'      => 'aggregator::auth.password',
            'edit'      => 'aggregator::authenticator.edit',
            'role'      => 'aggregator::authenticator.role'
        ],
    ],

    'routes' =>[
        'auth' => [
            'login' => 'admin.posts.index'
        ],
        'pages' => [
            'home' => 'admin.posts.index'
        ]
    ]

];
