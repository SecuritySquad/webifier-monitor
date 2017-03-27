var updateQueue = function () {
    $.getJSON("queue-size.php")
        .done(function (queue) {
            $('#queue-size').html(queue.size);
            $('#platform-state').attr("src", "img/success.png");
        })
        .fail(function (jqxhr, textStatus, error) {
            $('#queue-size').html("---");
            $('#platform-state').attr("src", "img/error.png");
        });
};
updateQueue();
setInterval(updateQueue, 60000);
var updatePowerQueue = function () {
    $.getJSON("power-queue-size.php")
        .done(function (queue) {
            $('#power-queue-size').html(queue.size);
            $('#power-platform-state').attr("src", "img/success.png");
        })
        .fail(function (jqxhr, textStatus, error) {
            $('#power-queue-size').html("---");
            $('#power-platform-state').attr("src", "img/error.png");
        });
};
updatePowerQueue();
setInterval(updatePowerQueue, 60000);
var updateData = function () {
    $.getJSON("data-count.php")
        .done(function (data) {
            $('#data-count').html(data.size);
            $('#data-state').attr("src", "img/success.png");
        })
        .fail(function (jqxhr, textStatus, error) {
            $('#data-count').html("---");
            $('#data-state').attr("src", "img/error.png");
        });
};
updateData();
setInterval(updateData, 60000);