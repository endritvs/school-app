<?php 

namespace App\Repositories;
use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;

class EventRepository implements EventRepositoryInterface
{
    public function getAllEvents()
    {
        return Event::latest()->paginate(10);
    }

    public function getEventById($eventId)
    {
        return Event::findOrFail($eventId);
    }

    public function deleteEvent($eventId)
    {
        $event=Event::findOrFail($eventId);
        return $event->delete($eventId);
    }

    public function storeEvent(array $eventDetails)
    {
        return Event::create($eventDetails);
    }
    

    public function updateEvent(array $eventDetails,$eventId)
    {
        $event=Event::findOrFail($eventId);
        return $event->update($eventDetails);
    }

}