@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')
@section('requests')
 <!-- table area -->
 <section class="table_area">
  <div class="panel">
      <div class="panel_header">
          <div class="panel_title"> <span>Request for Sevicing lists</span>
          <a  href="{{ route('categories.create')}}" class="btn btn-info  float-right bg-slate-400" >Create Request List</a>
        </div>
      </div>
      <div class="panel_body">
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date</th>
                        <th>Status</th>
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