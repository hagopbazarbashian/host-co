@extends('layoutadmin.app')
@section('admin-main-content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
       <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center py-3">
                   <div class="d-flex align-items-center pt-3 gap-2">
                      <div class="form-group mb-0">
                         <select type="select" class="form-control select2-basic-multiple" placeholder="No Action">
                            <option>No Action</option>
                            <option>Status</option>
                            <option>Delete</option>
                         </select>
                      </div>
                      <button class="btn btn-primary">Apply</button>
                   </div>
                </div>
                <div class="card-body">
                   <div class="table-responsive rounded py-4 table-space">
                      <table id="user-list-table" class="table custom-table" role="grid" data-toggle="data-table">
                         <thead>
                            <tr class="ligth">
                               <th>Profile</th>
                               <th>Name</th>
                               <th>Phone Number</th>
                               <th>Email</th>
                               <th>Admin</th>
                               <th>Join Date</th>
                               <th style="min-width: 100px;">Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="text-center"><img class="bg-primary-subtle rounded img-fluid avatar-40 me-3" src="{{asset('admin/assets/images/avatars/01.png')}}" alt="profile" loading="lazy" /></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->Phone}}</td>
                                <td>{{$user->email}}</td>
                                @if ($user->is_admin == 1)
                                <td><span class="badge" style="background-color: blue">Admin</span></td>
                                @else
                                <td><span class="badge bg-primary">Active</span></td>
                                @endif
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('Y/m/d') }}</td>
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                      <a class="btn btn-sm btn-icon btn-success rounded" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Add" href="#">
                                         <span class="btn-inner">
                                            <i class="fa-solid fa-user-plus fa-xs"></i>
                                         </span>
                                      </a>
                                      <a class="btn btn-sm btn-icon btn-danger rounded delete-btn" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#">
                                         <span class="btn-inner">
                                            <i class="fa-solid fa-trash fa-xs"></i>
                                         </span>
                                      </a>
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
       </div>
    </div>
 </div>
@endsection