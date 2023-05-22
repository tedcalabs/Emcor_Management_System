

@extends('layouts.app')
@include('admin.components.topbar')
@include('admin.components.footer')
    @include('components.sidebar')
@section('request')

<div class="container">
    <div class="item item-15">

        <div class="row align-items-center">
            <div class="col-8">        
                <div class="head">
                  <a href="{{ route('accept') }}" style="text-decoration: none;">
                    <span class="head" style="color: black;">Accepted Request list</span>
                </a>
                </div>
            </div>
            <div class="col-4">
                <form method="GET" action="{{ route('accept') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>
            </div>
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
            @foreach ($data as $list)
               <tr>
                <td>
                    {{ $list->id}} <br>
                   <a href="{{ route('ShowDumaRequestAC', $list->id) }}"> <i class="fa-solid fa-book icons"  style="color: red;"></i></a><br>
                </td>
                   <td>{{ $list->name}}</td>
                   <td>{{ $list->address}}</td>
                   <td>{{ $list->phone}}</td>
                   <td>{{ $list->description}}</td>
                  
                   <td>
                    <div class=" ">
                     
                        <form method="GET"
                                action="{{ route('deleteReq', $list->id) }}"
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