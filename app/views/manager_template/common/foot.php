
<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="/js/manager/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="/js/manager/plugins.js"></script>

<!-- ================================================
Bootstrap Select
================================================ -->
<script type="text/javascript" src="/js/manager/bootstrap-select/bootstrap-select.js"></script>

<!-- ================================================
Bootstrap Toggle
================================================ -->
<script type="text/javascript" src="/js/manager/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- ================================================
Flot Chart
================================================ -->
<!-- main file -->
<script type="text/javascript" src="/js/manager/flot-chart/flot-chart.js"></script>
<!-- time.js -->
<script type="text/javascript" src="/js/manager/flot-chart/flot-chart-time.js"></script>
<!-- stack.js -->
<script type="text/javascript" src="/js/manager/flot-chart/flot-chart-stack.js"></script>
<!-- pie.js -->
<script type="text/javascript" src="/js/manager/flot-chart/flot-chart-pie.js"></script>
<!-- demo codes -->
<script type="text/javascript" src="/js/manager/flot-chart/flot-chart-plugin.js"></script>


<!-- ================================================
Easy Pie Chart
================================================ -->
<!-- main file -->
<script type="text/javascript" src="/js/manager/easypiechart/easypiechart.js"></script>
<!-- demo codes -->
<script type="text/javascript" src="/js/manager/easypiechart/easypiechart-plugin.js"></script>

<!-- ================================================
Sparkline
================================================ -->
<!-- main file -->
<script type="text/javascript" src="/js/manager/sparkline/sparkline.js"></script>
<!-- demo codes -->
<script type="text/javascript" src="/js/manager/sparkline/sparkline-plugin.js"></script>

<!-- ================================================
Rickshaw
================================================ -->
<!-- d3 -->
<script src="/js/manager/rickshaw/d3.v3.js"></script>
<!-- main file -->
<script src="/js/manager/rickshaw/rickshaw.js"></script>
<!-- demo codes -->
<script src="/js/manager/rickshaw/rickshaw-plugin.js"></script>

<!-- ================================================
Moment.js
================================================ -->
<script type="text/javascript" src="/js/manager/moment/moment.min.js"></script>


<!-- ================================================
Below codes are only for index widgets
================================================ -->
<!-- Today Sales -->
<script>

    // set up our data series with 50 random data points

    var seriesData = [ [], [], [] ];
    var random = new Rickshaw.Fixtures.RandomData(20);

    for (var i = 0; i < 110; i++) {
        random.addData(seriesData);
    }

    // instantiate our graph!

    var graph = new Rickshaw.Graph( {
        element: document.getElementById("todaysales"),
        renderer: 'bar',
        series: [
            {
                color: "#33577B",
                data: seriesData[0],
                name: 'Photodune'
            }, {
                color: "#77BBFF",
                data: seriesData[1],
                name: 'Themeforest'
            }, {
                color: "#C1E0FF",
                data: seriesData[2],
                name: 'Codecanyon'
            }
        ]
    } );

    graph.render();

    var hoverDetail = new Rickshaw.Graph.HoverDetail( {
        graph: graph,
        formatter: function(series, x, y) {
            var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
            var swatch = '<span class="detail_swatch" style="background-color: ' + series.color + '"></span>';
            var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
            return content;
        }
    } );

</script>

<!-- Today Activity -->
<script>
    // set up our data series with 50 random data points

    var seriesData = [ [], [], [] ];
    var random = new Rickshaw.Fixtures.RandomData(20);

    for (var i = 0; i < 50; i++) {
        random.addData(seriesData);
    }

    // instantiate our graph!

    var graph = new Rickshaw.Graph( {
        element: document.getElementById("todayactivity"),
        renderer: 'area',
        series: [
            {
                color: "#9A80B9",
                data: seriesData[0],
                name: 'London'
            }, {
                color: "#CDC0DC",
                data: seriesData[1],
                name: 'Tokyo'
            }
        ]
    } );

    graph.render();

    var hoverDetail = new Rickshaw.Graph.HoverDetail( {
        graph: graph,
        formatter: function(series, x, y) {
            var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
            var swatch = '<span class="detail_swatch" style="background-color: ' + series.color + '"></span>';
            var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
            return content;
        }
    } );
</script>


