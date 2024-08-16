<?php

namespace App\Services\ClassServices;

use App\Models\Event;
use App\Models\EventDate;
use App\Models\EventType;
use App\Models\InvitationCardStyle;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Reservation;
use App\Models\SubRoom;
use App\Services\InterfacesServices\EventServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventService
{
    public function getAllEvents()
    {
        $events = Event::query()
        ->with('type_of_event','event_date','sub_room')
        ->get();
        return $events;
    }
    public function getPublicEvents()
    {
        $comming_events = [];

        $events = Event::query()->where('is_private',0)
        ->with(['type_of_event','event_date','sub_room'])
        ->get();
        foreach($events as $event)
        {
            if($event->event_date->event_date > Carbon::now())
            array_push($comming_events,$event);
        }
        
        return $comming_events;
    }
    public function getUserEvents($user_id)
    {
        return Event::query()
            ->where('user_id',$user_id)
            ->with(['user' , 'type_of_event','sub_room'])
            ->get();
            
    }
    public function myEvents()
    {
        $comming_events = [];

        $events = Event::query()->where('user_id',auth()->id())
        ->with(['type_of_event','event_date','sub_room'])
        ->get();
        foreach($events as $event)
        {
            if($event->event_date->event_date > Carbon::now())
            array_push($comming_events,$event);
        }
        
        return $comming_events;
    }
    public function myLastEvents()
    {
        $history = [];

        $events = Event::query()->where('user_id',auth()->id())
        ->with(['type_of_event','event_date','sub_room'])
        ->get();
        foreach($events as $event)
        {
            if($event->event_date->event_date < Carbon::now())
            array_push($history,$event);
        }
        
        return $history;
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
        $event = Event::query()->with('type_of_event','event_date','attendances')->find($id);
        $order = Order::where('event_id',$event->id)->first();
        $order_item = OrderItem::where('order_id',$order->id)->
        with('sub_room','food','accessory','photography_team','invitation_card')->first();
        $invitation_card_style = InvitationCardStyle::with('media')->find($order_item->invitation_card->invitation_card_style_id);
        $event_info = [
            'Event'=>$event,
            'Order'=>$order,
            'Details'=>$order_item,
            'invitation_card_style'=>$invitation_card_style,
        ];
        return $event_info;
    }

    public function updateEvent($event_id ,array $data)
    {
        $event = Event::query()->with(['user', 'type_of_event', 'sub_room'])->findOrFail($event_id);
        if ($event->created_at > Carbon::now()->subDays(3))
        $event->update($data);
        else return "you can't update this event it's out of three days";
        return $event;
    }

    public function deleteEvent(int $event_id)
    {
        $event = Event::query()->findOrFail($event_id);
        if ($event->created_at < Carbon::now()->subDays(3))
        $event->delete();
        else return "you can't delete this event it's out of three days";
        return $event;
    }

}
