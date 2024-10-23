@extends('layoutadmin.app')
@section('admin-main-content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
       <div class="col-lg-8">
          <div class="row">
             <div class="col-sm-6 col-lg-6 col-xl-3">
                <div class="card card-block card-stretch card-height">
                   <div class="card-body">  
                      <div class="d-flex align-items-center justify-content-between">
                         <div class="iq-cart-text text-capitalize">
                            <p class="mb-0">
                               view
                            </p>
                         </div>
                         <div class="icon iq-icon-box-top rounded-circle bg-primary">
                            <svg class="text-white" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 24">
                               <path
                                  fill-rule="evenodd"
                                  clip-rule="evenodd"
                                  d="M15.1614 12.0531C15.1614 13.7991 13.7454 15.2141 11.9994 15.2141C10.2534 15.2141 8.83838 13.7991 8.83838 12.0531C8.83838 10.3061 10.2534 8.89111 11.9994 8.89111C13.7454 8.89111 15.1614 10.3061 15.1614 12.0531Z"
                                  stroke="currentColor"
                                  stroke-width="1.5"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                               />
                               <path
                                  fill-rule="evenodd"
                                  clip-rule="evenodd"
                                  d="M11.998 19.355C15.806 19.355 19.289 16.617 21.25 12.053C19.289 7.48898 15.806 4.75098 11.998 4.75098H12.002C8.194 4.75098 4.711 7.48898 2.75 12.053C4.711 16.617 8.194 19.355 12.002 19.355H11.998Z"
                                  stroke="currentColor"
                                  stroke-width="1.5"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                               />
                            </svg>
                         </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mt-3">
                         <h4 class="mb-0">{{$Visitor}}</h4>
                         <p class="mb-0 text-primary">
                            <span><i class="fa fa-caret-down me-2"></i></span>35%
                         </p>
                      </div>
                   </div>
                </div>
             </div>
             
             <div class="col-sm-6 col-lg-6 col-xl-3">
                <div class="card card-block card-stretch card-height">
                   <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                         <div class="iq-cart-text text-capitalize">
                            <p class="mb-0 font-size-14">
                               Transfer Files
                            </p>
                         </div>
                         <div class="icon iq-icon-box-top rounded-circle bg-info">
                            <svg class="text-white" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 24">
                               <path
                                  fill-rule="evenodd"
                                  clip-rule="evenodd"
                                  d="M2.75 12C2.75 17.108 6.891 21.25 12 21.25C17.108 21.25 21.25 17.108 21.25 12C21.25 6.892 17.108 2.75 12 2.75C6.891 2.75 2.75 6.892 2.75 12Z"
                                  stroke="currentColor"
                                  stroke-width="1.5"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                               />
                               <path d="M8.52832 10.5576L11.9993 14.0436L15.4703 10.5576" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                         </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mt-3">
                         <h4 class="mb-0">{{$transfer}}</h4>
                         <p class="mb-0 text-info">
                            <span><i class="fa fa-caret-up me-2"></i></span>80%
                         </p>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-sm-6 col-lg-6 col-xl-3">
               <div class="card card-block card-stretch card-height">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="iq-cart-text text-capitalize">
                           <p class="mb-0 font-size-14">
                              Downloaded Aplication
                           </p>
                        </div>
                        <div class="icon iq-icon-box-top rounded-circle bg-info">
                           <svg class="text-white" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 24">
                              <path
                                 fill-rule="evenodd"
                                 clip-rule="evenodd"
                                 d="M2.75 12C2.75 17.108 6.891 21.25 12 21.25C17.108 21.25 21.25 17.108 21.25 12C21.25 6.892 17.108 2.75 12 2.75C6.891 2.75 2.75 6.892 2.75 12Z"
                                 stroke="currentColor"
                                 stroke-width="1.5"
                                 stroke-linecap="round"
                                 stroke-linejoin="round"
                              />
                              <path d="M8.52832 10.5576L11.9993 14.0436L15.4703 10.5576" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                           </svg>
                        </div>
                     </div>
                     <div class="d-flex align-items-center justify-content-between mt-3">
                        <h4 class="mb-0">{{$LinkClick}}</h4>
                        <p class="mb-0 text-info">
                           <span><i class="fa fa-caret-up me-2"></i></span>80%
                        </p>
                     </div>
                  </div>
               </div>
            </div>
          </div>
          
       </div>
       <div class="col-lg-4">
          <div class="card card card-block card-stretch card-height">
             <div class="card-header">
                <div class="iq-header-title">
                   <h4 class="card-title text-center">User's Of Product</h4>
                </div>
             </div>
             <div class="card-body pb-0">
                <div id="view-chart-01"></div>
                <div class="row mt-1">
                   <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                      <div class="card border-0">
                         <div class="card-body bg-body p-3">
                            <div class="d-flex align-items-center">
                               <div class="iq-user-box bg-primary"></div>
                               <div class=" ">
                                  <p class="mb-0 font-size-14 line-height">
                                     New <br />
                                     Customer
                                  </p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                      <div class="card border-0">
                         <div class="card-body bg-body p-3">
                            <div class="d-flex align-items-center">
                               <div class="iq-user-box bg-warning"></div>
                               <div class=" ">
                                  <p class="mb-0 font-size-14 line-height">
                                     Existing <br />
                                     Subscriber's
                                  </p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                      <div class="card border-0">
                         <div class="card-body bg-body p-3">
                            <div class="d-flex align-items-center">
                               <div class="iq-user-box bg-info"></div>
                               <div class=" ">
                                  <p class="mb-0 font-size-14 line-height">
                                     Daily<br />
                                     Visitor's
                                  </p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                      <div class="card border-0">
                         <div class="card-body bg-body p-3">
                            <div class="d-flex align-items-center">
                               <div class="iq-user-box bg-danger"></div>
                               <div class=" ">
                                  <p class="mb-0 font-size-14 line-height">
                                     Extended <br />
                                     Subscriber's
                                  </p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>

    <div class="row">

      
      <div class="col-sm-12">
         <div class="card">
             <div class="card-header d-flex justify-content-between align-items-center gap-2">
                 <div class="card-title">
                     <h4 class="mb-0">Recently Viewed Items</h4>
                 </div>
                 <div class="card-header-toolbar d-flex align-items-center seasons">
                     <div class="iq-custom-select d-inline-block sea-epi s-margin">
                         <select name="cars" class="form-control season-select">
                             <option value="season1">Most Likely</option>
                             <option value="season2">Unlikely</option>
                         </select>
                     </div>
                 </div>
             </div>
             <div class="card-body">  
                 <div class="table-responsive table-view table-space">
                     <table class="data-tables table custom-table movie_table" style="width: 100%;" data-toggle="data-table">
                         <thead>
                             <tr>
                                 <th style="width: 20%;">User Name</th>
                                 <th style="width: 10%;">User Phone Number</th>
                                 <th style="width: 20%;">User Email</th>
                                 <th style="width: 10%;">IP</th>
                             </tr>
                         </thead>
                         <tbody>
                           @foreach ($Users as $User)
                           <tr> 
                              <td>{{$User->name}}</td>
                              <td>{{$User->Phone}}</td>
                              <td>{{$User->email}}</td>
                              <td>{{ $User->ip_address ?? '-----'}}</td>
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
@endsection