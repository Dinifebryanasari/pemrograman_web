<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PageConfig;

class ShowHomePage extends Component
{
    public function render()
    {
        $pageConfig = PageConfig::first(); // Ambil data dari tabel page_configs
        return view('livewire.show-home-page', compact('pageConfig'));
    }
}