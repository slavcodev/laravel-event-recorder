<?php

declare(strict_types=1);

namespace Slavcodev\Laravel\Events\Tests;

final class DemoChanged
{
    public $model;
    public $backup;

    public function __construct(Demo $model, string $backup)
    {
        $this->model = $model;
        $this->backup = $backup;
    }
}
