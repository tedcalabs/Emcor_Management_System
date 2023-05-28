

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
                <th>Request Detail</th>
                <th>Servicing Date</th>
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
                   <td>{{ $list->description}}</td>
                   <td>{{ \Carbon\Carbon::parse($list->req_date)->format('d/m/Y g:i:s A')}}</td>
                  
                   <td>
                    <div class=" ">
                        <form method="POST" action="{{ route('deleteReq', $list->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$list->id}}">
                                Delete
                            </button>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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