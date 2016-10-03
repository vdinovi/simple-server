function clearUsers() {
    var password = prompt("This operation requires an administrator password.");
    if (password != null) {
        $.ajax({
            type:"POST",
            url:'cgi-bin/clear.php',
            dataType:'text',
            data: { passwd: password },
            success: function (obj) {
                console.log(obj);
                updateTable();
            },
            error: function(xhr, ajaxOptions, err) {
                console.log(xhr.responseText);
            }
        });
    }
}
$(document).ready(function() {
    // login 
    $("#loginForm").submit(function(e) { 
        console.log($("loginForm").serialize());
        $.ajax({
            type: 'post',
            url: 'cgi-bin/login.php',
            datatype: "url",
            data: $("#loginForm").serialize(),
            success: function(data) {
                $UID = data['UID'];
                alert(data['msg']);
            }
        });
        e.preventDefault();
    });
});

