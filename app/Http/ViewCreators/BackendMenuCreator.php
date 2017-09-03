<?php

namespace App\Http\ViewCreators;

use Illuminate\View\View;

class BackendMenuCreator {

    /**
     * The user model.
     *
     * @var \App\User;
     */
    protected $user;

    /**
     * Create a new menu bar composer.
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function create(View $view)
    {
        $menu[] = [
            'class' => false,
            'route' => url('/home'),
            'icon'  => 'md md-home',
            'title' => 'Home'
        ];

        /*
         * Sample for adding menu
         * array_push($menu,
            [
                'class' => {desired class},
                'route' => {desired route or url},
                'icon'  => {md or fa icon class},
                'title' => {title},
                \\Optional Sub Menu Items
                'items' => [
                    ['route' => {route or url}, 'title' => {title}],
                    ...
                ]
            ]);
         */

        array_push($menu, [
            'class' => false,
            'route' => route('patient.index'),
            'icon'  => 'md md-accessibility',
            'title' => 'Patient'
        ]);

        array_push($menu, [
            'class' => false,
            'route' => route('doctor.index'),
            'icon'  => 'md md-person',
            'title' => 'Doctor'
        ]);

        array_push($menu, [
            'class' => false,
            'route' => route('staff.index'),
            'icon'  => 'md md-person',
            'title' => 'Doctor'
        ]);

        $view->with('allMenu', $menu);
    }
}