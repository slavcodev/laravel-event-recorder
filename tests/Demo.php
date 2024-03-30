<?php

declare(strict_types=1);

namespace Slavcodev\Laravel\Events\Tests;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Slavcodev\Laravel\Events\EventRecorder;

final class Demo
{
    use EventRecorder;
    use HasEvents;

    public $value = '';

    protected static $dispatcher;

    public function foo(): void
    {
        $this->recordEvent(new DemoChanged($this, $this->value));
        $this->value = __FUNCTION__;
    }

    public function bar(): void
    {
        $this->recordEvent(new DemoChanged($this, $this->value));
        $this->value = __FUNCTION__;
    }

    public function save(): void
    {
        $this->fireModelEvent('saved', false);
    }
}
