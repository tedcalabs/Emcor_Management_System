


@extends('branchb.secretary.layouts.bsec_base')
@include('branchb.secretary.components.topbar')
@include('branchb.secretary.components.sidebar')
@include('branchb.secretary.components.footer')

@section('declinedLists')

<div class="container">
    <div class="item item-15">
        <div class="" style=" margin-bottom:10px">
            
            <a href="{{ route('bdeclined.list')}}"> <span class="head" style="color: black;">Declined Request list</span></a>  
           
            <a href="{{ route('mreqb') }}" class="btn btn-primary submit-button" style="float:right;">Back</a>


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
                   <th>Schedule</th>   
                   <th>Status</th>
                                   
                   <th>Action</th>

               </tr>
           </thead>
           <tbody> 
            @foreach ($data as $item)
               <tr>
                   <td>{{ $item->id}}</td>
                   <td>{{ $item->name}}</td>
                   <td>{{ $item->address}}</td>
              
                   <td>{{ $item->phone}}</td>
                
                   <td>{{ $item->description}}</td>
                   <td>{{ $item->req_date}}</td>
                   <td>{{ $item->status}}</td>
                   <td>
                    <div class=" ">
                        <a href="{{ route('upReqb', $item->id) }}" class="btn btn-success edit-button">Edit</a>
                        <form method="POST" action="{{ route('deleteReqb',$item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$item->id}}">
                                Delete
                            </button>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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