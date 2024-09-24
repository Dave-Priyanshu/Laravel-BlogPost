<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CodeBlock extends Component
{
    public $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function render()
    {
        return view('components.code-block');
    }
}