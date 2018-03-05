$(document).ready(function () {
    $("#loginform").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "log.php",
            method: "post",
            dataType: "json",
            data: $(this).serialize()
        }).done(function (res) {
            if (res.input === "user") {
                document.getElementById('eruser').innerHTML = res.message;
                document.getElementById('valid').innerHTML = "";
            } else if (res.input === "pass") {
                document.getElementById('erpass').innerHTML = res.message;
                document.getElementById('valid').innerHTML = "";
            } else {
                document.getElementById('erpass').innerHTML = "";
                document.getElementById('eruser').innerHTML = "";
                document.getElementById('valid').innerHTML = res.message;
            }
        });
    });
});