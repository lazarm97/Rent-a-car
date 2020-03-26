$(document).on("click", ".update", function(e) {
    e.preventDefault();
    let id = $(this).data("id");
    let icn = $('#icn').val();
    let mobile = $('#mobile').val();
    let email = $('#email').val();
    let password = $('#password').val();
    $.ajax({
        url: "/user",
        method: "post",
        data:{
            _token: $("input[name='_token']").val(),
            id : id,
            icn : icn,
            mobile : mobile,
            email : email,
            password : password,
            action : 'updateUser'
        },
        success: function () {
            alert('Changes was saved!');
            $.ajax({
                url: "/selectedUser",
                method: "get",
                dataType: 'json',
                data: {
                    id : id
                },success: function (data) {
                    $('#fName').val(data['first_name']);
                    $('#lName').val(data['last_name']);
                    $('#email').val(data['email']);
                    $('#icn').val(data['icn']);
                    $('#mobile').val(data['mobile']);
                }
            })
        }
    })
})
