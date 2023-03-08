
  
@include('secdashboard')




<div class="table_area">
    <div class="card-header">
               
        <h4>List of Request </h4>
      </div>
     <div class="table-responsive">
         <table class="table table-bordered">
             <thead>
               <tr>
                   <th>Id</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Role</th>
                   <th>Action</th>

               </tr>
           </thead>
           <tbody> 
            
               <tr>
                   <td>1</td>
                   <td>2</td>
                   <td>3</td>
              
                   <td> 4</td>
                
                  </td>
                   <td>
                       <div class=" ">
                           <a href="" class="btn btn-info">Edit</a>
                           <form method="POST"
                                   action=""
                                   onsubmit="return confirm('Are you sure?');">
                               @csrf
                               @method('DELETE')

                           <button type="submit" class="btn btn-red">Delete</button>
                           
                       </form>

                       </div>

                   </td>
               </tr>

            
               
           </tbody>
         </table>
       </div>
   </div>
