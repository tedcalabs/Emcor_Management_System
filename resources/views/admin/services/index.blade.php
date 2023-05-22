@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')
@include('admin.components.footer')
@section('services')


<div class="container">
<div class="item item-9">
    <div class="row">
        <div class="col-4" style="">
            <a href="{{ route('services.create')}}" class="btn btn-primary edit-button" style="float:left">Create New Services</a>
        </div>
        <div class="col-4" style="">
            <span class="head">Emcor Services</span>
        </div>
      
        <div class="col-4" style="margin-bottom: 1rem; margin-left: 8rem; width:15rem; float:right;">
            <form method="GET" action="{{ route('services.index') }}">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
       
    </div>

          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Discription</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Action</th>
                      
                    </tr>
                </thead>
                <tbody>
                  
                    @foreach ($data as $service)
                    <tr> <td>{{ $service->id}}</td>
                        <td>{{ $service->name}}</td>
                        <td>
                      <img src="{{  asset('uploads/services/'.$service->image) }}" width="70px" height="70px" alt="Image">
                        
                        </td>
                        <td>{{ $service->description}}</td>
                        <td>

                            @foreach ($service->categories as $category)
                            {{ $category->name}}</td>
                        @endforeach
                        </td>

                        <td>{{ $service->price}}</td>
                        <td>
                            <div class="">
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-info edit-button">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $service->id }}">
                                    Delete
                                </button>
                            </div>
                            <!-- Delete Service Modal -->
                            <div class="modal fade" id="deleteModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $service->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $service->id }}">Delete Service</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this service?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form method="POST" action="{{ route('services.destroy', $service->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                            
                  
                    @endforeach
                </tbody>
              </table>
          </div>
          {{ $data->links() }}
        </div>
     
    </div>
</div>

@endsection