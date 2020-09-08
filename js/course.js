async function getData() {
    let array = await fetch(
        'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json'
    );
    let content = await array.json();


    $content = json_decode($response, true);
    let result;

    for (let value in content) {
        if (value['r030'] == 840) {
            result = value['rate'];
        }
    }

        let option = document.createElement("option");
        span.innerText = result;
        course.appendChild(span);
    }



document.addEventListener("DOMContentLoaded", () => {
    getData();
});