
@extends('branchb.brownlinestech.layouts.bltech_base')
@include('branchb.brownlinestech.components.topbar')
@include('branchb.brownlinestech.components.sidebar')
@include('branchb.brownlinestech.components.footer')
@section('blschedule')
{{-- <div class="container">
    <div class="item item-5">
        <div class="head">Maintenance Request</div>

        
       
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
                   <th>Servicing Schedule</th>  
                   <th>Action</th>
                   

               </tr>
           </thead>
           <tbody> 
            @foreach ($data as $mreq)
               <tr>
                   <td>{{ $mreq->id}}</td>
                   <td>{{ $mreq->name}}</td>
                   <td>{{ $mreq->address}}</td>
              
                   <td>{{ $mreq->phone}}</td>
                
                   <td>{{ $mreq->description}}</td>
                   <td>{{ $mreq->req_date}}</td>
            
                   <td>
                       <div class=" ">
                           <a href="{{ route('blupdate', $mreq->id) }}" class="btn btn-info"  style="margin-bottom: 5px">Update</a>
                           <form method="GET"
                                   action="{{ route('bldelete',$mreq->id ) }}"
                                   onsubmit="return confirm('Are you sure?');">
                               @csrf    
                               @method('DELETE')

                           <button type="submit" class="btn btn-danger text-black">Delete</button>
                           
                       </form>

                       </div>

                   </td>
                  
               </tr>

            
               @endforeach
           </tbody>
         </table>
   
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



    </script> --}}

    <div class="container">
        <div class="item item-17">
    
            <div class="row align-items-center">
                <div class="col-8">        
                    <div class="head">
                      <a href="{{ route('getBrownSchedBl.sched') }}" style="text-decoration: none;">
                        <span class="head" style="color: black;"> Servcing Request Schedule</span>
                    </a>
                    </div>
                </div>
                <div class="col-4">
                    <form method="GET" action="{{ route('getBrownSchedBl.sched') }}">
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
                    <th>Servicing Schedule</th>  
                    <th>Action</th>
                   </tr>
               </thead>
               <tbody> 
                @foreach ($data as $mreq)
                   <tr>               
                    <td>
                        {{ $mreq->id}} <br>
                       <a href="{{ route('BLShowDumaRequestJH', $mreq->id) }}"> <i class="fa-solid fa-book icons"  style="color: red;"></i></a><br>
                    </td>
                       <td>{{ $mreq->name}}</td>
                       <td>{{ $mreq->address}}</td>
                       <td>{{ $mreq->phone}}</td>
    
                       <td>{{ \Carbon\Carbon::parse($mreq->req_date)->format('d/m/Y g:i:s A')}}</td>
                
                       <td>
                           <div class=" ">
                               <a href="{{ route('updateBBrown', $mreq->id) }}" class="btn btn-info update-button"  style="margin-bottom: 5px">Update</a>
                 
                           <form method="POST" action="{{ route('deleteReqb.brown.bywn',$mreq->id ) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$mreq->id}}">
                                Delete
                            </button>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{$mreq->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this item?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

