
      @extends('layouts.app')


      @section('title')
       
           
           {{ $models->name }}
                   
       
      @endsection
        
      

        <!-- ---------------------------------------------------------------------------------------------------------- -->
      @section('content')
         
         
	            
                   <div class="car-name">
                   	 {{ $models->name }}
                   </div> 

                   <div class="edit">
                      <a href="{{ route('model.edit' , $models->id) }}">edit</a>
                   </div>

                   <form method="post" action="{{ route('model.destroy' , $models->id)}} ">

                                     <input type="hidden" name="_method" value="DELETE" />
                                     <!-- or
                                     {{ method_field('DELETE') }} -->
                                     {{ csrf_field() }}


                                     <button>DELETE</button>
                            
                   </form>

         
          

      @endsection