<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarApp extends Component
{
    protected $sidebar_menu;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->sidebar_menu = [
            [
                'name' => 'Dashboard',
                'icon' => '<i class="fa-solid fa-gauge-high mr-3"></i>',
                'slug_name' => 'dashboard',
                'url' => 'dashboard',
                'access' => ['project-manager'],
            ],
            [
                'name' => 'Pegawai',
                'icon' => '<i class="fa-solid fa-user mr-3"></i>',
                'slug_name' => 'pegawai',
                'url' => 'pegawai',
                'access' => ['project-manager'],
            ],
            [
                'name' => 'Proyek',
                'icon' => '<i class="fa-solid fa-file-lines mr-3"></i>',
                'slug_name' => 'proyek',
                'url' => 'proyek',
                'access' => ['project-manager', 'direktur-produksi'],
            ],
            [
                'name' => 'Task',
                'icon' => '<i class="fa-solid fa-list-check mr-3"></i>',
                'slug_name' => 'task',
                'url' => 'task',
                'access' => ['project-manager', 'direktur-produksi'],
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('partials._sidebar-app', [
            'sidebar_menu' => $this->sidebar_menu
        ]);
    }
}
