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
                               <th>Files Name</th>
                               <th>Date</th>
                               <th style="min-width: 100px;">Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($transfers as $transfer)
                            <tr>
                                <td>{{$transfer->file_path}}</td>
                                <td>{{ \Carbon\Carbon::parse($transfer->created_at)->format('Y/m/d') }}</td>
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                      {{-- <a class="btn btn-sm btn-icon btn-success rounded" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Add" href="#">
                                         <span class="btn-inner">
                                            <i class="fa-solid fa-user-plus fa-xs"></i>
                                         </span>
                                      </a> --}}
                                      <form action="{{route('remove_files',$transfer->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                       @csrf <!-- CSRF token for security -->
                                       @method('DELETE') <!-- Spoofing the method to DELETE -->
                                   
                                       <button type="submit" class="btn btn-sm btn-icon btn-danger rounded delete-btn" data-bs-toggle="tooltip" data-placement="top" title="Delete">
                                           <span class="btn-inner">
                                               <i class="fa-solid fa-trash fa-xs"></i>
                                           </span>
                                       </button>
                                   </form>
                                   
                                   </div>
                                </td>
                             </tr>
                            @endforeach
                         </tbody>
                         <script>
                           document.querySelectorAll('.delete-btn').forEach(button => {
                               button.addEventListener('click', function(event) {
                                   event.preventDefault(); // Prevent form submission
                                   if (confirm('Are you sure you want to delete this user?')) {
                                       this.closest('form').submit(); // Submit form if confirmed
                                   }
                               });
                           });
                           </script>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection