<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\Support\Collection;

class Select extends Component
{
    public $selectedKey;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $name = null,
        public $id = null,
        public array | Collection $options = [],
        public $value = null
    )
    {
        $this->selectedKey = $this->name ? old($this->name, $this->value) : $this->value;
    }

    public function isSelected($key): bool
    {
        if ($this->selectedKey == $key) return true;
        return is_array($this->selectedKey) && is_array($key, $this->selectedKey, false);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
