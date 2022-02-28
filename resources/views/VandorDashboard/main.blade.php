@extends('VandorDashboard.master')

@section('title') We HatBazar Vandor Dashboard @endsection

@section('vandor-content')

    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">

            <div class="">

                <h4 style="text-align: center;text-align: center;font-family: cursive;font-weight: 200;"> <i class="fa fa-arrow-circle-down" style="color: red;"></i> Total Order <i style="color: red;" class="fa fa-arrow-circle-down"></i></h4>
            </div>

            <div class="info-stats4">

                <div class="info-icon">
                    <i class="icon-shopping-cart1"></i>
                </div>

                <div class="sale-num">
                    <h3>2500</h3>
                    <p>Orders</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="">

                <h4 style="text-align: center;text-align: center;font-family: cursive;font-weight: 200;"> <i class="fa fa-arrow-circle-down" style="color: red;"></i> Total Income <i style="color: red;" class="fa fa-arrow-circle-down"></i></h4>
            </div>
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="">৳</i>
                </div>
                <div class="sale-num">
                    <h3>{{@$total_income}}</h3>
                    <p>Taka</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="">

                <h4 style="text-align: center;text-align: center;font-family: cursive;font-weight: 200;"> <i class="fa fa-arrow-circle-down" style="color: red;"></i> Commission Amount <i style="color: red;" class="fa fa-arrow-circle-down"></i></h4>
            </div>
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="">৳</i>
                </div>
                <div class="sale-num">
                    <h3>{{@$comission_price}}</h3>
                    <p>Taka</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="">

                <h4 style="text-align: center;text-align: center;font-family: cursive;font-weight: 200;"> <i class="fa fa-arrow-circle-down" style="color: red;"></i> Vandor Amount <i style="color: red;" class="fa fa-arrow-circle-down"></i></h4>
            </div>
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="">৳</i>
                </div>
                <div class="sale-num">
                    <h3>{{@$with_out_comission}}</h3>
                    <p>Taka</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->

    <!---------Monthly And Yearly Income--------->
    <div class="row gutters">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title" style="font-family: cursive;">Monthly Income</div>
                </div>
                <div class="card-body pt-0">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>

        {{--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">--}}
                    {{--<div class="card-title" style="font-family: cursive;">Yearly Income</div>--}}
                {{--</div>--}}
                {{--<div class="card-body pt-0">--}}
                    {{--<canvas id="YearlyChart"></canvas>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>







    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Overall Income</div>
                </div>
                <div class="card-body pt-0 pb-0">
                    <div id="income"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->





    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Quick Stats</div>
                </div>
                <div class="card-body">
                    <div class="customScroll5">
                        <div class="quick-analytics">
                            <a href="#">
                                <i class="icon-shopping-cart1"></i> 500,000 New Orders
                            </a>
                            <a href="#">
                                <i class="icon-shopping-bag1"></i> 950,000 Products
                            </a>
                            <a href="#">
                                <i class="icon-package"></i> 325,010 Retail Stores
                            </a>
                            <a href="#">
                                <i class="icon-play-circle"></i> 780,500 Movies Downloaded
                            </a>
                            <a href="#">
                                <i class="icon-share1"></i> 250,000 Images Uploaded
                            </a>
                            <a href="#">
                                <i class="icon-eye1"></i> 870,000 Monthly Visits
                            </a>
                            <a href="#">
                                <i class="icon-bell"></i> 350,500 Tickets Booked
                            </a>
                            <a href="#">
                                <i class="icon-shopping-cart1"></i> 500,000 New Orders
                            </a>
                            <a href="#">
                                <i class="icon-shopping-bag1"></i> 950,000 Products
                            </a>
                            <a href="#">
                                <i class="icon-package"></i> 325,010 Retail Stores
                            </a>
                            <a href="#">
                                <i class="icon-play-circle"></i> 780,500 Movies Downloaded
                            </a>
                            <a href="#">
                                <i class="icon-share1"></i> 250,000 Images Uploaded
                            </a>
                            <a href="#">
                                <i class="icon-eye1"></i> 870,000 Monthly Visits
                            </a>
                            <a href="#">
                                <i class="icon-bell"></i> 350,500 Tickets Booked
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Activity</div>
                </div>
                <div class="card-body">
                    <div class="customScroll5">
                        <ul class="project-activity">
                            <li class="activity-list">
                                <div class="detail-info">
                                    <p class="date">Today</p>
                                    <p class="info">Messages accepted with attachments.</p>
                                </div>
                            </li>
                            <li class="activity-list success">
                                <div class="detail-info">
                                    <p class="date">Yesterday</p>
                                    <p class="info">Send email notifications of subscriptions and deletions to list owner.</p>
                                </div>
                            </li>
                            <li class="activity-list danger">
                                <div class="detail-info">
                                    <p class="date">10th December</p>
                                    <p class="info">Required change logs activity reports.</p>
                                </div>
                            </li>
                            <li class="activity-list warning">
                                <div class="detail-info">
                                    <p class="date">15th December</p>
                                    <p class="info">Strategic partnership plan.</p>
                                </div>
                            </li>
                            <li class="activity-list success">
                                <div class="detail-info">
                                    <p class="date">21st December</p>
                                    <p class="info">Send email notifications of subscriptions and deletions to list owner.</p>
                                </div>
                            </li>
                            <li class="activity-list danger">
                                <div class="detail-info">
                                    <p class="date">25th December</p>
                                    <p class="info">Required change logs activity reports.</p>
                                </div>
                            </li>
                            <li class="activity-list warning">
                                <div class="detail-info">
                                    <p class="date">28th December</p>
                                    <p class="info">Strategic partnership plan.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Order History</div>
                </div>
                <div class="card-body">
                    <div class="customScroll5">
                        <ul class="user-messages">
                            <li class="clearfix">
                                <div class="customer">AM</div>
                                <div class="delivery-details">
                                    <span class="badge badge-primary">Ordered</span>
                                    <h5>Aaleyah Malik</h5>
                                    <p>We are pleased to inform that the following ticket no. <b>Le Rouge510</b> have been booked.</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="customer">AS</div>
                                <div class="delivery-details">
                                    <span class="badge badge-primary">Delivered</span>
                                    <h5>Ali Sayed</h5>
                                    <p>The carrier successfully delivered the message to the end user.</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="customer">ZR</div>
                                <div class="delivery-details">
                                    <span class="badge badge-primary">Cancelled</span>
                                    <h5>Zaira Raheem</h5>
                                    <p>The following describe the status codes and messages states for delivery receipts.</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="customer">LJ</div>
                                <div class="delivery-details">
                                    <span class="badge badge-primary">Returned</span>
                                    <h5>Lily Jordan</h5>
                                    <p>Status codes and descriptions are returned in the following OpenMarket-specific TLVs When a delivery receipt is received.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->

@section('footer')

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['This Month', '1 Month ago', '2 Month Ago', '3 Month Ago', '4 Month Ago', '5 Month Ago','6 Month Ago','7 Month Ago','8 Month Ago','9 Month Ago','10 Month Ago','11 Month Ago'],
                datasets: [{
                    label: '# Month Income',
                    data: [{{$this_month}}, {{$one_month_ago}},{{$two_month_ago}},{{@$three_month_ago}},{{$four_month_ago}},{{$five_month_ago}},{{@$six_month_ago}},{{@$seven_month_ago}},{{@$eight_month_ago}},{{@$nine_month_ago}},'{{@$ten_month_ago}}',{{@$eleven_month_ago}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    @endsection



@endsection

