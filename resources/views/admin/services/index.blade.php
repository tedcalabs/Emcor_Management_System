@extends('admin.admin_master')
@include('admin.index')
@section('services')
 <div class="table_area">
    <a  href="{{ route('services.create')}}" class="btn btn-info " >Create New Services</a>

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
                            {{ $category->catname}}</td>
                        @endforeach
                        </td>

                        <td>{{ $service->price}}</td>
                        <td>

                            <div class=" ">
                                <a href="{{route('services.edit', $service->id) }}" class="btn btn-info">Edit</a>
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

@endsection