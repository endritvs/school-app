<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Interfaces\EventRepositoryInterface;

class EventController extends Controller
{
    private EventRepositoryInterface $eventRepository;
    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository=$eventRepository;
    }   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('schoolEvent/index');
    }

    public function adminIndex()
    {
        $events = $this->eventRepository->getAllEvents();
        return view('schoolEvent/adminEvent')->with(['events'=>$events]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $eventDetails=[
            'title'=>$request->title,
            'start'=>$request->start,
        ];
        $this->eventRepository->storeEvent($eventDetails);
        return back()->with(['msg'=>'Event successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request,$id)
    {
        $eventDetails=[
            'title'=>$request->title,
            'start'=>$request->start,
        ];
        $this->eventRepository->updateEvent($eventDetails,$id);
        return back()->with(['msg'=>'Event successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->eventRepository->deleteEvent($id);
        return back()->with(['msg'=>'Event successfully deleted!']);
    }
}
