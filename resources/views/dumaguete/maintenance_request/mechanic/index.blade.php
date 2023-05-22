

@extends('layouts.app')
@include('admin.components.topbar')
@include('admin.components.footer')
    @include('components.sidebar')
@section('requestm')

<div class="container">
    <div class="item item-15">
        <div class="row">
            <div class="col-4" style="">
                <a href="{{ route('accept') }}" class="btn btn-primary edit-button" style="float:left">Acceted Request</a>
            </div>
            <div class="col-4" style="">
                <span class="head">Mechanic Request list</span>
            </div>
          
            <div class="col-4" style="margin-bottom: 1rem; margin-left: 8rem; width:15rem; float:right;">
                <form method="GET" action="{{ route('mechanic.req')}}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
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
                   <th>Edit</th>

               </tr>
           </thead>
           <tbody> 
            @foreach ($data as $item)
               <tr>
                <td>
                    {{ $item->id}} <br>
                   <a href="{{ route('ShowDumaRequestMBL', $item->id) }}"> <i class="fa-solid fa-book icons"  style="color: red;"></i></a><br>
                </td>
                   <td>{{ $item->name}}</td>
                   <td>{{ $item->address}}</td>
                   <td>{{ $item->phone}}</td>
                   <td>{{ $item->description}}</td>
                   <td>
                       <div class=" ">
                           <a href="{{ route('updateMechReq', $item->id) }}" class="btn btn-info accept-button" style="margin-bottom: 5px">Accept</a><br>
                           <a href="{{ route('decline.request', $item->id) }}" class="btn btn-danger" style="margin-bottom: 5px">Decline</a>

                       </div>

                   </td>
                   <td>
                    <div class=" ">
                        <a href="{{ route('upReq', $item->id) }}" class="btn btn-info edit-button" style="margin-bottom: 5px">Edit</a>
                        <form method="POST" action="{{ route('deleteReq', $item->id) }}">
                            @csrf
                            @method('DELETE')
                    
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" style="margin-bottom: 5px">Delete</button>
                        </form>
                    </div>
                    
                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                    <form method="POST" action="{{ route('deleteReq', $item->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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