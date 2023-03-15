
  
@include('secdashboard')




<div class="table_area">
    <div class="card-header">
               
        <h4>List of Request </h4>
      </div>
      <div class="hello">
      <div class="test">Hello Jquery</div>
      <button>Click me</button>
    </div>
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
            @foreach ($data as $mreq)
               <tr>
                   <td>{{ $mreq->id}}</td>
                   <td>{{ $mreq->name}}</td>
                   <td>{{ $mreq->address}}</td>
              
                   <td>{{ $mreq->phone}}</td>
                
                   <td>{{ $mreq->description}}</td>
                   <td>{{ $mreq->created_at}}</td>
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

            
               @endforeach
           </tbody>
         </table>
       </div>
   </div>
