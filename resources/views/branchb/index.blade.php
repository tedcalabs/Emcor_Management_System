

@extends('branchb.workexpert.layouts.workExpert_base')
@include('branchb.workexpert.components.topbar')
@include('branchb.workexpert.components.footer')
@include('branchb.workexpert.components.sidebar')
@section('contentx')


<div class="container">

  
<div class="item item-1"> 
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Request Detail</th>
                  <th>Date of Request</th>
                  <th>Action</th>
                  <th>Edit</th>
              </tr>
          </thead>
          <tbody> 
         
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
             
                  <td></td>
               
                  <td></td>
                  <td></td>
                  <td>
                      <div class=" ">
                          <a href="" class="btn btn-info" style="margin-bottom: 5px">Accept</a>
                          <form method="POST"
                                  action=""
                                  onsubmit="return confirm('Are you sure?');">
                              @csrf
                              @method('DELETE')

                          <button type="submit" class="btn btn-danger text-black">Decline</button>
                          
                      </form>

                      </div>

                  </td>
                  <td>
                   <div class=" ">
                       <a href="" class="btn btn-info "  style="margin-bottom: 5px">Edit</a>
                       <form method="POST"
                               action=""
                               onsubmit="return confirm('Are you sure?');">
                           @csrf
                           @method('DELETE')

                       <button type="submit" class="btn btn-danger text-black" style="margin-bottom: 5px">Delete</button>
                       
                   </form>

                   </div>

               </td>
              </tr>

          </tbody>
        </table>
      </div>
   </div>

</div>



@endsection



 


