function getOptions() {
    $.ajax({
        url : 'customer_manager/all',
        method : 'post',
        dataType : 'json',
        data : {
            _token: $("input[name='_token']").val(),
        },
        success: function(data){
            let write = `
                                <option value="0" selected>Select customer</option>
                                <option value="-1" selected>Create customer</option>
                                `;
            for(let i=0; i<data.length; i++)
            {
                write += `<option value="`+data[i].id_customer+`">`+ data[i].first_name + ' ' + data[i].last_name+`</option>`;
            }
            $('#slcCustomer').html(write);
            $('#slcCustomer').val(0);
            $('#formCont').html("");
        }
    })
}
$(document).ready(function () {
    $('#slcCustomer').val(0);

});
$(document).on("change", "#slcCustomer", function(e) {
    e.preventDefault();
    let id = $(this).val();
    if(id == 0){
        $('#formCont').html("");
    }else if(id == -1){
        let write = `
                            <div class="form-group row">
                                <label for="fName" class="col-sm-2 col-lg-3 col-form-label">First name</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="fName" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lName" class="col-sm-2 col-lg-3 col-form-label">Last name</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="lName" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-lg-3 col-form-label">Email</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="email" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-lg-3 col-form-label">Password</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="password" class="form-control" id="password" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="icn" class="col-sm-2 col-lg-3 col-form-label">Identity card number</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="icn" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile" class="col-sm-2 col-lg-3 col-form-label">Mobile</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="mobile" value="">
                                </div>
                            </div>
                            <div class="form-group row justify-content-between">
                                <div class="col-md-3">
                                    <button type="button" id="btnInsert" name="btnInsert" class="btn btn-primary btn-block">Create</button>
                                </div>
                            </div>
                        `;
        $('#formCont').html(write);
    }else {
        $.ajax({
            url: "customer_manager/" + id,
            method: "get",
            dataType: 'json',
            success: function (data) {
                let write = `
                            <div class="form-group row">
                                <label for="fName" class="col-sm-2 col-lg-3 col-form-label">First name</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" readonly class="form-control-plaintext" id="fName" value="`+data['first_name']+`">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lName" class="col-sm-2 col-lg-3 col-form-label">Last name</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" readonly class="form-control-plaintext" id="lName" value="`+data['last_name']+`">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-lg-3 col-form-label">Email</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="email" value="`+data['email']+`">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-lg-3 col-form-label">Password</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="password" class="form-control" id="password" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="icn" class="col-sm-2 col-lg-3 col-form-label">Identity card number</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="icn" value="`+data['icn']+`">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile" class="col-sm-2 col-lg-3 col-form-label">Mobile</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="mobile" value="`+data['mobile']+`">
                                </div>
                            </div>
                            <div class="form-group row justify-content-between">
                                <div class="col-lg-6">
                                    <button type="button" id="btnUpdate" name="btnUpdate" class="btn btn-success btn-block">Update</button>
                                </div>
                                <div class="col-lg-6">
                                    <button type="button" id="btnDelete" name="btnDelete" class="btn btn-danger btn-block">Delete</button>
                                </div>
                            </div>
                        `;
                $('#formCont').html(write);
            }
        })
    }
})

$(document).on("click", "#btnUpdate", function(e) {
    let id = $('#slcCustomer').val();
    let email = $('#email').val();
    let password = $('#password').val();
    let icn = $('#icn').val();
    let mobile = $('#mobile').val();

    $.ajax({
        url: "customer_manager",
        method: "put",
        data : {
            _token: $("input[name='_token']").val(),
            id : id,
            email : email,
            password : password,
            icn : icn,
            mobile : mobile
        },
        success: function () {
            alert('uspesan update');
        },error: function(error){
            console.log(error);
        }
    });
})

$(document).on("click", "#btnDelete", function(e) {
    let id = $('#slcCustomer').val();

    $.ajax({
        url: "customer_manager/" + id,
        method: "delete",
        data : {
            _token: $("input[name='_token']").val(),
        },
        success: function () {
            alert('uspesan delete');
            getOptions();
        },error: function(error){
            alert(error);
        }
    });
})

$(document).on("click", "#btnInsert", function(e) {
    let fName = $('#fName').val();
    let lName = $('#lName').val();
    let email = $('#email').val();
    let password = $('#password').val();
    let icn = $('#icn').val();
    let mobile = $('#mobile').val();

    $.ajax({
        url: "customer_manager/create",
        method: "get",
        data : {
            _token: $("input[name='_token']").val(),
            fName : fName,
            lName : lName,
            email : email,
            password : password,
            icn : icn,
            mobile : mobile
        },
        success: function () {
            alert('uspesan create');
            getOptions();
        },error: function(error){
            console.log(error);
        }
    });
})
