
@extends('dumaguete.brownlinestech.layouts.bltech_base')
@include('dumaguete.brownlinestech.components.topbar')
@include('dumaguete.brownlinestech.components.footer')
@include('dumaguete.brownlinestech.components.sidebar')


@section('blschedule')
<div class="container">
    <div class="item item-18">
       
        <div class="row align-items-center">
            <div class="col-8">        
                <div class="head">
                  <a href="{{ route('bl.sched') }}" style="text-decoration: none;">
                    <span class="head" style="color: black;"> Servcing Request Schedule</span>
                </a>
                </div>
            </div>
            <div class="col-4">
                <form method="GET" action="{{ route('bl.sched') }}">
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
                 
                   <th>Name</th>
                   <th>Address</th>
                   <th>Contact Number</th>
                   <th>Request Detail</th>
                   <th>Servicing Schedule</th>  
                   <th>Action</th>
                   

               </tr>
           </thead>
           <tbody> 
            @foreach ($data as $mreq)
               <tr>
                   
                   <td>{{ $mreq->name}}</td>
                   <td>{{ $mreq->address}}</td>
              
                   <td>{{ $mreq->phone}}</td>
                
                   <td>{{ $mreq->description}}</td>
                   <td>{{ $mreq->req_date}}</td>
            
                   <td>
                       <div class=" ">
                           <a href="{{ route('blupdate', $mreq->id) }}" class="btn btn-info update-button"  style="margin-bottom: 5px">Update</a>
                           <form method="GET"
                                   action="{{ route('bldelete',$mreq->id ) }}"
                                   onsubmit="return confirm('Are you sure?');">
                               @csrf    
                               @method('DELETE')

                           <button type="submit" class="btn btn-danger">Delete</button>
                           
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

