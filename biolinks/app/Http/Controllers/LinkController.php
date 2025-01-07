<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {
        // = Fazendo assim sao inseridos no banco de dados todos os campo que passaram da validação que foi colocada na rules da request StoreLink
        /*  Link::query()->create(
            $request->validated()
        ); */

        // Para associar um usuario ao link de forma manual seria
        /* 
        Link::query()->create(
            array_merge($request->validated(), ['user_id' => auth()->id()])
        ); */

        // ? Para associar dados usando o contexto do usuario
        // ? O usuario logado possui links, e eu quero criar um novo array para ele, isso é por meio do contexto do usuario

        /**  @var User $user */
        $user = auth()->user();

        $user->links()
            ->create($request->validated());

        return to_route('dashboard');
    }
    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        //
    }
}
