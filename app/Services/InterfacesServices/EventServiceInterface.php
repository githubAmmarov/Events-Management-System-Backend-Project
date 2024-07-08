<?php

namespace App\Services\InterfacesServices;

use App\Models\Event;

interface EventServiceInterface
{
    public function getAllEvents();
    public function getUserEvents($userId);
    public function createEvent(array $data);
    public function getEventById($id);
    public function updateEvent(Event $event, array $data);
    public function deleteEvent(Event $event);
}
