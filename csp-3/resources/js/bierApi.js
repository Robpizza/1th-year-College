
function getBierTabel() {
    $.getJSON("https://15euros.nl/api/bier_basic.php", function (data) {
        console.log("AJAX-data via jQuery:", data);

        var aFields = [
            {field: "", title: "eye"},
            {field: "naam", title: "Naam"},
            {field: "brouwer", title: "Brouwer"},
            {field: "perc", title: "Percentage"},
            {field: "gisting", title: "Gisting"}
        ];




        var tbl = $("<table>").addClass("tblA");
        var head = $("<tr>");

        $.each(aFields, function (key, value) {
            head.append( $("<th>").html(value.title) );
        });

        tbl.append(head);

        $.each(data, function (key, row) {
            var tblRow = tbl.append( $("<tr>"));



            $.each(aFields, function (key, value) {

                if(value.field == "" && value.title == "eye") {
                    tblRow.append( $("<td>")
                        .addClass('showInfo')
                        .html("<i class='fa fa-eye'></i>")
                        .data(row)
                    );
                } else {
                    if(value.field == "perc" && value.title == "Percentage") {
                        tblRow.append($("<td>").html(Math.round((row[value.field] * 100)) + "&percnt;"));
                    } else {
                        tblRow.append($("<td>").html(row[value.field]));
                    }
                }
            });

        });


        /*
            ZET DE HTML
         */



        $("#api_title").html("Bieren");
        $("#api_content").html(tbl);
        console.log("hoi");
    });
}



$(document).on('click', '.showInfo', function (event) {

    var dArray = $(this).data();
    console.log(dArray);

    var box = document.getElementById('myBox');
    var span = document.getElementsByClassName('close')[0];

    $("#dialog_content").html(
        "<p>Naam: " + dArray['naam'] + "</p>" +
        "<p>Brouwer: " + dArray['brouwer'] + "</p>" +
        "<p>Gisting: " + dArray['gisting'] + "</p>" +
        "<p>Type: " + dArray['type'] + "</p>" +
        "<p>Percentage: " + Math.round((dArray['perc'] * 100)) + "&percnt;</p>" +
        "<p>Inkoop prijs: &euro;" + dArray['inkoop_prijs'] + "</p>"
    );


    box.style.display = "block";


    span.onclick = function () {
        $("#dialog_content").html("DialogBox");
        box.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == box) {
            $("#dialog_content").html("DialogBox");
            box.style.display = "none";
        }
    }

})












// function getBierTabel() {
//     $.getJSON("https://15euros.nl/api/bier_basic.php",
//         function (data) {
//             console.log("AJAX-data via jQuery:", data);
//
//             /*
//                 TABLE OPBOUWEN
//              */
//             var tbl = $("<table>").addClass("tblA");
//             var head = tbl.append( $("<tr>"));
//
//             head.append( $("<th>").html("Info") );
//             head.append( $("<th>").html("Naam") );
//             head.append( $("<th>").html("Brouwer") );
//
//             $.each(data, function (key, data) {
//                 var tr = $("<tr id='" + data.id + "' class='showInfo'>");
//                 tr.append( $("<td>").html("<i class='fa fa-eye'></i>") );
//                 tr.append( $("<td style='display: none;'>").html(data.id) );
//                 tr.append( $("<td>").html(data.naam) );
//                 tr.append( $("<td>").html(data.brouwer) );
//                 tr.append( $("<td style='display: none;'>").html(data.type) );
//                 tr.append( $("<td style='display: none;'>").html(data.gisting) );
//                 tr.append( $("<td style='display: none;'>").html(data.perc) );
//                 tr.append( $("<td style='display: none;'>").html(data.inkoop_prijs) );
//                 tbl.append(tr);
//             });
//
//             /*
//                 ZET DE HTML
//              */
//
//
//             $("#api_title").html("Bieren");
//             $("#api_content").html(tbl);
//             console.log("hoi");
//         });
// }