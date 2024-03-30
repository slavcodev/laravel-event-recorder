<?php

declare(strict_types=1);

namespace Slavcodev\Laravel\Events\Tests;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Slavcodev\Laravel\Events\EventRecorder;

#[CoversClass(EventRecorder::class)]
final class EventRecorderTest extends TestCase
{
    #[Test]
    public function delegatesToProvidedConstraint(): void
    {
        $history = [];
        $dispatcher = new Dispatcher();
        $dispatcher->listen(DemoChanged::class, static function ($event) use (&$history): void {
            $history[] = $event;
        });
        Event::swap($dispatcher);
        Demo::setEventDispatcher($dispatcher);
        Demo::bootEventRecorder();
        $model = $this->createModel();
        $model->foo();
        $model->bar();
        self::assertCount(0, $history);
        $model->save();
        self::assertCount(2, $history);
    }

    private function createModel(): Demo
    {
        return new Demo();
    }
}
