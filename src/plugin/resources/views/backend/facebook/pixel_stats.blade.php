@extends('backend.layout')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2>Pixel Statistics</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('backend/dashboard')}}">Dashboard</a>
            </li>
            <li class="active">
                <strong>Pixel Statistics</strong>
                <small>ID: {{$pixel_id}}</small>
            </li>
        </ol>
    </div>
</div>

<div class="fh-breadcrumb animated fadeInRight">
    <br>
    <div class="full-height">
        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h5>Last 30 days Devices sessions</h5>
                </div>
                <div class="panel-content">
                    <div id="devices_piechart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h5>Last 30 days Browsers sessions</h5>
                </div>
                <div class="panel-content">
                    <div id="browsers_piechart"></div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h5>Last 30 days top URLs</h5>

                </div>
                <div class="panel-content">
                    <table class="table table-hover no-margins">
                        <thead>
                            <tr>
                                <th>URL</th>
                                <th>Sessions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($urls['data'] as $url => $count)
                            <tr>
                                <td>{{$url}}</td>
                                <td>{{$count}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>       

    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages': ['corechart']});
google.charts.setOnLoadCallback(chartsInit);
// Draw the chart and set the chart values
function drawChart(ele_id, title, data) {
    var data = google.visualization.arrayToDataTable(data);
    // Optional; add a title and set the width and height of the chart
    var options = {'title': title, 'width': '100%', 'height': 400};
    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById(ele_id));
    chart.draw(data, options);
}

function chartsInit() {
    var devices_data = [['Devices', 'Devices']];
    var devices = JSON.parse('{!!json_encode($devices['data'])!!}');
    for(i in devices) {
        devices_data.push([i.replace(/_/g,' '), devices[i]]);
    }
    var browsers_data = [['Browsers', 'Browsers']];
    var browsers = JSON.parse('{!!json_encode($browsers['data'])!!}');
    for(i in browsers) {
        browsers_data.push([i.replace(/_/g,' '), browsers[i]]);
    }
    drawChart('devices_piechart', 'Devices Sessions', devices_data)
    drawChart('browsers_piechart', 'Browsers Sessions', browsers_data)
}
</script>

@endsection
