$(document).ready(function() {
    var table = $(".table-body");
    var tableHead = $(".table-head");
    $.ajax({
        url: 'get_students.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {

            table.empty();

            var header = $('<tr></tr>');
            header.append('<th>ID</th>');
            header.append('<th>Name</th>');
            header.append('<th>Address</th>');
            header.append('<th>Email</th>');
            header.append('<th>Date of Birth</th>');
            tableHead.append(header);

            data.forEach(function(student) {
                var row = $('<tr></tr>');
                row.append('<td>' + student.student_id + '</td>');
                row.append('<td>' + student.name + '</td>');
                row.append('<td>' + student.address + '</td>');
                row.append('<td>' + student.email + '</td>');
                row.append('<td>' + student.date_of_birth + '</td>');
                table.append(row);
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching student data:', textStatus, errorThrown);
        }
    });
});