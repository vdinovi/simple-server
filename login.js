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
        $.ajax({
            type: 'post',
            url: 'cgi-bin/login.php',
            data: $("#loginForm").serialize(),
            success: function(data) {
                $(document).UID = data['UID'];
                alert(data['msg']);
            },
	    error: function(data) {
	        console.log(data['msg']);
	    }
        });
        e.preventDefault();
    });
});

$(document).ready(function() {
    // signup
    $("#signupForm").submit(function(e) { 
        $.ajax({
            type: 'post',
            url: 'cgi-bin/signup.php',
            data: $("#signupForm").serialize(),
            success: function(data) {
                alert(data['msg']);
            },
            error: function(data) {
                console.log(data['msg']);
            }
        });
        e.preventDefault();
    });
});

