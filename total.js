var total=document.querySelector("#total");

function fetchData() {
    var xhr = new XMLHttpRequest();
    var url = "total.php";

    xhr.open("GET", url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            calculateSum(data);
        }
    };
    xhr.send();
}


function calculateSum(data) {
    var totalSum = 0;
    data.forEach(function(item) {
        totalSum += parseFloat(item);
    });
    document.getElementById('total-amount').innerText = "Total Sum: " + totalSum;
}

total.addEventListener("click",()=>{
    fetchData() ;
    console.log("Total clicked");
   
})