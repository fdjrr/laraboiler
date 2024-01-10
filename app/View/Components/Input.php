<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
  /**
   * Create a new component instance.
   */
  public function __construct(
    public string $type = 'text',
    public string $name = '',
    public string $value = '',
    public string $class = '',
    public string $placeholder = '',
    public string $id = '',
    public string $required = 'false',
  ) {
    //
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.input');
  }
}
