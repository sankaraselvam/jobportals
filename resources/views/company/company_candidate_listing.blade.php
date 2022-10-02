@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!--=================================
banner -->
<section class="header-inner header-inner-big bg-holder text-white" style="background-image: url(images/bg/banner-01.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="job-search-field">
          <div class="job-search-item">
            <form class="form row">
              <div class="col-lg-5 col-md-4">
                <div class="form-group left-icon mb-md-0">
                  <input type="text" class="form-control" name="job_title" placeholder="What?">
                <i class="fas fa-search"></i> </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group left-icon mb-md-0">
                  <input type="text" class="form-control" name="job_title" placeholder="Where?">
                <i class="fas fa-search"></i> </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="form-group form-action mb-0">
                  <button type="submit" class="btn btn-primary mt-0"><i class="fas fa-search-location"></i> Find Candidate</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
banner -->

<!--=================================
candidate post-box list -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 mb-0">
        <div class="sidebar">
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Date Posted</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#dateposted" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="dateposted">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted1">
                  <label class="form-check-label" for="dateposted1">Last hour</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted2">
                  <label class="form-check-label" for="dateposted2">Last 24 hour</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted3">
                  <label class="form-check-label" for="dateposted3">Last 7 days</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted4">
                  <label class="form-check-label" for="dateposted4">Last 14 days</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted5">
                  <label class="form-check-label" for="dateposted5">Last 30 days</label>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Specialism</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="specialism">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="specialism1">
                  <label class="form-check-label" for="specialism1">IT Contractor</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="specialism2">
                  <label class="form-check-label" for="specialism2">Charity & Voluntary</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="specialism3">
                  <label class="form-check-label" for="specialism3">Digital & Creative</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="specialism4">
                  <label class="form-check-label" for="specialism4">Estate Agency</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="specialism5">
                  <label class="form-check-label" for="specialism5">Graduate</label>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Job Type</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#jobtype" role="button" aria-expanded="false" aria-controls="jobtype"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="jobtype">
              <div class="widget-content">
                <div class="form-check fulltime-job">
                  <input type="checkbox" class="form-check-input" id="jobtype1">
                  <label class="form-check-label" for="jobtype1">Full Time</label>
                </div>
                <div class="form-check parttime-job">
                  <input type="checkbox" class="form-check-input" id="jobtype2">
                  <label class="form-check-label" for="jobtype2">Part-Time</label>
                </div>
                <div class="form-check freelance-job">
                  <input type="checkbox" class="form-check-input" id="jobtype3">
                  <label class="form-check-label" for="jobtype3">Freelance</label>
                </div>
                <div class="form-check temporary-job">
                  <input type="checkbox" class="form-check-input" id="jobtype4">
                  <label class="form-check-label" for="jobtype4">Temporary</label>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Experience</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#experience" role="button" aria-expanded="false" aria-controls="experience"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="experience">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience1">
                  <label class="form-check-label" for="experience1">Fresher</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience2">
                  <label class="form-check-label" for="experience2">Less than 1 year</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience3">
                  <label class="form-check-label" for="experience3">2 Year</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience4">
                  <label class="form-check-label" for="experience4">3 Year</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience5">
                  <label class="form-check-label" for="experience5">4 Year</label>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Offered Salary</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#Offeredsalary" role="button" aria-expanded="false" aria-controls="Offeredsalary"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="Offeredsalary">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="Offeredsalary1">
                  <label class="form-check-label" for="Offeredsalary1">10k - 20k</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="Offeredsalary2">
                  <label class="form-check-label" for="Offeredsalary2">20k - 30k</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="Offeredsalary3">
                  <label class="form-check-label" for="Offeredsalary3">30k - 40k</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="Offeredsalary4">
                  <label class="form-check-label" for="Offeredsalary4">40k - 50k</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="Offeredsalary5">
                  <label class="form-check-label" for="Offeredsalary5">50k - 60k</label>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Gender</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#gender" role="button" aria-expanded="false" aria-controls="gender"><i class="fas fa-chevron-down"></i></a>
            </div>
            <div class="collapse show" id="gender">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="gender1">
                  <label class="form-check-label" for="gender1">Male</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="gender2">
                  <label class="form-check-label" for="gender2">Female</label>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Qualification</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#qualification" role="button" aria-expanded="false" aria-controls="qualification"> <i class="fas fa-chevron-down"></i></a>
            </div>
            <div class="collapse show" id="qualification">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="qualification1">
                  <label class="form-check-label" for="qualification1">Matriculation</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="qualification2">
                  <label class="form-check-label" for="qualification2">Intermediate</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="qualification3">
                  <label class="form-check-label" for="qualification3">Graduate</label>
                </div>
              </div>
            </div>
          </div>
          <div class="widget">
            <div class="widget-add">
            <img class="img-fluid" src="images/add-banner.png" alt=""></div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="row mb-4">
          <div class="col-12">
            <h6 class="mb-0">Showing 1-11 of <span class="text-primary">28 Candidates</span></h6>
          </div>
        </div>
        <div class="job-filter mb-4 d-sm-flex align-items-center">          
          <div class="job-shortby ms-sm-auto d-flex align-items-center">
            <form class="form-inline">
              <div class="form-group d-flex align-items-center mb-0">
                <label class="justify-content-start me-2">Sort by :</label>
                <div class="short-by">
                  <select class="form-control basic-select">
                    <option>Newest</option>
                    <option>Oldest</option>
                  </select>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="candidate-list">
              <div class="candidate-list-image">
                <img class="img-fluid" src="images/avatar/04.jpg" alt="">
              </div>
              <div class="candidate-list-details">
                <div class="candidate-list-info">
                  <div class="candidate-list-title">
                    <h5 class="mb-0"><a href="#">Candidate Name</a></h5>
                  </div>
                  <div class="candidate-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-filter pe-1"></i>Construction & Property</li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Botchergate, Carlisle</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="candidate-list-favourite-time">
                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>6D ago</span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="candidate-list">
              <div class="candidate-list-image">
                <img class="img-fluid" src="images/avatar/03.jpg" alt="">
              </div>
              <div class="candidate-list-details">
                <div class="candidate-list-info">
                  <div class="candidate-list-title">
                    <h5 class="mb-0"><a href="#">Paul Flavius</a></h5>
                  </div>
                  <div class="candidate-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-filter pe-1"></i>General Insurance</li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Ormskirk Rd, Wigan</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="candidate-list-favourite-time">
                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>3D ago</span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="candidate-list">
              <div class="candidate-list-image">
                <img class="img-fluid" src="images/avatar/05.jpg" alt="">
              </div>
              <div class="candidate-list-details">
                <div class="candidate-list-info">
                  <div class="candidate-list-title">
                    <h5 class="mb-0"><a href="#">Felica Queen</a></h5>
                  </div>
                  <div class="candidate-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-filter pe-1"></i>General Insurance</li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Union St, New Delhi</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="candidate-list-favourite-time">
                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>2D ago</span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="candidate-list">
              <div class="candidate-list-image">
                <img class="img-fluid" src="images/avatar/08.jpg" alt="">
              </div>
              <div class="candidate-list-details">
                <div class="candidate-list-info">
                  <div class="candidate-list-title">
                    <h5 class="mb-0"><a href="#">Carolyn & Dan</a></h5>
                  </div>
                  <div class="candidate-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-filter pe-1"></i>Recruitment Consultancy</li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Paris, Île-de-France</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="candidate-list-favourite-time">
                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>2W ago</span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="candidate-list">
              <div class="candidate-list-image">
                <img class="img-fluid" src="images/avatar/06.jpg" alt="">
              </div>
              <div class="candidate-list-details">
                <div class="candidate-list-info">
                  <div class="candidate-list-title">
                    <h5 class="mb-0"><a href="#">Sara Lisbon</a></h5>
                  </div>
                  <div class="candidate-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-filter pe-1"></i>Strategy & Consultancy</li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Canyon Village, Ramon</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="candidate-list-favourite-time">
                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>3W ago</span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="candidate-list">
              <div class="candidate-list-image">
                <img class="img-fluid" src="images/avatar/02.jpg" alt="">
              </div>
              <div class="candidate-list-details">
                <div class="candidate-list-info">
                  <div class="candidate-list-title">
                    <h5 class="mb-0"><a href="#">John Doe</a></h5>
                  </div>
                  <div class="candidate-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-filter pe-1"></i>Strategy & Consultancy</li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Lynch Lane, Weymouth</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="candidate-list-favourite-time">
                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>1M ago</span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="candidate-list">
              <div class="candidate-list-image">
                <img class="img-fluid" src="images/avatar/07.jpg" alt="">
              </div>
              <div class="candidate-list-details">
                <div class="candidate-list-info">
                  <div class="candidate-list-title">
                    <h5 class="mb-0"><a href="#">Reyna Chung</a></h5>
                  </div>
                  <div class="candidate-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-filter pe-1"></i>Transport & Logistics</li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Needham, MA</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="candidate-list-favourite-time">
                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>1H ago</span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="candidate-list">
              <div class="candidate-list-image">
                <img class="img-fluid" src="images/avatar/08.jpg" alt="">
              </div>
              <div class="candidate-list-details">
                <div class="candidate-list-info">
                  <div class="candidate-list-title">
                    <h5 class="mb-0"><a href="#">Carolyn & Dan</a></h5>
                  </div>
                  <div class="candidate-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-filter pe-1"></i>Apprenticeships</li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Botchergate, Carlisle</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="candidate-list-favourite-time">
                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>3M ago</span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="candidate-list">
              <div class="candidate-list-image">
                <img class="img-fluid" src="images/avatar/09.jpg" alt="">
              </div>
              <div class="candidate-list-details">
                <div class="candidate-list-info">
                  <div class="candidate-list-title">
                    <h5 class="mb-0"><a href="#">Michael Bean</a></h5>
                  </div>
                  <div class="candidate-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-filter pe-1"></i>Estate Agency</li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Park Avenue, Mumbai</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="candidate-list-favourite-time">
                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>6D ago</span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="candidate-list">
              <div class="candidate-list-image">
                <img class="img-fluid" src="images/avatar/10.jpg" alt="">
              </div>
              <div class="candidate-list-details">
                <div class="candidate-list-info">
                  <div class="candidate-list-title">
                    <h5 class="mb-0"><a href="#">Jessica & Alex</a></h5>
                  </div>
                  <div class="candidate-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-filter pe-1"></i>EHealth & Medicine</li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Wellesley Rd, London</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="candidate-list-favourite-time">
                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>2W ago</span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="candidate-list">
              <div class="candidate-list-image">
                <img class="img-fluid" src="images/avatar/11.jpg" alt="">
              </div>
              <div class="candidate-list-details">
                <div class="candidate-list-info">
                  <div class="candidate-list-title">
                    <h5 class="mb-0"><a href="#">Anne Smith</a></h5>
                  </div>
                  <div class="candidate-list-option">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-filter pe-1"></i>Marketing & PR</li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Burry Port, Surat</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="candidate-list-favourite-time">
                <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>1D ago</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center mt-4 mt-sm-5">
            <ul class="pagination justify-content-center mb-0">
              <li class="page-item disabled"> <span class="page-link b-radius-none">Prev</span> </li>
              <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">25</a></li>
              <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
candidate post-box list -->



  @include('includes.footer')
  @endsection
