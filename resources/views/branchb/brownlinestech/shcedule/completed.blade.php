@extends('branchb.brownlinestech.layouts.bltech_base')
@include('branchb.brownlinestech.components.topbar')
@include('branchb.brownlinestech.components.sidebar')

@section('scheduleComplete')
<di class="container">
    <div class="item item-17">

        <div class="row align-items-center">
            <div class="col-8">        
                <div class="head">
                  <a href="{{ route('completed.brwon.bywn') }}" style="text-decoration: none;">
                    <span class="head" style="color: black;"> Completed Services </span>
                </a>
                </div>
            </div>
            <div class="col-4">
                <form method="GET" action="{{ route('completed.brwon.bywn') }}">
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
                   <th>Unit/Model</th>
                   <th>Serial Number</th>
                   <th>Unit Description</th>
                   <th>Trouble</th>
                   <th>Servicing Date</th>  
                   <th>Date Completed</th> 
                   <th>assessment</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody> 
            @foreach ($data as $mreq)
               <tr>               
                   <td>{{ $mreq->name}}</td>
                   <td>{{ $mreq->address}}</td>
                   <td>{{ $mreq->phone}}</td>
                   <td>{{ $mreq->model}}</td>
                   <td>{{ $mreq->serial_no}}</td>
                   <td>{{ $mreq->unit_info}}</td>
                   <td>{{ $mreq->description}}</td>
                   <td>{{ \Carbon\Carbon::parse($mreq->req_date)->format('d/m/Y g:i:s A')}}</td>
                   <td>{{ \Carbon\Carbon::parse($mreq->req_date)->format('d/m/Y g:i:s A')}}</td>
                   <td>{{ $mreq->assessment}}</td>
                   <td>
                       <div class=" ">
                           {{-- <a href="{{ route('updateD', $mreq->id) }}" class="btn btn-info update-button"  style="margin-bottom: 5px">Update</a> --}}
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
    </di qv>
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

