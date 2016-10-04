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
                updateTable();
            },
            error: function(data) {
                console.log("Clear failure");
            }
        });
    }
}
