



var submit=document.querySelector("#submit");

function submitForm() {
    var xhr = new XMLHttpRequest();
    var url = "mysql.php";
    var formData = new FormData(document.getElementById('dataForm'));

    xhr.open("POST", url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('response').innerText = xhr.responseText;
        }
    };
    xhr.send(formData);
}

submit.addEventListener("click",()=>{
    console.log("clicked");
    submitForm();
})