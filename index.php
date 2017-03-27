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

<div class="container">
    <h1>webifier-monitor</h1>
    <div class="row">
        <div class="col-sm-4">
            <h2><img id="power-platform-state" src="img/error.png"> <a href="https://power.webifier.de/" target="_blank">webifier-platform</a></h2>
            <div class="pad">
                <h4>Warteschlange:</h4>
                <p id="power-queue-size">---</p>
            </div>
        </div>
        <div class="col-sm-4">
            <h2><img id="platform-state" src="img/error.png"> <a href="https://www.webifier.de/" target="_blank">webifier-platform</a></h2>
            <div class="pad">
                <h4>Warteschlange:</h4>
                <p id="queue-size">---</p>
            </div>
        </div>
        <div class="col-sm-4">
            <h2><img id="data-state" src="img/error.png"> webifier-data</h2>
            <div class="pad">
                <h4>Einträge:</h4>
                <p id="data-count">---</p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</body>
</html>