$(document).on('click', '#isAdmin', function(e){
    if(this.checked)
        $('#isAdmin').val(true);
    else
        $('#isAdmin').val(false);
})
