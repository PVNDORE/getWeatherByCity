function main() {

    let city = document.getElementById("city").value;

    let url = 'controller/searchByCity.php?city='+city;

    makeRequest(url);
}

function makeRequest(url) {
    let httpRequest = new XMLHttpRequest();

    if (!httpRequest) {
        alert('Impossible to create an XMLHTTP instance');
        return false;
    }

    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('POST', url, true);
    httpRequest.send();

    function alertContents() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                let response = httpRequest.responseText;

                document.getElementById("result_table").removeAttribute('hidden');

                document.getElementById("result_table_body").insertAdjacentHTML("afterbegin", response);

            } else {
                alert('I\'m sorry there is an AJAX request issue :(');
            }
        }
    }
}