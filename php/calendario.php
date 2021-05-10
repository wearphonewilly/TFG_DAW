<?php
require_once("DBconn.php");

$sql = "SELECT title, proximoEpisodioStart, proximoEpisodioEnd FROM heroku_a22259b35601486.serie ";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Calendario</title>

    <!-- FullCalendar -->
    <link href='../styles/css/fullcalendar.css' rel='stylesheet' />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles/css/output.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>
    
    <?php include('../html/navbar.html'); ?>

    <div class="container" style="background-color: grey !important; color: white;">
        <h1>Próximos episodios</h1>
        <div id="calendar" class="col-md-12" style="background-color: grey !important;">
        </div>
    </div>


    <?php include('../html/scripts.html'); ?>

    <!-- jQuery Version 1.11.1 -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- FullCalendar -->
    <script src='../js/moment.min.js'></script>
    <script src='../js/fullcalendar/fullcalendar.min.js'></script>
    <script src='../js/fullcalendar/fullcalendar.js'></script>
    <script src='../js/fullcalendar/locale/es.js'></script>
    <script>
    $(document).ready(function () {

        var date = new Date();
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth() + 1).toString() : (
            date.getMonth() + 1).toString();
        var dd = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date
            .getDate()).toString();

        $('#calendar').fullCalendar({
            header: {
                language: 'es',
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay',

            },
            defaultDate: yyyy + "-" + mm + "-" + dd,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function (start, end) {

                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal('show');
            },
            eventRender: function (event, element) {
                element.bind('dblclick', function () {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title').val(event.title);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function (event, delta, revertFunc) { // si changement de position

                edit(event);

            },
            eventResize: function (event, dayDelta, minuteDelta,
            revertFunc) { // si changement de longueur

                edit(event);

            },
            events: [ <?php foreach ($events as $event) {
                $start = explode(" ", $event['proximoEpisodioStart']);
                $end = explode(" ", $event['proximoEpisodioEnd']);
                if ($start[1] == '00:00:00') {
                    $start = $start[0];
                } else {
                    $start = $event['proximoEpisodioStart'];
                }
                if ($end[1] == '00:00:00') {
                    $end = $end[0];
                } else {
                    $end = $event['proximoEpisodioEnd'];
                } ?> {
                    id: '<?php echo $event['id']; ?>',
                    title: '<?php echo $event['title']; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    color: '<?php echo $event['color']; ?>',
                }, <?php }; ?>
            ]
        });
    });
    </script>
</body>

</html>