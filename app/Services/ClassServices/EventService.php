<?php

namespace App\Services\ClassServices;

use App\Models\Event;
use App\Models\EventDate;
use App\Models\EventType;
use App\Models\Reservation;
use App\Models\SubRoom;
use App\Services\InterfacesServices\EventServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventService
{
    public function getAllEvent()
    {
        DB::enableQueryLog();

        $events = Event::query()
        ->with('type_of_event','user','sub_room')
        ->get();
        foreach ($events as $event) {
            // echo 'id :' . $event->id . ' Type :' . ($event->type_of_event ? $event->type_of_event->name : 'NULL') . PHP_EOL;
            if ($event->type_of_event === null) {
                $event= 'this private event';
            }
        }
        return $events;
    }
    public function getUserEvents($user_id)
    {
        return Event::query()
            ->where('user_id',$user_id)
            ->with(['user' , 'type_of_event','sub_room'])
            ->get();
    }

    public function createEvent(array $data)
    {
        DB::transaction(function () use (& $data){
            $event = new Event();
            $event->description = $data['description'];
            $event->event_time = $data['event_time'];
            $event->num_of_guests = $data['num_of_guests'];
            $event->is_private = $data['is_private'];
            $event->planner_id = $data['planner_id'];
            $event->user_id = Auth::id();

            $eventType = EventType::where('type', $data['event_type'])->firstOrFail();
            $event->event_type_id = $eventType->id;

            if (isset($data['sub_room_id'])) {
                $subRoom = SubRoom::findOrFail($data['sub_room_id']);
                $event->sub_room_id = $subRoom->id;
            }

            $data['event_id'] = $event->id;

            $event->save();

            $eventDate = EventDate::create([
                'event_id' => $event->id,
                'event_date' => $data['event_date'],
            ]);

            $reservation = Reservation::create([
                'event_date_id' => $eventDate->id,
                'sub_room_id' => $data['sub_room_id'],
            ]);

            $event->update(['reservation_id' => $reservation->id]);

        });


        return $data;
}

    public function geteventByID($id)
    {
        $event = event::query()->find($id);
        return $event;
    }

    public function updateEvent($event_id ,array $data)
    {
        $event = Event::query()->with(['user', 'type_of_event', 'sub_room'])->findOrFail($event_id);
        $event->update($data);
        return $event;
    }

    public function deleteEvent(int $event_id)
    {
        $event = Event::query()->findOrFail($event_id);
        $event->delete();
        return $event;
    }

}
