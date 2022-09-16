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
</style>
<div class="container">
  <div class="col-lg-8 col-sm-12 mt-2 mb-4">           
      <a href="{{route('company.home')}}"> testBack to Homepage</a>
  </div>
  <div class="col-lg-10 col-sm-12">
      <div class="browse-job d-flex border-0">
          <ul class="nav nav-tabs d-flex" id="myTab" role="tablist" style="background:#ebeaea;">
              <li class="nav-item">
              <a class="nav-link active" id="tab-01" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> Jobs & Responses</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" id="tab-02" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"> Saved Drafts</a>
              </li>
          </ul>
      </div>            
      <div id="pageone" style="background-color: #d2d2d263;padding:5px;" class="mt-2">              
          <div class="row">
              <div class="d-flex col-lg-6">
                  <input type="checkbox" name="checkbox" id="checkbox" class="custom-control custom-checkbox mt-3">
                  <a class="btn btn-light mb-2 mt-1 ms-2 btn-sm" href="#">Refresh</a> 
                  <a class="btn btn-light mb-2 mt-1 ms-2 btn-sm" href="#">Share </a> 
                  <a class="btn btn-light mb-2 mt-1 ms-2 btn-sm" href="#">Remove </a> 
              </div>
              <div class="col-lg-6" style="display:flex;">                     
                  <div class="form-group" style="margin-top:5px;">
                      <label for="select2" class="ms-2">Posted By</label>
                      <select class="mt-2 ms-2" name="select2" id="select2">
                          <option value="0">All</option>
                          <option value="1">You</option>
                          <option value="2">Others</option>
                      </select>
                  </div>
                  <div class="form-group"  style="margin-top:5px;">
                      <label for="select2" class="ms-2">Status</label>
                      <select class="mt-2 ms-2" name="select2" id="select2">
                          <option value="0">All Jobs</option>
                          <option value="1">Active</option>
                          <option value="2">Inactive</option>
                          <option value="3">Inactive</option>
                          <option value="4">Shared</option>
                      </select>
                  </div>
                  <div class="form-group"  style="margin-top:5px;">
                      <label for="select3" class="ms-3">Show</label>
                      <select class="mt-2 ms-2" name="select3" id="select3">
                          <option value="0">20</option>
                          <option value="1">30</option>
                          <option value="2">50</option>
                          <option value="2">100</option>
                          <option value="2">150</option>
                          <option value="2">200</option>
                      </select>
                      <small style="color:#333;">per page</small>
                  </div>
          </div>
      </div>  
      <!---<div id="pagetwo" style="background-color: #d2d2d263;padding:5px;" class="mt-2">              
          <div class="row">
              <div class="d-flex col-lg-6">
                  <input type="checkbox" name="checkbox" id="checkbox" class="custom-control custom-checkbox mt-3">                            
                  <a class="btn btn-light mb-2 mt-1 ms-2 btn-sm" href="#">Delete</a> 
              </div>
              <div class="col-lg-6" style="display:flex;"> 
                  <div class="form-group"  style="margin-top:5px;">
                      <label for="select3" class="ms-3">Show</label>
                      <select class="mt-2 ms-2" name="select3" id="select3">
                          <option value="0">20</option>
                          <option value="1">30</option>
                          <option value="2">50</option>
                          <option value="2">100</option>
                          <option value="2">150</option>
                          <option value="2">200</option>
                      </select>
                      <small style="color:#333;">per page</small>
                  </div>
          </div>
      </div>   -->       
  </div>
  <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="tab-01">
          
      <div class="card-body mb-4" style="border: 1px solid #ddd;">
              <table class="table table-border table-hover table-responsive">
                  <thead class="bg-dark"  >
                      <tr style="color: #fff;">
                          <th style="font-weight:100;color:#001935;width:10%;">S.No</th>
                          <th style="font-weight:200;">Job Title</th>
                          <th class="text-center" style="font-weight:200;">Responses</th>
                          <th class="text-center" style="font-weight:200;">Posted By</th>
                          <th class="text-center" style="font-weight:200;">Posted Date</th>
                          
                      </tr>
                  </thead>
                  <tbody>
                    
                      <tr>
                          <td> <input type="checkbox" name="checkbox" id="checkbox" class="custom-control custom-checkbox mt-1 "></td>
                          <td> <a href="" target="_blank" >Executive - Admin and HR</a> </td>                                   
                          <td class="text-center"> <a href="#" class="text-primary">165</a> </td>
                          <td class="text-center"><span>you</span></td>
                          <td>15-Apr-22</td>
                      </tr>
                  </tbody>
              </table>                        
          </div>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="tab-02">
      <div class="card-body mb-4" style="border: 1px solid #ddd;">
      <table class="table table-border table-hover table-responsive">
                  <thead class="bg-dark">
                      <tr style="color: #fff;">
                          <th>Job Title</th>
                          <th class="text-center">Seved By</th>
                          <th class="text-center">Saved on</th>
                          <th class="text-center" style="font-weight:200;">Posted Date</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                      <td> <input type="checkbox" name="checkbox" id="checkbox" class="custom-control custom-checkbox mt-1 "></td>
                          <td><a href="" target="_blank" >Executive - Admin and HR</a> </td>
                          <td  class="text-center">hrddispl@gmail.com</td>
                          <td  class="text-center">15-Apr-22</td>                                    
                      </tr>  
                  </tbody>
              </table>                        
          </div>
      </div>
   </div>
  </div> 
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