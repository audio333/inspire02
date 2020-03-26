<?php

namespace App\Http\Controllers;

use App\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateProfessor();

        $professor =  Professor::create($attributes);

        if ($request->hasFile('avatar')) {
            $professor
                ->addMedia($request->avatar)
                ->preservingOriginal()
                ->toMediaCollection('prof-avatars');
        }

        if ($request->hasFile('banner')) {
            $professor
                ->addMedia($request->banner)
                ->preservingOriginal()
                ->toMediaCollection('page-banners');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        $pageBanners = $professor->getMedia('page-banners');
        $banner = array(
            'title' => $professor->title,
            'subtitle' => $professor->subtitle,
        );

        $avatars = $professor->getMedia('prof-avatars');
        $programs = $professor->programs;

        return view('professors.show', compact('professor', 'banner', 'programs', 'avatars', 'pageBanners'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {
        //
    }

    protected function validateProfessor()
    {
        return request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
    }
}
