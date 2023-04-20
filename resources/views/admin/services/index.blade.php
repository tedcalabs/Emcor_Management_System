@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')
@section('services')


<div class="container">
<div class="item item-9">

    <div class="" style=" margin-bottom:10px">
  
        <span class="head">Emcor Services</span>
    <a  href="{{ route('services.create')}}" class="btn btn-info "  style=" float:right " >Create New Services</a>
</div> 
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
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
                    <tr>
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

                            <div class=" ">
                                <a href="{{route('services.edit', $service->id) }}" class="btn btn-info edit-button">Edit</a>
                                <form method="POST"
                                        action="{{ route('services.destroy', $service->id) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')

                                <button type="submit" class="btn btn-danger" style="margin-top: 3px">Delete</button>
                                
                            </form>

                            </div>

                        </td>
                    </tr>
                     
                  
                    @endforeach
                </tbody>
              </table>
          </div>
        </div>
    </div>
</div>
@endsection