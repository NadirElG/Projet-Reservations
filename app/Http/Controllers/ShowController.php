<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;


use App\Models\Show;
use App\Models\Location;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Show::simplePaginate(6);


        
        return view('show.index',[
            'shows' => $shows,
            'resource' => 'spectacles',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('show.create', ['locations' => $locations]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $show = new Show;
    $show->title = $request->title;
    $slug = Str::slug($request->title);
    $originalSlug = $slug;
    $counter = 2;

    while (Show::whereSlug($slug)->exists()) {
        $slug = "{$originalSlug}-" . $counter++;
    }

    $show->slug = $slug;
    $show->description = $request->description;
    $show->poster_url = $request->poster_url;
    $show->location_id = $request->location_id;
    $show->bookable = $request->has('bookable');
    $show->price = $request->price;
    
    try {
        $show->save();
    } catch (\Exception $e) {
        // Gérer l'erreur ici, par exemple renvoyer à la page avec une erreur
        return back()->withError($e->getMessage())->withInput();
    }
    
    return redirect()->route('show_index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Show::find($id);
    
        $collaborateurs = [];
        foreach($show->artistTypes as $at) {
            $collaborateurs[$at->type->type][] = $at->artist;
        }
        
        return view('show.show',[
            'show' => $show,
            'collaborateurs' => $collaborateurs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function processPayment(Request $request)
    {
    // Votre logique de traitement de paiement ici
    // Par exemple, vous pouvez créer une transaction dans votre base de données
    // et rediriger l'utilisateur vers une page de confirmation de paiement
    
    // Exemple de redirection vers une page de confirmation
    return redirect()->route('payment_confirmation');
    }

    


}
