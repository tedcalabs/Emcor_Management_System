@extends('admin.admin_base')
@include('admin.index')
@section('services')
 <!-- table area -->
 <section class="table_area">
  <div class="panel">
      <div class="panel_header">
          <div class="panel_title">
            <span>Services Offered</span>
            <a  href="{{ route('services.create')}}" class="btn btn-info  float-left bg-slate-400" >Create Services</a>
        </div>
      </div>
      <div class="panel_body">
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Discription</th>
                        <th>Image</th>
                        <th>Servicing fee</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
              </table>
          </div>
      </div>
  </div> <!-- /table -->
@endsection