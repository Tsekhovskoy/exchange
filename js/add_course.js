/**
 * Adding a new force course and rendering actual force courses without reloading the page.
 * After clicking on the Submit button (see /views/set_course.php) form with data send to Set.php controller.
 * Callable ajax function update force course records without page reloading.
 * Block calls from /views/set_course.php
 */

$( document ).ready(function() {
    $(".force_btn").click(
        function(){
            if($('#date').val() && $('#time').val() && $('#forcecourse').val()) {
                sendAjaxForm('set_course', '/force/add');
            } else {
                swal("Required fields are empty!", "Fill in the form, please", "error");
            }
            return false;
        }
    );
});

function sendAjaxForm(set_course, url) {
    $.ajax({
        url         :url,
        type        :"POST",
        data        :$("#"+set_course).serialize(),
        dataType    : "json",
        success: function(response) {
            $('#force_table').empty();
            $('#set_course')[0].reset();
            $('#force_table').append('<tr> <th>Force course created at</th> <th>Force course valid until</th> <th>Force course value</th> <th>Action</th> </tr>');

            for (var i = 0; i < response.length; i++) {
                $('#force_table').append('<tr class="item" id="'+ response[i].id + '">' +
                    '<td>' + response[i].startdate + '</td>>' +
                    '<td>' + response[i].stopdate + '</td>' +
                    '<td>' + response[i].course + '</td>' +
                    '<td class="actbox" > ' +
                    '<a class="bcross" data-id="' + response[i].id + '">' +
                    '</a></td></tr>');
            }
            swal("Added!", "Cross course created.", "success");
        },
        error: function() {
            swal("Course Not Added!", "No course added. Check your internet connection or contact technical support.", "error");
            $('#set_course')[0].reset();
        }
    });
}