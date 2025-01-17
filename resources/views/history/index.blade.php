@extends('layout.main')

@section('container')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">History of Hypothesis</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible show fade">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>   
                @endif
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="data-tab" data-bs-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="false">Data</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="graph-tab" data-bs-toggle="tab" href="#graph" role="tab" aria-controls="graph" aria-selected="true">Graph</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show p-3" id="data" role="tabpanel" aria-labelledby="data-tab">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Hypothesis</th>
                                        <th>Expert Value Result</th>
                                        <th>Date</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @forelse ($histores as $history)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $history->name }}</td>
                                        <td>{{ $history->hypothesis->name }}</td>
                                        <td class="text-end">{{ $history->value }} %</td>
                                        <td>{{ date_format($history->created_at,"d/m/Y") }}</td>
                                        <td class="text-center">
                                            <form action="{{route('history_cf.destroy', $history->id) }}" method="post" class="d-inline"  onsubmit="return confirm('Are you sure to delete the data?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">History Case Not Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade p-3" id="graph" role="tabpanel" aria-labelledby="graph-tab">
                        <canvas id="bar"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="{{ asset('mazer/vendors/chartjs/Chart.min.js') }}"></script>
<script>
    
var chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    info: '#41B1F9',
    blue: '#3245D1',
    purple: 'rgb(153, 102, 255)',
    grey: '#EBEFF6'
};

var ctxBar = document.getElementById("bar").getContext("2d");
var myBar = new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: [
            @foreach ($hypotesis as $hypo)
                "{{ $hypo->name }}",
            @endforeach
        ],
        datasets: [{
            label: 'Hypothesis',
            backgroundColor: chartColors.blue,
            data: [
                @foreach ($hypotesis as $hypo)
                    {{ $history->where('hypothesis_id', $hypo->id)->count() }},
                @endforeach
            ]
        }]
    },
    options: {
        responsive: true,
        barRoundness: 1,
        title: {
            display: true,
            text: "Hypotheses Graph"
        },
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    suggestedMax: 40 + 20,
                    padding: 10,
                },
                gridLines: {
                    drawBorder: false,
                }
            }],
            xAxes: [{
                gridLines: {
                    display: false,
                    drawBorder: false
                }
            }]
        }
    }
});

</script>
@endsection