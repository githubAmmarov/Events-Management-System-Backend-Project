<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\Api\StoreEventRequest;
use App\Http\Requests\Api\UpdateEventRequest;
use App\Http\Responses\Response;
use App\Services\ClassServices\EventService;
use Exception;
use Illuminate\Http\JsonResponse;

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
            $user_id = auth()->id();
            $eventData = array_merge($request->all(),['user_id'=>$user_id]);
            $event = $this->eventService->createEvent($eventData);
            $message = 'the event is created successfully';
            return Response::Success($event, $message, 201);
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
