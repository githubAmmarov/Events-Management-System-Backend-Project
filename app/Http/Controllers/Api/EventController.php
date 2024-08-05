<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\Api\StoreEventRequest;
use App\Http\Requests\Api\UpdateEventRequest;
use App\Http\Responses\Response;
use App\Models\EventDate;
use App\Models\EventType;
use App\Models\Reservation;
use App\Models\SubRoom;
use App\Services\ClassServices\EventService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }
    public function index()
    {
        $message = 'There are all Events';
        try {
            $event = $this->eventService->getAllEvent();
            return Response::Success($event , $message, 200);
        } catch(Exception $e){
            $error = $e->getMessage();
            $code = $e->getCode();
            return Response::Error($e, $error, $code);
        }

    }

    public function userEvents($user_id)
    {
        $message = "These events for user id: $user_id";
        try {
            $events = $this->eventService->getUserEvents($user_id);
            return Response::Success($events, $message, 200);
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return Response::Error($th, $error, 500);
        }
    }

    public function store(StoreeventRequest $request)
    {

        try{
            $data = $request->validated();
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

            $event->save();

            $eventDate = EventDate::create([
                'event_id' => $event->id,
                'event_date' => $data['event_date'],
            ]);

            $reservations_for_subroom = Reservation::where('sub_room_id',$data['sub_room_id'])->get();
            $reservation = Reservation::create([
                'event_date_id' => $eventDate->id,
                'sub_room_id' => $data['sub_room_id'],
            ]);
            $event->update(['reservation_id' => $reservation->id]);
            $event->save();


            foreach ($reservations_for_subroom as $reservation_for_subroom){
                // dd($reservation_for_subroom->event_date->event_date);

            if ($reservation_for_subroom->event_date->event_date === $reservation->event_date->event_date) {

                throw new Exception("your reservation date is reserved before" . fake()->emoji());
            }
        }

            $data['event_id'] = $event->id;
        });
            // $eventData = array_merge($request->all(),['user_id'=>$user_id]);
            // $event = $this->eventService->createEvent($eventData);
            $message = 'the event is created successfully';
            return Response::Success($data, $message, 201);
        } catch(Exception $e){
            $error = $e->getMessage();
            return Response::Error($e, $error, 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $error = 'event not found';
        try{
            $event = $this->eventService->geteventByID($id);
            $message = 'this is required event';
        if (is_null($event)){
            return Response::Error($error,404);
        }
        return Response::Success($event, $message, 200);
        } catch(Exception $th){
            $exception = $th->getMessage();
            return Response::Error($th, $exception, 500);
        }
    }

    public function update(UpdateEventRequest $request, event $event ,$id):JsonResponse
    {
        $data = $request->validated();
        $message = 'Event Updated successfully';
        try{
            $event = $this->eventService->updateEvent($id, $data);
        return Response::Success($event, $message, 200);
        } catch (Exception $e){
            $error = $e->getMessage();
            return Response::Error($e, $error, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event, $id)
    {
        try {
            $message = "the $id Event is deleted successfully";
            $event = $this->eventService->deleteEvent($id);
            return Response::Success($event, $message, 200);
        } catch(Exception $e){
            $errorMessage = $e->getMessage();
            return Response::Error($e, $errorMessage, 500);
        }
    }
}
