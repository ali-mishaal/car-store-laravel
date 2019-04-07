    @extends('files.mainStructure')


      @section('title')
        Search Results
      @endsection
        
      

        <!-- ---------------------------------------------------------------------------------------------------------- -->
      @section('content')
           @foreach($users as $user)

              {{ $user->name }}

           @endforeach
       @endsection
          

