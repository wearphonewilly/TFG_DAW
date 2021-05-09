
<?php

session_start();
var_dump($_SESSION['id']);
echo "id <br>";
$userId = $_SESSION['id'];

require_once("./DB.php");
$conn = DB::getInstance()->getConn();
$mysqli = new mysqli("localhost", "willyRoot", "", "watchme");

$consulta  = "SELECT DISTINCT serie_id FROM capitulo";

$array = [];
/* ejecutar una multi consulta */
if ($mysqli->multi_query($consulta)) {
    do {
        /* primero almacenar el conjunto de resultados */
        if ($resultado = $mysqli->use_result()) {
            while ($fila = $resultado->fetch_row()) {
                foreach ($fila[0] as $row) {
                    array_push($array, $row);
                }
            }
            $resultado->close();
        }
    } while ($mysqli->next_result());
}

var_dump($array);

$sql = "SELECT DISTINCT serie_id FROM capitulo WHERE `user_id` = $userId LIMIT 5";
$result = $conn -> query($sql);
$resultSeries = mysqli_fetch_row($result);
var_dump($resultSeries);
$resultadoSeries = $resultSeries[0];

$data = array(
    array('', '', ''),
);

foreach ($resultSeries as $row) {
    $sqlContar = "SELECT COUNT(DISTINCT capitulo_id) FROM capitulo WHERE user_id = $userId AND serie_id = $row[0]";
    $numCapitulos = $conn -> query($sqlContar);
    $serie = file_get_contents('https://api.themoviedb.org/3/tv/' . $row . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $serie = json_decode($serie, true);
    $tiempoSerie = $serie['episode_run_time'];
    $data += array($row, $tiempoSerie, $numCapitulos);
}
print_r($data);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/css/horasVistas.css">
</head>

<body>

    <div class="content">
        <h1>Most Watched</h1>
        <p class="subtitle">Your most watched TV shows (since the beginning of time)</p>
        <div id="show-graph"></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
    <script src="https://cdn.rawgit.com/Caged/d3-tip/07cf158c54cf1686b3000d784ef55d27b095cc0e/index.js"></script>

    <script>
        function Show(title, watchedEpisodes, episodeLength) {
            this.title = title;
            this.watchedEpisodes = watchedEpisodes;
            this.episodeLength = episodeLength;
        }

        Show.prototype.getWatchedHours = function () {
            return this.watchedEpisodes * this.episodeLength / 60;
        }

        var data = [
            new Show('<?php echo $resultSeries[0] ?>', 236, 25),
            new Show('<?php echo $resultSeries[1] ?>', 62, 45),
            new Show('<?php echo $resultSeries[2] ?>', 59, 45),
            new Show('<?php echo $resultSeries[3] ?>', 50, 60),
            new Show('<?php echo $resultSeries[4] ?>', 39, 60),
            new Show('Twin Peaks', 30, 45),
            new Show('Vikings', 29, 45)
        ];

        function createGraph() {
            var margin = {
                    top: 20,
                    right: 20,
                    bottom: 20,
                    left: 160
                },
                w = 800 - margin.left - margin.right,
                h = 300 - margin.top - margin.bottom;

            var svg = d3.select('#show-graph')
                .append('svg')
                .attr('class', 'graph')
                .attr('width', w + margin.left + margin.right)
                .attr('height', h + margin.top + margin.bottom)
                .append('g')
                .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')');

            var dropdownContainer = d3.select('#show-graph')
                .append('div')
                .style('margin-left', margin.left + 'px')
                .style('width', w + 'px')
                .style('text-align', 'center');

            var tip = d3.tip()
                .attr('class', 'graph__tooltip')
                .direction('e')
                .offset([0, 10]);

            var xScale = d3.scale.linear().domain([0]).range([0, w]);

            var yScale = d3.scale.ordinal()
                .domain(data.sort(function (a, b) {
                    return d3.descending(a.getWatchedHours(), b.getWatchedHours());
                }).map(function (d) {
                    return d.title;
                }))
                .rangeRoundBands([0, h], 0.6);

            var yAxis = d3.svg.axis()
                .scale(yScale)
                .orient('left');

            var xAxis = d3.svg.axis()
                .scale(xScale)
                .orient('bottom')
                .tickSize(h)
                .tickPadding(8);

            var dropdown = dropdownContainer
                .append('select')
                .attr('class', 'graph__units-select');

            dropdown.append('option')
                .attr('value', 'hours')
                .text('Hours watched');

            dropdown.append('option')
                .attr('value', 'episodes')
                .text('Episodes watched');

            dropdown.on('change', function () {
                updateGraph(this.value);
            });

            svg.call(tip);

            svg.append('g')
                .attr('class', 'graph__axis graph__axis--y')
                .call(yAxis);

            svg.append('g')
                .attr('class', 'graph__axis graph__axis--x')
                .call(xAxis);

            var bar = svg.selectAll('g.bar')
                .data(data)
                .enter()
                .append('g')
                .attr('class', 'bar');

            bar.append('rect')
                .attr('x', 0)
                .attr('y', function (d) {
                    return yScale(d.title)
                })
                .attr('height', yScale.rangeBand())
                .attr('width', 0)
                .attr('class', 'graph__bar')
                .on('mouseover', tip.show)
                .on('mouseout', tip.hide);

            updateGraph(dropdown.value);

            function updateGraph(units) {
                var barSize;

                if (units == 'episodes') {
                    xScale.domain([0, d3.max(data, function (d) {
                        return d.watchedEpisodes;
                    })]);

                    tip.html(function (d) {
                        return d.watchedEpisodes + ' episodes';
                    });

                    barSize = function (d) {
                        return xScale(d.watchedEpisodes)
                    };
                } else {
                    xScale.domain([0, d3.max(data, function (d) {
                        return d.getWatchedHours();
                    })]);

                    tip.html(function (d) {
                        return d3.round(d.getWatchedHours(), 2) + ' hrs';
                    });

                    barSize = function (d) {
                        return xScale(d.getWatchedHours())
                    };
                }

                var svgTransitioning = svg.transition();

                svgTransitioning.select('.graph__axis--x')
                    .duration(1000)
                    .call(xAxis);

                svgTransitioning.selectAll('.graph__bar')
                    .duration(1000)
                    .attr('width', barSize);
            }
        }

        createGraph();
    </script>

</body>

</html>