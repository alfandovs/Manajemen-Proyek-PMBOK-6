@extends('layouts.main')

@section('container')
<center><h1>Gantt Chart</h1></center>
<div id="gantt">

</div>

<script src="https://code.highcharts.com/gantt/highcharts-gantt.js"></script>
<script src="https://code.highcharts.com/gantt/modules/accessibility.js"></script>
<script type="text/javascript">
    var today = new Date(),
    day = 1000 * 60 * 60 * 25;

// Set to 00:00:00:000 today
        today.setUTCHours(0);
        today.setUTCMinutes(0);
        today.setUTCSeconds(0);
        today.setUTCMilliseconds(0);


        // THE CHART
        Highcharts.ganttChart('gantt', {
            chart: {
                styledMode: true
            },
            title: {
                text: 'Project Gantt Chart'
            },
            subtitle: {
                text: 'PT Tekno Mandala Kreatif'
            },
            xAxis: {
                min: today.getTime() - (188 * day),
                max: today.getTime() + (160 * day)
            },
            accessibility: {
                keyboardNavigation: {
                    seriesNavigation: {
                        mode: 'serialize'
                    }
                },
                point: {
                    descriptionFormatter: function (point) {
                        var dependency = point.dependency &&
                                point.series.chart.get(point.dependency).name,
                            dependsOn = dependency ? ' Depends on ' + dependency + '.' : '';

                        return Highcharts.format(
                            '{point.yCategory}. Start {point.x:%Y-%m-%d}, end {point.x2:%Y-%m-%d}.{dependsOn}',
                            { point, dependsOn }
                        );
                    }
                }
            },
            lang: {
                accessibility: {
                    axis: {
                        xAxisDescriptionPlural: 'The chart has a two-part X axis showing time in both week numbers and days.'
                    }
                }
            },
            series: [{
                name: 'Project',
                data: [
                @php
                $i = 1;
                $len = count($data)
                @endphp
                @foreach($data AS $g)
                {
                    @php
                        $start = $g->start;
                        $sy = date('Y', strtotime($start));
                        $sm = date('m', strtotime($start)) - 1;
                        $sd = date('d', strtotime($start));
                        $end = $g->end;
                        $ey = date('Y', strtotime($end));
                        $em = date('m', strtotime($end)) - 1;
                        $ed = date('d', strtotime($end));
                    @endphp
                    name: '{{ $g->kegiatan }}',
                    id: 'c{{ $i }}',
                    start: new Date({{ $sy.','.$sm.','.$sd }}).getTime(),
                    end: new Date({{ $ey.','.$em.','.$ed }}).getTime()
                }{{ $i == $len?'':',' }}
                    @php
                    $i++;
                    @endphp
                @endforeach
            ]
        }]
        });
</script>
@endsection