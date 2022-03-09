<?php

namespace App\View\Components;

use App\Models\GeneralSettings;
use Illuminate\View\Component;

class AppLogo extends Component
{
    public $logo;

    public function __construct()
    {
        $this->logo = GeneralSettings::first()->favicon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.home.app-logo');
    }
}