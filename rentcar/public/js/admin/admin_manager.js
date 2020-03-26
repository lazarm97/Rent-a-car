$(document).on("click", "#btnUpdate", function(e) {
    e.preventDefault();
    let id = $('#id').val();
    let email = $('#email').val();
    let password = $('#password').val();
    $.ajax({
        url: "acc_manager",
        method: "put",
        data:{
            _token: $("input[name='_token']").val(),
            id : id,
            email : email,
            password : password,
        },
        success: function () {
            alert('Changes was saved!');
        }
    })
})

$(document).on("click", "#btnInsertNew", function(e) {
    e.preventDefault();
    let fNameNew = $('#fNameNew').val();
    let lNameNew = $('#lNameNew').val();
    let email = $('#emailNew').val();
    let password = $('#passwordNew').val();
    $.ajax({
        url: "acc_manager/create",
        method: "get",
        data:{
            _token: $("input[name='_token']").val(),
            fName : fNameNew,
            lName : lNameNew,
            email : email,
            password : password,
        },
        success: function () {
            alert('Admin is created!');
        }
    })
})

$(document).on("click", "#btnDelete", function(e) {
    e.preventDefault();
    let id = $('#id').val();
    $.ajax({
        url: "acc_manager/" + id,
        method: "delete",
        data:{
            _token: $("input[name='_token']").val(),
        },
        success: function () {
            alert('Deleted!');
            window.location.href = "/logout";
        }
    })
})
