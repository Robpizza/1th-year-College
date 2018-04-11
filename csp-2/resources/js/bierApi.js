
function getBierTabel() {
    $.getJSON("https://15euros.nl/api/bier_basic.php",
        function (data) {
            console.log("AJAX-data via jQuery:", data);
            var htm = "";

            var tbl = $("<table>").addClass("tblA");

            var head = tbl.append( $("<tr>"));
            head.append( $("<th>").html("Naam") );
            head.append( $("<th>").html("Brouwer") );
            head.append( $("<th>").html("Type") );
            head.append( $("<th>").html("Gistimg") );
            head.append( $("<th>").html("Perc") );

            $.each(data, function (key, data) {
                var tr = $("<tr>");
                tr.append( $("<td>").html(data.naam) );
                tr.append( $("<td>").html(data.brouwer) );
                tr.append( $("<td>").html(data.type) );
                tr.append( $("<td>").html(data.gisting) );
                tr.append( $("<td>").html(Math.round(data.perc)) );

                tbl.append(tr);
            });


            $("#api_title").html("Bieren");
            $("#api_content").html(tbl);
            console.log("hoi");
        });
}
