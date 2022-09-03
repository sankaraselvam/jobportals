@extends('layouts.app')


@section('content')

<!-- Header start -->
@include('includes.header')
<!-- Header end --> 

<!-- Search start -->
@include('includes.search')
<!-- Search End --> 

<!-- Featured How It Works -->
@include('includes.how_it_works')
<!-- Featured  How It Works ends --> 

<!-- Top Employers start -->
@include('includes.top_employers')
<!-- Top Employers ends -->

<!-- Latest Jobs start -->
@include('includes.latest_jobs')
<!-- Latest Jobs ends --> 

<!-- Easiest Way Use Jobs start -->
@include('includes.Easiest_use')
<!--  Easiest Way Use  ends --> 

<!-- Featured Candidateds list start -->
@include('includes.featured_candidates')
<!--  Featured Candidateds list ends -->


<!-- Testimonials start -->
@include('includes.testimonials')
<!-- Testimonials End -->


<!-- Testimonials start -->
@include('includes.mobile_app')
<!-- Testimonials End -->

@include('includes.footer')

@endsection
@push('scripts') 
<script>
    $(document).ready(function ($) {
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);
	});
</script>

@include('includes.country_state_city_js')

@endpush
