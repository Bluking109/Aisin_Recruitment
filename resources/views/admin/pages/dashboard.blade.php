@extends('admin.layouts.master')
@section('title', 'Dashboard')
@push('optional_vendor_css')
<link rel="stylesheet" href="{{ asset('admin/vendors/chart.js/Chart.min.css') }}">
@endpush
@section('pages')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12 flex-column d-flex stretch-card">
            <div class="row">
                <div class="col-lg-4 d-flex grid-margin stretch-card">
                    <div class="card sale-diffrence-border">
                        <div class="card-body">
                            <h2 class="text-dark mb-2 font-weight-bold">{{ $totalVacancies }}</h2>
                            <h4 class="card-title mb-2">Active Job Vacancies</h4>
                            <small class="text-muted">Period : {{ date('F Y') }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex grid-margin stretch-card">
                    <div class="card jobseeker-border">
                        <div class="card-body">
                            <h2 class="text-dark mb-2 font-weight-bold">{{ $totalApplicationProcess }}</h2>
                            <h4 class="card-title mb-2">Total Application In Process</h4>
                            <small class="text-muted">Period : {{ date('F Y') }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex grid-margin stretch-card">
                    <div class="card sale-visit-statistics-border">
                        <div class="card-body">
                            <h2 class="text-dark mb-2 font-weight-bold">{{ $totalJobSeekers }}</h2>
                            <h4 class="card-title mb-2">Total Job Seeker</h4>
                            <small class="text-muted">Period : {{ date('F Y') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="application-chart"></canvas>
                        </div>
                        <div class="col-md-6">
                            <h4><b>Job Applicants Today</b></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Job Vacancy</th>
                                        <th>Edu. Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($todayApplications as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ url(AIIAAIIASetting::getValue('admin_base_route').'/job-seekers/'.$value->jobSeeker->id.'/photo') }}"></td>
                                        <td>{{ $value->jobSeeker->name }}</td>
                                        <td>{{ $value->jobVacancy->position->name . ' - ' . $value->jobVacancy->section->name }}</td>
                                        <td>{{ $value->jobSeeker->educationLevel->name }}</td>
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
<input type="hidden" value="{{ json_encode($jobApplication) }}" id="applications-data">
@endsection
@push('bottom_scripts')
<script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
<script type="text/javascript">
    let dynamicColors = function() {
        let r = Math.floor(Math.random() * 255);
        let g = Math.floor(Math.random() * 255);
        let b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };

    $(function() {
        let ctx = document.getElementById('application-chart').getContext('2d');
        let applicationData = JSON.parse($('#applications-data').val());

        let labels = [];
        let data = [];
        let colors = [];

        applicationData.forEach((v) => {
            if (v.section_type == 'department') {
                labels.push(v.dept_position_name);
            } else {
                labels.push(v.sec_position_name);
            }

            data.push(v.total);
            colors.push(dynamicColors());
        });

        let myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: data,
                    backgroundColor: colors,
                }],
                labels: labels,
            },
            options: {}
        });

    });
</script>
@endpush