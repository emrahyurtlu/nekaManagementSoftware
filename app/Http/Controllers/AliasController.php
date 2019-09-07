<?php

namespace App\Http\Controllers;

use App\Http\Requests\AliasRequest;
use App\Models\Alias;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AliasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $aliases = Alias::all();
        return view('aliases.index', ['aliases' => $aliases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('aliases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(AliasRequest $request)
    {
        if ($request->validated()) {

            $alias = new Alias();
            $alias->name = $request->get('name');

            $alias->save();

            return redirect()->to('/aliases');
        } else {
            return redirect()->to('/aliases/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Alias $alias
     * @return Response
     */
    public function show(Alias $alias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Alias $alias
     * @return Response
     */
    public function edit(Alias $alias)
    {
        return view('aliases.edit', ['alias' => $alias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Alias $alias
     * @return Response
     */
    public function update(Request $request, Alias $alias)
    {
        $alias->name = $request->get('name');
        $alias->save();
        return redirect()->to('/aliases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Alias $alias
     * @return Response
     */
    public function destroy(Alias $alias)
    {
        $alias->delete();
    }
}
