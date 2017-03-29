<?php
$status = json_decode(file_get_contents('https://monitor.webifier.de/status'), true);
$power = $status['power.webifier.de'];
$platform = $status['www.webifier.de'];
$data = $status['data.webifier.de'];

function print_image($status) {
	echo 'img/' . $status['status'] . '.png';
}

function print_entries($status) {
	echo isset($status['entries']) ? $status['entries'] : '---';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title>webifier-monitor</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/webifier-small.png"/>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img class="brand-icon" src="img/webifier-small.png" alt="webifier">
                webifier Monitor</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="https://power.webifier.de" target="_blank">power.webifier.de</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="https://www.webifier.de" target="_blank">www.webifier.de</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a id="reload" href="#"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h2><img id="power-platform-state" src="<?php print_image($power); ?>"> power.webifier.de</h2>
            <div class="pad">
                <h4>Warteschlange:</h4>
                <p id="power-queue-size"><?php print_entries($power); ?></p>
            </div>
        </div>
        <div class="col-sm-4">
            <h2><img id="platform-state" src="<?php print_image($platform); ?>"> www.webifier.de</h2>
            <div class="pad">
                <h4>Warteschlange:</h4>
                <p id="queue-size"><?php print_entries($platform); ?></p>
            </div>
        </div>
        <div class="col-sm-4">
            <h2><img id="data-state" src="<?php print_image($data); ?>"> data.webifier.de</h2>
            <div class="pad">
                <h4>Einträge:</h4>
                <p id="data-count"><?php print_entries($data); ?></p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</body>
</html>