<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use App\Models\Vote;
use Illuminate\Http\Response;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('idea.index', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')
                ])
                ->withCount('votes')
                ->orderBy('id', 'desc')
                ->simplePaginate(Idea::PAGINATION_COUNT),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreIdeaRequest $request
     * @return Response
     */
    public function store(StoreIdeaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Idea $idea
     * @return Response
     */
    public function show(Idea $idea)
    {

//        dd($idea->votes());

        return view('idea.show', [
            'idea' => $idea,
            'votesCount' => $idea->votes->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Idea $idea
     * @return Response
     */
    public function edit(Idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateIdeaRequest $request
     * @param Idea $idea
     * @return Response
     */
    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Idea $idea
     * @return Response
     */
    public function destroy(Idea $idea)
    {
        //
    }
}