@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="py-4 container-fluid">
        <div class="row">
            <div class="mb-4 col-xl-3 col-sm-6 mb-xl-0">
                <div class="card">
                    <div class="p-3 card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="mb-0 text-sm text-uppercase font-weight-bold">Today's Money</p>
                                    <h5 class="font-weight-bolder">
                                        $53,000
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-sm text-success font-weight-bolder">+55%</span>
                                        since yesterday
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="text-center icon icon-shape bg-gradient-primary shadow-primary rounded-circle">
                                    <i class="text-lg ni ni-money-coins opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-xl-3 col-sm-6 mb-xl-0">
                <div class="card">
                    <div class="p-3 card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="mb-0 text-sm text-uppercase font-weight-bold">Today's Users</p>
                                    <h5 class="font-weight-bolder">
                                        2,300
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-sm text-success font-weight-bolder">+3%</span>
                                        since last week
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="text-center icon icon-shape bg-gradient-danger shadow-danger rounded-circle">
                                    <i class="text-lg ni ni-world opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-xl-3 col-sm-6 mb-xl-0">
                <div class="card">
                    <div class="p-3 card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="mb-0 text-sm text-uppercase font-weight-bold">New Clients</p>
                                    <h5 class="font-weight-bolder">
                                        +3,462
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-sm text-danger font-weight-bolder">-2%</span>
                                        since last quarter
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="text-center icon icon-shape bg-gradient-success shadow-success rounded-circle">
                                    <i class="text-lg ni ni-paper-diploma opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="p-3 card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="mb-0 text-sm text-uppercase font-weight-bold">Sales</p>
                                    <h5 class="font-weight-bolder">
                                        $103,430
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-sm text-success font-weight-bolder">+5%</span> than last month
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="text-center icon icon-shape bg-gradient-warning shadow-warning rounded-circle">
                                    <i class="text-lg ni ni-cart opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 row">
            <div class="mb-4 col-lg-7 mb-lg-0">
                <div class="card z-index-2 h-100">
                    <div class="pt-3 pb-0 bg-transparent card-header">
                        <h6 class="text-capitalize">Sales overview</h6>
                        <p class="mb-0 text-sm">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">4% more</span> in 2021
                        </p>
                    </div>
                    <div class="p-3 card-body">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="p-0 overflow-hidden card card-carousel h-100">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner border-radius-lg h-100">
                            <div class="carousel-item h-100 active"
                                style="background-image: url('/assets/img/carousel-1.jpg');
            background-size: cover;">
                                <div class="bottom-0 carousel-caption d-none d-md-block text-start start-0 ms-5">
                                    <div class="mb-3 text-center bg-white icon icon-shape icon-sm border-radius-md">
                                        <i class="ni ni-camera-compact text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="mb-1 text-white">Get started with Argon</h5>
                                    <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100"
                                style="background-image: url('/assets/img/carousel-2.jpg');
            background-size: cover;">
                                <div class="bottom-0 carousel-caption d-none d-md-block text-start start-0 ms-5">
                                    <div class="mb-3 text-center bg-white icon icon-shape icon-sm border-radius-md">
                                        <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="mb-1 text-white">Faster way to create web pages</h5>
                                    <p>That’s my skill. I’m not really specifically talented at anything except for the
                                        ability to learn.</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100"
                                style="background-image: url('/assets/img/carousel-3.jpg');
            background-size: cover;">
                                <div class="bottom-0 carousel-caption d-none d-md-block text-start start-0 ms-5">
                                    <div class="mb-3 text-center bg-white icon icon-shape icon-sm border-radius-md">
                                        <i class="ni ni-trophy text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="mb-1 text-white">Share with us your design tips!</h5>
                                    <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                                </div>
                            </div>
                        </div>
                        <button class="w-5 carousel-control-prev me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="w-5 carousel-control-next me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 row">
            <div class="mb-4 col-lg-7 mb-lg-0">
                <div class="card ">
                    <div class="p-3 pb-0 card-header">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Sales by Country</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                <tr>
                                    <td class="w-30">
                                        <div class="px-2 py-1 d-flex align-items-center">
                                            <div>
                                                <img src="/assets/img/icons/flags/US.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="mb-0 text-xs font-weight-bold">Country:</p>
                                                <h6 class="mb-0 text-sm">United States</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-weight-bold">Sales:</p>
                                            <h6 class="mb-0 text-sm">2500</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-weight-bold">Value:</p>
                                            <h6 class="mb-0 text-sm">$230,900</h6>
                                        </div>
                                    </td>
                                    <td class="text-sm align-middle">
                                        <div class="text-center col">
                                            <p class="mb-0 text-xs font-weight-bold">Bounce:</p>
                                            <h6 class="mb-0 text-sm">29.9%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="px-2 py-1 d-flex align-items-center">
                                            <div>
                                                <img src="/assets/img/icons/flags/DE.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="mb-0 text-xs font-weight-bold">Country:</p>
                                                <h6 class="mb-0 text-sm">Germany</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-weight-bold">Sales:</p>
                                            <h6 class="mb-0 text-sm">3.900</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-weight-bold">Value:</p>
                                            <h6 class="mb-0 text-sm">$440,000</h6>
                                        </div>
                                    </td>
                                    <td class="text-sm align-middle">
                                        <div class="text-center col">
                                            <p class="mb-0 text-xs font-weight-bold">Bounce:</p>
                                            <h6 class="mb-0 text-sm">40.22%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="px-2 py-1 d-flex align-items-center">
                                            <div>
                                                <img src="/assets/img/icons/flags/GB.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="mb-0 text-xs font-weight-bold">Country:</p>
                                                <h6 class="mb-0 text-sm">Great Britain</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-weight-bold">Sales:</p>
                                            <h6 class="mb-0 text-sm">1.400</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-weight-bold">Value:</p>
                                            <h6 class="mb-0 text-sm">$190,700</h6>
                                        </div>
                                    </td>
                                    <td class="text-sm align-middle">
                                        <div class="text-center col">
                                            <p class="mb-0 text-xs font-weight-bold">Bounce:</p>
                                            <h6 class="mb-0 text-sm">23.44%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="px-2 py-1 d-flex align-items-center">
                                            <div>
                                                <img src="/assets/img/icons/flags/BR.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="mb-0 text-xs font-weight-bold">Country:</p>
                                                <h6 class="mb-0 text-sm">Brasil</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-weight-bold">Sales:</p>
                                            <h6 class="mb-0 text-sm">562</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-weight-bold">Value:</p>
                                            <h6 class="mb-0 text-sm">$143,960</h6>
                                        </div>
                                    </td>
                                    <td class="text-sm align-middle">
                                        <div class="text-center col">
                                            <p class="mb-0 text-xs font-weight-bold">Bounce:</p>
                                            <h6 class="mb-0 text-sm">32.14%</h6>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="p-3 pb-0 card-header">
                        <h6 class="mb-0">Categories</h6>
                    </div>
                    <div class="p-3 card-body">
                        <ul class="list-group">
                            <li class="mb-2 border-0 list-group-item d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="text-center shadow icon icon-shape icon-sm me-3 bg-gradient-dark">
                                        <i class="text-white ni ni-mobile-button opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-sm text-dark">Devices</h6>
                                        <span class="text-xs">250 in stock, <span class="font-weight-bold">346+
                                                sold</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="my-auto btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="mb-2 border-0 list-group-item d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="text-center shadow icon icon-shape icon-sm me-3 bg-gradient-dark">
                                        <i class="text-white ni ni-tag opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-sm text-dark">Tickets</h6>
                                        <span class="text-xs">123 closed, <span class="font-weight-bold">15
                                                open</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="my-auto btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="mb-2 border-0 list-group-item d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="text-center shadow icon icon-shape icon-sm me-3 bg-gradient-dark">
                                        <i class="text-white ni ni-box-2 opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-sm text-dark">Error logs</h6>
                                        <span class="text-xs">1 is active, <span class="font-weight-bold">40
                                                closed</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="my-auto btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="border-0 list-group-item d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="text-center shadow icon icon-shape icon-sm me-3 bg-gradient-dark">
                                        <i class="text-white ni ni-satisfied opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-sm text-dark">Happy users</h6>
                                        <span class="text-xs font-weight-bold">+ 430</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="my-auto btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="/assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#1fb4ff",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
