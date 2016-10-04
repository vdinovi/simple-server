function clearUsers() {
    var password = prompt("This operation requires an administrator password.");
    if (password != null) {
        $.ajax({
            type:"POST",
            url:'cgi-bin/clear.php',
            dataType:'text',
            data: { passwd: password },
            success: function (obj) {
                console.log("Clear success");
            },
            error: function(data) {
                console.log("Clear failure");
            }
        });
    }
}

function updateTable() {
    var table = "<tr align='center'><th>Online Users</th></tr>";
    $.ajax({
        type:"GET",
        url:'cgi-bin/update.php',
        dataType:'json',
        success: function(obj) {
            for (var key in obj) {
                table += "<tr><th>"+obj[key]+"</th><th>";
            }
            $("#userTable").html(table); 
        }
    });
}
