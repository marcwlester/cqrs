<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 04/11/16
 * Time: 10:42 PM
 */

namespace Logo3\Common\Domain\Model;


trait EventRecorder
{
    protected $recordedEvents = [];

    public function getRecordedEvents()
    {
        return $this->recordedEvents;
    }

    public function clearRecordedEvents()
    {
        $this->recordedEvents = [];
    }

    public function recordEvent($event)
    {
        $this->handle($event);

        $this->recordedEvents[] = $event;
    }

    protected function handle($event)
    {
        $method = $this->getHandleMethod($event);

        if (!method_exists($this, $method)) {
            return;
        }

        $this->$method($event, $event);
    }

    private function getHandleMethod($event)
    {
        $classParts = explode('\\', get_class($event));

        return 'apply' . end($classParts);
    }

    public function applyRecordedEvents(array $events)
    {
        foreach ($events as $event) {
            $this->handle($event);
        }
    }
}