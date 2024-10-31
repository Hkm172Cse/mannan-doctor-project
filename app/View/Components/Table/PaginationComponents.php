<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PaginationComponents extends Component
{
    /**
     * Create a new component instance.
     */
    public $contents;
    public function __construct($contents)
    {
        $this->contents = $contents;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.pagination-components');
    }
}
