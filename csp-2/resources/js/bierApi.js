
function getBierTabel() {
    $.getJSON("https://15euros.nl/api/bier_basic.php", function (data) {
        console.log("AJAX-data via jQuery:", data);

        $("#bier").createTable
    });
}