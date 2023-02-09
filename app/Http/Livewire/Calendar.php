<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Event;
use Carbon\Carbon;

class Calendar extends Component
{
    public $events = '';
    
    public function getevent()
    {       
        $events = Event::select('id','title','start')->get();
 
        return  json_encode($events);
    }
 
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function addevent($event)
    {
        $input['title'] = $event['title'];
        $input['start'] = Carbon::parse($event['start'])->format('Y-m-d');
        Event::create($input);
    }
 
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function eventDrop($event, $oldEvent)
    {
      $eventdata = Event::find($event['id']);
      $eventdata->start = Carbon::parse($event['start'])->format('Y-m-d');
      $eventdata->save();
    }
 
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function render()
    {       
        $events = Event::select('id','title','start')->get();
 
        $this->events = json_encode($events);
 
        return view('livewire.calendar');
    }
}