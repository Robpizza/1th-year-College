
function getBierTabel() {
    $.getJSON("https://15euros.nl/api/bier_basic.php", function (data) {
        console.log("AJAX-data via jQuery:", data);

        var aFields = [
            {field: "eye", title: "View", defaultShow: true},
            {field: "naam", title: "Naam", defaultShow: true},
            {field: "brouwer", title: "Brouwer", defaultshow: false},
            {field: "perc", title: "Percentage", defaultShow: false},
            {field: "gisting", title: "Gisting", defaultshow: false}
        ];




        var tbl = $("<table>").addClass("tblA");
        var head = $("<tr>");

        $.each(aFields, function (key, value) {
            head.append( $("<th>").addClass(value.field).html(value.title) );
        });

        tbl.append(head);

        $.each(data, function (key, row) {
            var tblRow = tbl.append( $("<tr>"));



            $.each(aFields, function (key, value) {

                if(value.field == "eye") {
                    tblRow.append( $("<td>")
                        .addClass('showInfo')
						.addClass(value.field)
                        .html("<i class='fa fa-eye'></i>")
                        .data(row)
                    );
                } else {
                    if(value.field == "perc") {
                        tblRow.append($("<td>").addClass(value.field).html(Math.round((row[value.field] * 100)) + "&percnt;"));
                    } else {
                        tblRow.append($("<td>").addClass(value.field).html(row[value.field]));
                    }
                }
            });

        });
		$("#api_title").html("Bieren");
		$("#api_content").html(tbl);
		
		var checkBoxes = "";
		$.each(aFields, function(key, value) {
			if (value.defaultShow) {
				checkBoxes += '<input id="'+value.field+'" class="filterCheckbox" type="checkbox" checked> '+value.title + ', ';
			}
			else {
				checkBoxes += '<input id="'+value.field+'" class="filterCheckbox" type="checkbox"> '+value.title + ', ';
				$("." + value.field).hide();
			}
		});
		
		console.log(checkBoxes);
		
		
		
        /*
            ZET DE HTML
         */



        $("#api_selectors").html(checkBoxes);
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



$(document).on('change', '.filterCheckbox', function (event) {
	if(!this.checked) {
        $("." + $(this).attr('id')).hide();
    }
	else {
		$("." + $(this).attr('id')).show();
	}
});