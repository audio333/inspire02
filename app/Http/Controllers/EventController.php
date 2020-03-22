<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = array(
            'title' => 'Welcome to our blog!',
            'subtitle' => 'Keep with our latest news',
            'content' => '',
        );

        $events = Event::orderBy('event_date', 'desc');

        // Filter by url param
       if ($month = request('month')) {
            $events->whereMonth('event_date', Carbon::parse($month)->month);
        }

       if ($year = request('year')) {
            $events->whereYear('event_date', $year);
        }

        $events = $events->paginate(5);

        // Temporary
        $archives = Event::selectRaw('year(event_date) year, monthname(event_date) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(event_date) desc')
            ->get()
            ->toArray();

        return view('events.index', compact('banner','events', 'archives'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

        $banner = array(
            'title' => '',
            'subtitle' => 'Dont forget to replace me later',
            'content' => '',
        );

        return view('events.show', compact('event', 'banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
