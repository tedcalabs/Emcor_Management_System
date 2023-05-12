

@extends('branchb.technician.layouts.Tec_base')
@include('branchb.technician.components.topbar')
@include('branchb.technician.components.footer')
@include('branchb.technician.components.sidebar')

@section('schedule')
<div class="container">
    <div class="item item-17">

        <div class="row align-items-center">
            <div class="col-8">        
                <div class="head">
                  <a href="{{ route('whitebtech.sched') }}" style="text-decoration: none;">
                    <span class="head" style="color: black;"> Servcing Request Schedule</span>
                </a>
                </div>
            </div>
            <div class="col-4">
                <form method="GET" action="{{ route('whitebtech.sched') }}">
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
                           <a href="{{ route('updateB', $mreq->id) }}" class="btn btn-info update-button"  style="margin-bottom: 5px">Update</a>
                           {{-- <form method="GET"
                                   action="{{ route('deleteZ',$mreq->id ) }}"
                                   onsubmit="return confirm('Are you sure?');">
                               @csrf    
                               @method('DELETE')

                           <button type="submit" class="btn btn-danger">Delete</button>
                           
                       </form> --}}
                       <form method="POST" action="{{ route('deleteReqb.tech',$mreq->id ) }}">
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
