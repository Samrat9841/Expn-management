var reset=document.querySelector("#reset");

function resetForm() {
    var xxh = new XMLHttpRequest();
    var link = "reset.php";
    var form = new FormData(document.getElementById('dataForm'));

    xxh.open("POST", link, true);
    xxh.onreadystatechange = function () {
        if (xxh.readyState === 4 && xxh.status === 200) {
            document.getElementById('response1').innerText = xxh.responseText;
        }
    };
    xxh.send(form);
}

reset.addEventListener("click",()=>{
    console.log("clicked");
    resetForm();
})



