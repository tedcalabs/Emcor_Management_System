@extends('dumaguete.mechanic.layouts.mechanic_base')
@include('dumaguete.mechanic.components.topbar')
@include('dumaguete.mechanic.components.footer')
@include('dumaguete.mechanic.components.sidebar')

@section('schedule')
<di class="container">
    <div class="item item-17">

        <div class="row align-items-center">
            <div class="col-8">        
                <div class="head">
                  <a href="{{ route('completed.sched.mec') }}" style="text-decoration: none;">
                    <span class="head" style="color: black;"> Completed Services </span>
                </a>
                </div>
            </div>
            <div class="col-4">
                <form method="GET" action="{{ route('completed.sched.mec') }}">
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
                <th>Servicing Date</th>
                <th>Action</th>
               </tr>
           </thead>
           <tbody> 
            @foreach ($data as $mreq)
               <tr>               
                <td>
                    {{ $mreq->id}} <br>
                   <a href="{{ route('ShowDumaRequestCMT', $mreq->id) }}"> <i class="fa-solid fa-book icons"  style="color: red;"></i></a><br>
                </td>
                   <td>{{ $mreq->name}}</td>
                   <td>{{ $mreq->address}}</td>
                   <td>{{ $mreq->phone}}</td>
                   <td>{{ \Carbon\Carbon::parse($mreq->req_date)->format('d/m/Y g:i:s A')}}</td>
                   <td>
                       <div class=" ">
                           {{-- <a href="{{ route('updateD', $mreq->id) }}" class="btn btn-info update-button"  style="margin-bottom: 5px">Update</a> --}}
                           <form method="GET"
                                   action="{{ route('deleteZ',$mreq->id ) }}"
                                   onsubmit="return confirm('Are you sure?');">
                               @csrf    
                               @method('DELETE')

                           <button type="submit" class="btn btn-danger delete-button">Delete</button>
                           
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

