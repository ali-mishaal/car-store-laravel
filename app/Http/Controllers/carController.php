<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Carmodel;
use App\Carimg;
use Storage;

class carController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware('auth:admin')->except('show');
    }

    public function index()
    {
       $cars = Car::latest()->paginate(100);
       return view('cars.cars')->with('cars',$cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $models = Carmodel::all();
        return view('cars.carsCreate' , compact('models'));
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
             'name'        => 'required|unique:cars',
             'description' => 'required',
             'produced'    => 'required|date',
             'mark'        => 'required',
             'model'       => 'required',
             'price'       => 'integer',
             'image'       => 'image|max:500000',
        ]);
              

        if($request->hasFile('image'))
        {
            $file      = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $mimeType  = $file->getClientMimeType();
            $fileName  = $file->getClientOriginalName();
            $size      = $file->getClientSize();
            $image_name_will_store = 'car' . time() . '.' . $extension;

            $path      = $file->storeAs('public/avatar' , $image_name_will_store);

        }else
        {
            $image_name_will_store  = 'no-image.png';
        }        


        $car = new Car;

        $car->name        = $request->input('name');
        $car->description = $request->input('description');
        $car->carmodel_id = $request->input('model');
        $car->image       = 'storage/avatar/'.$image_name_will_store;
        $car->price       = $request->input('price');
        $car->mark        = $request->input('mark');
        $car->produced    = $request->input('produced');
        $car->save();

        return redirect(route('car.index'))->with('msg' , 'car created success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $cars = Car::find($id);
        $cars->view = $cars->view + 1;
        $cars->save();

        $other_cars = Car::where('id' , '!=' , $id)->where('carmodel_id' , $cars->carmodel_id)->get();

        return view('cars.carShow' , compact('cars' , 'other_cars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cars = Car::find($id);
        $models = Carmodel::all();
        return view('cars.carEdit' , compact('cars' , 'models'));
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
        $this->validate($request , [
             'name'        => 'required|unique:cars',
             'price'       => 'integer',
             'model'       => 'required',
             'image'       => 'image|max:500000',
        ]);

         $car = Car::find($id);

        if($request->hasFile('image'))
        {
            $file      = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $mimeType  = $file->getClientMimeType();
            $fileName  = $file->getClientOriginalName();
            $size      = $file->getClientSize();

             if( $car->image !== 'storage/avatar/no-image.png' ){
                     $str = strpos($car->image , "car");
                     $str = substr($car->image , $str);

                     Storage::delete('public/avatar/'.$str);

             }
            
            $image_name_will_store = 'car' . time() . '.' . $extension;

            $path      = $file->storeAs('public/avatar' , $image_name_will_store);
        }else
        {
            $image_name_will_store  = 'no-image.png';
        } 

       
        
        $car->name        = $request->input('name');
        $car->description = $request->input('description');
        $car->carmodel_id = $request->input('model');
        $car->image       = 'storage/avatar/'.$image_name_will_store;
        $car->price       = $request->input('price');
        $car->mark        = $request->input('mark');
        $car->produced       = $request->input('produced');
        $car->save();
   
        
        return redirect(route('car.index'))->with('msg','car edited success');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $car = Car::findOrFail($request->car_id);

        if( $car->image !== 'storage/avatar/no-image.png' ){
             $str = strpos($car->image , "car");
             $str = substr($car->image , $str);

             Storage::delete('public/avatar/'.$str);

        }

        foreach ($car->carimg as $images) 
        {
            
            if( $images->image !== 'storage/carImages/no-image.png' )
            {
                 $str = strpos($images->image, 'car');
                 $str = strpos($images->image, 'car', $str + strlen('car'));
                 $str = substr($images->image , $str);

                 Storage::delete('public/carImages/'.$str);
            }

            $images->destroy($images->id);
            
        }

        $car->destroy($request->car_id);
        return redirect(route('car.index'))->with('msg','car deleted success');

    }

    public function image_show($id)
    {
       $cars = Car::find($id);
       return view('cars.addimages')->with('cars' , $cars);
    }

    public function add_images(Request $request , $id)
    {
       $cars = Car::find($id);

       if($request->hasFile('add-images'))
        {
            $files      = $request->file('add-images');
            foreach ($files as $file) {
            
                $extension = $file->getClientOriginalExtension();
                $mimeType  = $file->getClientMimeType();
                $fileName  = $file->getClientOriginalName();
                $size      = $file->getClientSize();
                
                $image_name_will_store = 'car' . rand(111,99999) . '.' . $extension;

                $path      = $file->storeAs('public/carImages' , $image_name_will_store);
                $images = new Carimg;
                $images->car_id = $cars->id;
                $images->image  = 'storage/carImages/'.$image_name_will_store;
                $images->save();
            }
        }else
        {
            $image_name_will_store  = 'no-image.png';
            $images = new Carimg;
            $images->car_id = $cars->id;
            $images->image  = 'storage/carImages/'.$image_name_will_store;
            $images->save();
        }

       return redirect()->back()->with('success' , 'images Added');

    }


   public function edit_images(Request $request)
   {
      $image = Carimg::findOrFail($request->image_id);

      if($request->hasFile('add-images'))
        {
            $file      = $request->file('add-images');
            $extension = $file->getClientOriginalExtension();
            $mimeType  = $file->getClientMimeType();
            $fileName  = $file->getClientOriginalName();
            $size      = $file->getClientSize();
            
            if( $image->image !== 'storage/carImages/no-image.png' ){
                 $str = strpos($image->image, 'car');
                 $str = strpos($image->image, 'car', $str + strlen('car'));
                 $str = substr($image->image , $str);

                 Storage::delete('public/carImages/'.$str);
            }

            $image_name_will_store = 'car' . rand(111,99999) . '.' . $extension; 
            $path      = $file->storeAs('public/carImages' , $image_name_will_store);
            
            $image->car_id = $image->car->id;
            $image->image  = 'storage/carImages/'.$image_name_will_store;
            $image->save();
            
        }


       return redirect()->back()->with('success' , 'images Edited');
   }


    public function delete_images(Request $request)
    {
        
       $image = Carimg::findOrFail($request->image_id);

        if( $image->image !== 'storage/carImages/no-image.png' ){
             $str = strpos($image->image, 'car');
             $str = strpos($image->image, 'car', $str + strlen('car'));
             $str = substr($image->image , $str);

             Storage::delete('public/carImages/'.$str);



        }

        $image->destroy($request->image_id);
        return redirect(route('addImages' , $image->car->id))->with('msg','Image deleted success');
    }
}
