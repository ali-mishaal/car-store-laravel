<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carmodel;
class modeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $models = Carmodel::latest()->get();
        return view('model.models')->with('models' , $models);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $models = Carmodel::where('parent_id' , 0)->get();
          return view('model.modeCreate')->with('models' , $models);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
             
             'name' => 'required|unique:carmodels',
             'details' => 'required',

        ]);



        $models = new Carmodel;
        $models->name = $request->input('name');
        $models->details = $request->input('details');
        $models->parent_id = $request->input('parent');
        $models->save();

        return redirect(route('model.index'))->with('msg' , 'model created success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $models = Carmodel::find($id);
        return view('model.modelShow')->with('models' , $models);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $models = Carmodel::find($id);
        return view('model.modelEdit')->with('models' , $models);
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
        $models = Carmodel::find($id);
        $models->name = $request->input('name');
        $models->details = $request->input('details');
        $models->save();

        return redirect(route('model.index'))->with('msg' , 'model edited success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $model = Carmodel::findOrFail($request->model_id);
        $model->destroy($request->model_id);
        return redirect(route('model.index'))->with('msg' , 'model deleted success');
    }
}
