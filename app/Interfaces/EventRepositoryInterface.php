<?php 

namespace App\Interfaces;

interface EventRepositoryInterface
{
    public function getAllEvents();
    public function getEventById($eventId);
    public function deleteEvent($eventId);
    public function storeEvent(array $eventDetails);
    public function updateEvent(array $eventDetails,$eventId);
}