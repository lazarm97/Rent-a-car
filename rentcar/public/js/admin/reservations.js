$(document).on("change", "#slcReservations", function(e) {
    e.preventDefault();
    let id = $(this).val();
    if(id == 0){
        $('#table-reservation').html("");
    }else {
        $.ajax({
            url: "reservation/" + id,
            method: "get",
            dataType: 'json',
            success: function (data) {
                data = data[0];
                let write = `
                              <table class="table col-lg-6 m-lg-auto">
                                <tbody>
                                <tr>
                                    <th scope="row">First name</th>
                                    <td>` + data['first_name'] + `</td>
                                </tr>
                                <tr>
                                    <th scope="row">Last name</th>
                                    <td>` + data['last_name'] + `</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>` + data['email'] + `</td>
                                </tr>
                                <tr>
                                    <th scope="row">Mobile</th>
                                    <td>` + data['mobile'] + `</td>
                                </tr>
                                <tr>
                                    <th scope="row">Identity card number</th>
                                    <td>` + data['icn'] + `</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pick up location</th>
                                    <td>` + data['pLocation'] + `</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pick up date</th>
                                    <td>` + data['p_date'] + `</td>
                                </tr>
                                <tr>
                                    <th scope="row">Return location</th>
                                    <td>` + data['rLocation'] + `</td>
                                </tr>
                                <tr>
                                    <th scope="row">Return date</th>
                                    <td>` + data['r_date'] + `</td>
                                </tr>
                                <tr>
                                    <th scope="row">Description</th>
                                    <td>` + data['description'] + `</td>
                                </tr>
                                </tbody>
                            </table>
                `;
                $('#table-reservation').html(write);
            }
        })
    }
})
