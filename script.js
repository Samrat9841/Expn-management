var btn=document.querySelector(" button");



function deleteRecord() {
    var recordName = document.getElementById('recordId').value;
    var xhr = new XMLHttpRequest();
    var url = "delete.php";

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('response').innerText = xhr.responseText;
        }
    };
    xhr.send("name=" + encodeURIComponent(recordName));
}


btn.addEventListener("click",()=>{
    console.log("clicked");
    deleteRecord();
})



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