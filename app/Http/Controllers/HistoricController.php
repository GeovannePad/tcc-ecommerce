<?php

namespace Doomus\Http\Controllers;

use Doomus\Historic;
use Illuminate\Http\Request;
use Session;
use Doomus\Http\Controllers\UserController as User;

class HistoricController extends Controller
{
     /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $historic = User::getHistoric();
        return view('user.historic')->with('historic', $historic);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $historic = new Historic();
        $historic->product_id = $request->product_id;
        $historic->user_id = $user->id;
        $historic->status = $request->status;
        $historic->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\Historic  $historic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historic $historic)
    {
        $historic_of_user = $historic->id;
        $historic_of_user->destroy();

        Session::flash('status', 'Histórico apagado com sucesso');

        return back();
    }
}
