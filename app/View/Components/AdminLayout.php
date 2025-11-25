<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AdminLayout extends Component
{
    public string $title;
    public array $breadcrumbs;

    public function __construct(string $title = 'Dashboard', array $breadcrumbs = [])
    {
        $this->title = $title;
        $this->breadcrumbs = $breadcrumbs;
    }

    public function render(): View
    {
        return view('layouts.admin');
    }
}
