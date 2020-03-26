function getOptions() {
    $.ajax({
        url : 'cars_manager/all',
        method : 'post',
        dataType : 'json',
        data : {
            _token: $("input[name='_token']").val(),
        },
        success: function(data){
            let write = `
                                <option value="0" selected>Select car</option>
                                <option value="-1" selected>Create car</option>
                                `;
            for(let i=0; i<data.length; i++)
            {
                write += `<option value="`+data[i].id_car+`">`+ data[i].brand + ' ' + data[i].model+`</option>`;
            }
            $('#slcCar').html(write);
            $('#slcCar').val(0);
            $('#formCont').html("");
        }
    })
}
$(document).ready(function () {
    $('#slcCar').val(0);

});
$(document).on("change", "#slcCar", function(e) {
    e.preventDefault();
    let id = $(this).val();
    if(id == 0){
        $('#formCont').html("");
    }else if(id == -1){
        let write = `

                            <div class="form-group row">
                                <label for="brand" class="col-sm-2 col-lg-3 col-form-label">Brand</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="brand" name="brand" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="model" class="col-sm-2 col-lg-3 col-form-label">Model</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="model" name="model" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="transmission" class="col-sm-2 col-lg-3 col-form-label">Transmission</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="transmission" name="transmission" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="doors" class="col-sm-2 col-lg-3 col-form-label">Doors</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="doors" name="doors" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="seats" class="col-sm-2 col-lg-3 col-form-label">Seats</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="seats" name="seats" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fuel" class="col-sm-2 col-lg-3 col-form-label">Fuel</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="fuel" name="fuel" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vin" class="col-sm-2 col-lg-3 col-form-label">Vin</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="vin" name="vin" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-lg-3 col-form-label">Price</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="price" name="price" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-lg-3 col-form-label">Description</label>
                                <div class="col-sm-10 col-lg-9">
                                    <textarea class="form-control" rows="4" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-lg-3 col-form-label">Image</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="file" id="image" name="image" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row justify-content-between">
                                <div class="col-md-3">
                                    <input type="submit" id="btnInsert" name="btnInsert" class="btn btn-primary btn-block" value="Create">
                                </div>
                            </div>

                        `;
        $('#formCont').html(write);
    }else {
        $.ajax({
            url: "cars_manager/" + id,
            method: "get",
            dataType: 'json',
            success: function (data) {
                let write = `
                            <div class="form-group row">
                                <label for="brand" class="col-sm-2 col-lg-3 col-form-label">Brand</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="brand" value="`+ data['brand'] +`">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="model" class="col-sm-2 col-lg-3 col-form-label">Model</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="model" value="`+ data['model'] +`">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="transmission" class="col-sm-2 col-lg-3 col-form-label">Transmission</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="transmission" value="`+ data['transmission'] +`">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="doors" class="col-sm-2 col-lg-3 col-form-label">Doors</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="doors" value="`+ data['doors'] +`">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="seats" class="col-sm-2 col-lg-3 col-form-label">Seats</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="seats" value="`+ data['seats'] +`">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fuel" class="col-sm-2 col-lg-3 col-form-label">Fuel</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="fuel" value="`+ data['fuel'] +`">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vin" class="col-sm-2 col-lg-3 col-form-label">Vin</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="vin" value="`+ data['vin'] +`">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-lg-3 col-form-label">Price</label>
                                <div class="col-sm-10 col-lg-9">
                                    <input type="text" class="form-control" id="price" value="`+ data['price'] +`">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-lg-3 col-form-label">Description</label>
                                <div class="col-sm-10 col-lg-9">
                                    <textarea class="form-control" rows="4" id="description">`+ data['description'] +`</textarea>
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
                console.log(write);
                $('#formCont').html(write);
            }
        })
    }
})

$(document).on("click", "#btnUpdate", function(e) {
    let id = $('#slcCar').val();
    let brand = $('#brand').val();
    let model = $('#model').val();
    let transmission = $('#transmission').val();
    let doors = $('#doors').val();
    let seats = $('#seats').val();
    let fuel = $('#fuel').val();
    let vin = $('#vin').val();
    let price = $('#price').val();
    let description = $('#description').val();
    $.ajax({
        url: "cars_manager",
        method: "put",
        enctype: 'multipart/form-data',
        data : {
            _token: $("input[name='_token']").val(),
            id : id,
            brand : brand,
            model : model,
            transmission : transmission,
            doors : doors,
            seats : seats,
            fuel : fuel,
            vin : vin,
            price : price,
            description : description
        },
        success: function () {
            alert('uspesan update');
            getOptions();
        },error: function(error){
            console.log(error);
        }
    });
})

$(document).on("click", "#btnDelete", function(e) {
    let id = $('#slcCar').val();
    $.ajax({
        url: "cars_manager/" + id,
        method: "delete",
        data : {
            _token: $("input[name='_token']").val(),
        },
        success: function () {
            alert('uspesan delete');
            getOptions();
        },error: function(error){
            console.log(error);
        }
    });
})
