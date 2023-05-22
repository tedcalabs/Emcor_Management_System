@extends('layouts.app')
@include('admin.components.topbar')
@include('admin.components.footer')
@include('components.sidebar')

@section('declined')

<div class="container">
    <div class="item item-15">
        <div class="" style=" margin-bottom:10px">
            
         <a href="{{ route('declined.list')}}"> <span class="head" style="color: black;">Declined Request list</span></a>  
           
            <a href="{{ route('mreq') }}" class="btn btn-primary submit-button" style="float:right;">Back</a>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
     <div class="table-responsive">
 
         <table class="table table-bordered">
             <thead>
               <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Request Detail</th>
                <th>Action</th>
               </tr>
           </thead>
           <tbody> 
            @foreach ($data as $item)
               <tr>
                <td>
                    {{ $item->id}} <br>
                   <a href="{{ route('ShowDumaRequestDC', $item->id) }}"> <i class="fa-solid fa-book icons"  style="color: red;"></i></a><br>
                  </td>
                   <td>{{ $item->name}}</td>
                   <td>{{ $item->address}}</td>
              
                   <td>{{ $item->phone}}</td>
                
                   <td>{{ $item->description}}</td>
                   <td>
                    <div class=" ">
                        <form method="GET"
                                action="{{ route('deleteReq', $item->id) }}"
                                onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')

                        <button type="submit" class="btn btn-danger" style="margin-bottom: 5px">Delete</button>
                        
                    </form>

                    </div>

                </td>
               </tr>

            
               @endforeach
           </tbody>
         </table>
   
        </div>
        {{ $data->links() }}
    </div>

        </div>
    </div>
 @endsection

@section('script')

    <script type="text/javascript">
        $(document).ready(function(){

            showRepair();

            function showRepair(){
           
            }
        })



    </script>

@endsection