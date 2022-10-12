@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 

<style>
.nav-tabs .nav-item .nav-link.active {
  background: #7b7d7fe6;
}
.nav-tabs .nav-item .nav-link {    
  padding: 10px 20px;
}
.custom-checkbox
{
    margin-left:6%;
}
span 
{
  background: #80808087;
  padding: 4px;
  border-radius: 10px;            
}
.test
{
   
    padding: 5px;
    -moz-padding-start: calc(0.75rem - 3px);
    font-size: 15px;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;   
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
<div class="container">
  <div class="col-lg-8 col-sm-12 mt-2 mb-4">           
      <a href="{{route('company.home')}}"> Back to Homepage</a>
  </div>
   
  <!--================================= Manage Jobs -->
<section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="user-dashboard-info-box mb-0">
            <div class="row mb-4">
              <div class="col-md-6 col-sm-5 d-flex align-items-center">
                <div class="section-title-02 mb-0 ">
                  <h4 class="mb-0">Jobs & Responses</h4>
                </div>
              </div>
              <div class="col-md-6 col-sm-7 mt-3 mt-sm-0" style="display:flex;">
                <div class="form-group" style="margin-top:5px;">
                    <label for="select2" class="ms-2">Posted By</label>
                    <select class="test mt-2 ms-2" name="select2" id="select2">
                        <option value="0">All</option>
                        <option value="1">You</option>
                        <option value="2">Others</option>
                    </select>
                </div>
                <div class="form-group"  style="margin-top:5px;">
                    <label for="select2" class="ms-2">Status</label>
                    <select class="test mt-2 ms-2" name="select2" id="select2">
                        <option value="0">All Jobs</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                        <option value="3">Inactive</option>
                        <option value="4">Shared</option>
                    </select>
                </div>
                <div class="form-group"  style="margin-top:5px;">
                    <label for="select3" class="ms-3">Show Page</label>
                    <select class="test mt-2 ms-2" name="select3" id="select3">
                        <option value="0">20</option>
                        <option value="1">30</option>
                        <option value="2">50</option>
                        <option value="2">100</option>
                        <option value="2">150</option>
                        <option value="2">200</option>
                    </select>
                   
                </div>
              </div>
            </div>
            <div class="user-dashboard-table table-responsive">
              <table class="table table-bordered">
                <thead class="bg-light">
                  <tr>
                    <th scope="col">Job Title</th>
                    <th scope="col">Responses</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                @if(isset($postJobs) && count($postJobs))
                    @foreach($postJobs as $jobs) 
                    <tr>                        
                        <th scope="row">
                        <a href="" target="_blank" >{{$jobs->title}}</a>
                        <p class="mb-1 mt-2">Posted Date: {{ date("d-M-Y", strtotime($jobs->created_at)) }}</p>
                        <p class="mb-0">Expiry Date: {{ date("d-M-Y", strtotime($jobs->expiry_date)) }}</p>
                      </th>                                   
                        <td class="text-center"> <a href="#" class="text-primary">{{count($jobs->appliedUsers)}}</a></td>
                        <td class="text-center"><span>{{$user->name}}</span></td>
                        <td>{{ date("d-M-Y", strtotime($jobs->created_at)) }} </td>
                        <td>
                          <ul class="list-unstyled mb-0 d-flex">
                            <li><a  href="{{route('job.detail', [$jobs->slug,'type' => 'View'])}}" class="text-primary" data-bs-toggle="tooltip" title="view"><i class="far fa-eye"></i></a></li>
                            <li><a href="{{route('edit.front.job', [$jobs->id])}}" class="text-info" data-bs-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a></li>
                            <li><a href="{{route('delete.front.job', [$jobs->id])}}" class="text-danger" data-bs-toggle="tooltip" title="Delete"><i class="far fa-trash-alt"></i></a></li>
                            <!-- <li><a href="#" class="text-danger" data-bs-toggle="tooltip" title="Share"><i class="fa fa-share"></i></a></li> -->
                          </ul>
                        </td>
                    </tr>
                    @endforeach
                    @endif 
                </tbody>
              </table>
            </div>
            <div class="col-12 text-center">                
                {{ $postJobs->links('pagination.default') }}
            </div>
            <!-- <div class="row justify-content-center">
              <div class="col-12 text-center">
                <ul class="pagination mt-3">
                  <li class="page-item disabled me-auto">
                    <span class="page-link b-radius-none">Prev</span>
                  </li>
                  <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item ms-auto">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================   Manage Jobs --> 
</div>
</div>
@include('includes.footer')
    @endsection

<script>
$("#tab-01").on("click",function(){
$("#pagetwo").hide();
$("#pageone").show();          
});
$("#tab-02").on("click",function(){
$("#pageone").hide();
$("#pagetwo").show();
});
</script>