function sortAscActivity(){
    $.ajax({
        url : 'dashboard/sortAscActivity',
        method : 'post',
        dataType : 'json',
        data : {
            _token: $("input[name='_token']").val()
        },
        success: function (rData) {
            let write = ``;
            for(let i=0; i<rData.length; i++){
                write += `<tr>
                                    <th scope="row">`+ (i+1) +`</th>
                                    <td> `+rData[i][3]+` </td>
                                    <td>`+rData[i][4]+`</td>
                                    <td>`+rData[i][5]+`</td>
                                    <td>`+rData[i][6]+`</td>
                                </tr>`;
            }
            $('#tableActivity').html(write);
        },error:function () {

        }
    })
}

function sortDescActivity() {
    $.ajax({
        url: 'dashboard/sortDescActivity',
        method: 'post',
        dataType: 'json',
        data: {
            _token: $("input[name='_token']").val()
        },
        success: function (rData) {
            let write = ``;
            for (let i = 0; i < rData.length; i++) {
                write += `<tr>
                                    <th scope="row">` + (i + 1) + `</th>
                                    <td> ` + rData[i][3] + ` </td>
                                    <td>` + rData[i][4] + `</td>
                                    <td>` + rData[i][5] + `</td>
                                    <td>` + rData[i][6] + `</td>
                                </tr>`;
            }
            $('#tableActivity').html(write);
        }, error: function () {

        }
    })
}
$(document).on("change", "#sortActivity", function(e) {
    let sortOpt = $(this).val();
    if(sortOpt == 2){
        sortDescActivity();
    }else if(sortOpt == 1){
        sortAscActivity();
    }
})


function sortAscAutentification(){
    $.ajax({
        url : 'dashboard/sortAscAutentification',
        method : 'post',
        dataType : 'json',
        data : {
            _token: $("input[name='_token']").val()
        },
        success: function (rData) {
            let write = ``;
            for(let i=0; i<rData.length; i++){
                write += `<tr>
                                    <th scope="row">`+ (i+1) +`</th>
                                    <td> `+rData[i][3]+` </td>
                                    <td>`+rData[i][4]+`</td>
                                    <td>`+rData[i][5]+`</td>
                                    <td>`+rData[i][6]+`</td>
                                </tr>`;
            }
            $('#tableAutentification').html(write);
        },error:function () {

        }
    })
}

function sortDescAutentification() {
    $.ajax({
        url: 'dashboard/sortDescAutentification',
        method: 'post',
        dataType: 'json',
        data: {
            _token: $("input[name='_token']").val()
        },
        success: function (rData) {
            let write = ``;
            for (let i = 0; i < rData.length; i++) {
                write += `<tr>
                                    <th scope="row">` + (i + 1) + `</th>
                                    <td> ` + rData[i][3] + ` </td>
                                    <td>` + rData[i][4] + `</td>
                                    <td>` + rData[i][5] + `</td>
                                    <td>` + rData[i][6] + `</td>
                                </tr>`;
            }
            $('#tableAutentification').html(write);
        }, error: function () {

        }
    })
}
$(document).on("change", "#sortAutentification", function(e) {
    let sortOpt = $(this).val();
    if(sortOpt == 2){
        sortDescAutentification();
    }else if(sortOpt == 1){
        sortAscAutentification();
    }
})
