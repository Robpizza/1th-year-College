function getJson(id) {

    if (Number.isInteger(id)) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var myObj = JSON.parse(this.responseText);
                document.getElementById('api_title').innerHTML = myObj[id].page_name;
                document.getElementById('api_content').innerHTML = myObj[id].page_content;
            }
        };
    }

    xmlhttp.open("GET", "http://localhost/php-2/?controller=api&table=page&action=get", true);
    xmlhttp.send();
}