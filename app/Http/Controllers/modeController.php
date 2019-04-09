<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carmodel;
use Storage;

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

    public function delete_sons($model){
        foreach ($model->car as $cars) 
        {
           if( $cars->image !== 'storage/avatar/no-image.png' )
           {
             $str = strpos($cars->image , "car");
             $str = substr($cars->image , $str);

             Storage::delete('public/avatar/'.$str);

           }
           $cars->destroy($cars->id);

           foreach($cars->carimg as $images)
           {
               if( $images->image !== 'storage/carImages/no-image.png' )
               {
                 $str = strpos($images->image, 'car');
                 $str = strpos($images->image, 'car', $str + strlen('car'));
                 $str = substr($images->image , $str);

                 Storage::delete('public/carImages/'.$str);
               }
               $images->destroy($images->id) ;
           }
           
        }
    }


    public function destroy(Request $request)
    {
        
        $model = Carmodel::findOrFail($request->model_id);

        if ($model->parent_id == 0)
        {
           $models_sons = Carmodel::where('parent_id' , $model->id)->get();
           foreach ($models_sons as $sons) {
               $this->delete_sons($sons);
               $sons->destroy($sons->id);
           }
        }else
        {
          $this->delete_sons($model);  
        }

        

        $model->destroy($request->model_id);
        return redirect(route('model.index'))->with('msg' , 'model deleted success');
    }
}
