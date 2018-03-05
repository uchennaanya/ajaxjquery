$(document).ready(function() {
    $('#formData').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url: "mserver.php",
            cache: false,
            contentType: false,
            processData: false,
            method: "post",
            data: new FormData(this),
            dataType: "json"
        }).done(function(resp) {
            if (resp.input == "fname") {
                document.getElementById('erfname').innerHTML = resp.message;
                document.getElementById('valid').innerHTML="";
            } else if (resp.input == "sname") {
                document.getElementById('ersname').innerHTML=resp.message;
                document.getElementById('valid').innerHTML="";
            } else if (resp.input == "gender") {
                document.getElementById('ergender').innerHTML=resp.message;
                document.getElementById('valid').innerHTML="";
            } else if (resp.input == "dob") {
                document.getElementById('erdob').innerHTML=resp.message;
                document.getElementById('valid').innerHTML="";
            } else if (resp.input == "age") {
                document.getElementById('erage').innerHTML=resp.message;
                document.getElementById('valid').innerHTML="";
            } else if (resp.input == "phone") {
                document.getElementById('erphone').innerHTML=resp.message;
                document.getElementById('valid').innerHTML="";
            } else if (resp.input == "mail") {
                document.getElementById('ermail').innerHTML=resp.message;
                document.getElementById('valid').innerHTML="";
            } else if (resp.input == "address") {
                document.getElementById('eraddress').innerHTML=resp.message;
                document.getElementById('valid').innerHTML="";
            } else if (resp.input == "state") {
                document.getElementById('erstate').innerHTML=resp.message;
                document.getElementById('valid').innerHTML="";
            } else if (resp.input=="guidian") {
                document.getElementById('erguidian').innerHTML=resp.message;
                document.getElementById('valid').innerHTML="";
            } else if (resp.input=="image") {
                document.getElementById('erimg').innerHTML=resp.message;
                document.getElementById('valid').innerHTML="";
            } else {
                document.getElementById('erfname').innerHTML= "";
                document.getElementById('ersname').innerHTML= "";
                document.getElementById('ergender').innerHTML= "";
                document.getElementById('erdob').innerHTML= "";
                document.getElementById('erage').innerHTML= "";
                document.getElementById('erphone').innerHTML= "";
                document.getElementById('ermail').innerHTML= "";
                document.getElementById('eraddress').innerHTML= "";
                document.getElementById('erstate').innerHTML= "";
                document.getElementById('erguidian').innerHTML= "";
                document.getElementById('erimg').innerHTML="";
                document.getElementById('valid').innerHTML = resp.message;
            }
        }).fail(function(error, status, xhr){
        });
    });
});