<?php

declare(strict_types=1);

namespace Slavcodev\Laravel\Events;

use Illuminate\Support\Facades\Event;

use function array_map;

trait EventRecorder
{
    private $recordedEvents = [];

    public static function bootEventRecorder(): void
    {
        static::saved(static function (self $model): void {
            $events = $model->recordedEvents;
            $model->recordedEvents = [];
            array_map([Event::class, 'dispatch'], $events);
        });
    }

    public function recordEvent(object $event): void
    {
        $this->recordedEvents[] = $event;
    }
}
