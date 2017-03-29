var update = function () {
    $.getJSON("/status", function (status) {
        setState(status['data.webifier.de'], $('#data-state'), $('#data-count'));
        setState(status['www.webifier.de'], $('#platform-state'), $('#queue-size'));
        setState(status['power.webifier.de'], $('#power-platform-state'), $('#power-queue-size'));
    });
};

function setState(status, image, entries) {
    switch (status.status) {
        case 'success':
            entries.html(status.entries);
            image.attr("src", "img/success.png");
            break;
        case 'warning':
            entries.html(status.entries);
            image.attr("src", "img/warning.png");
            break;
        case 'error':
            entries.html("---");
            image.attr("src", "img/error.png");
            break;
    }
}

setInterval(update, 60000);

$('#reload').click(function (e) {
    e.preventDefault();
    update();
});