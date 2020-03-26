var putanjaSlike = "";
var putanjaSlikeOrg = "";
var chbArray = [];
var imgSrc = "";
var greske = [];

function uploadImg() {
    var property = document.getElementById("productImage").files[0];
    var image_name = property.name;
    var image_extension = image_name.split(".").pop().toLowerCase();
    if(jQuery.inArray(image_extension, ['png', 'jpg', 'jpeg']) == -1){
        alert('Invalid image file!');
    }
    var image_size = property.size;
    if(image_size > 2000000){
        alert('Image size is very big!');
    }
    var form_data = new FormData();
    form_data.append("productImage", property);
    $.ajax({
        url:"app/logic/upload.php",
        method:"POST",
        data:form_data,
        contentType:false,
        cache:false,
        processData:false,
        success:function(data){
            imgSrc = data;
            putanjaSlike = 'app/assets/img/male_slike/mala_'+imgSrc;
            putanjaSlikeOrg = 'app/assets/img/originalne_slike/org_'+imgSrc;
            let ispis = `<img src ="app/assets/img/tmp/mala_`+imgSrc+`" class="img-thumbnail" />`;
            $('#uploaded_img').html(ispis);
        }
    });
}

function chbOrdersClick(obj){
    let chb = $(obj).data("id");        
        if(obj.checked == true){
            chbArray.push(chb);
        }else{
            let tmpArray = [];
            for(let i=0; i<chbArray.length; i++){
                if(chbArray[i] == chb) continue;
                tmpArray.push(chbArray[i]);
            }
            chbArray = tmpArray;
        }
}

function chbProductsClick(obj){
    let chb = $(obj).data("id");
    if(obj.checked == true){
        chbArray.push(chb);
    }else{
        let tmpArray = [];
        for(let i=0; i<chbArray.length; i++){
            if(chbArray[i] == chb) continue;
            tmpArray.push(chbArray[i]);
        }
        chbArray = tmpArray;
    }
}

function chbCustomerClick(obj){
    let chb = $(obj).data("id");
    if(obj.checked == true){
        chbArray.push(chb);
    }else{
        let tmpArray = [];
        for(let i=0; i<chbArray.length; i++){
            if(chbArray[i] == chb) continue;
            tmpArray.push(chbArray[i]);
        }
        chbArray = tmpArray;
    }
}

$(document).ready(function(){

    alertHide();
    $(".edit-form").hide();

    function alertHide(){
        $(".alert").hide();
    }

    function alertShow(){
        $(".alert").show();
    }
    
    var lastClick;
    $(".chbOrders").click(function(){
        let chb = $(this).data("id");
        
        if(this.checked == true){
            chbArray.push(chb);
        }else{
            let tmpArray = [];
            for(let i=0; i<chbArray.length; i++){
                if(chbArray[i] == chb) continue;
                tmpArray.push(chbArray[i]);
            }
            chbArray = tmpArray;
        }
    });

    $(".chbProducts").click(function(){
        let chb = $(this).data("id");
        if(this.checked == true){
            chbArray.push(chb);
        }else{
            let tmpArray = [];
            for(let i=0; i<chbArray.length; i++){
                if(chbArray[i] == chb) continue;
                tmpArray.push(chbArray[i]);
            }
            chbArray = tmpArray;
        }
    });

    $(".chbCustomer").click(function(){
        let chb = $(this).data("id");
        if(this.checked == true){
            chbArray.push(chb);
        }else{
            let tmpArray = [];
            for(let i=0; i<chbArray.length; i++){
                if(chbArray[i] == chb) continue;
                tmpArray.push(chbArray[i]);
            }
            chbArray = tmpArray;
        }
    });

    $(document).on("click", "#btnDeliveredOrder", function(){
    if(chbArray.length == 0){
        $(".alert p").html("Please select checkbox for delivered order!");
        alertShow();
        setTimeout(alertHide,3000);
    }else{
        $.ajax({
            url:'app/logic/order.php',
            method:'get',
            dataType:'json',
            data:{
                action:'delivered',
                params:chbArray
            },success:function(data){
                let ispis = ``;
                for(let i=0; i<data.length; i++){
                    ispis += `<tr class="order-tr `; if(data[i].delivered == 1) ispis += "delivered-success";  ispis += `" data-id=`+data[i].Id +`>
                                    <td><input type="checkbox" class="chbOrders" onclick="chbOrdersClick(this)" data-id=`+ data[i].Id +`></td>
                                    <td>`+ data[i].Products +`</td>
                                    <td>`+ data[i].Customer +`</td>
                                    <td>`+ data[i].Quantity +`</td>
                                    <td>`+ data[i].Date +`</td>
                                    <td>`+ data[i].Price +`</td>
                                </tr>`;
                }
                $("#bodyOrders").html(ispis); 
                chbArray = [];                   
            },error:function(){
                $(".alert p").html("Please select only orders that have not been delivered!");
                alertShow();
                setTimeout(alertHide,3000);
            }
        });
        }
    });

    $("#btnNoDelivredOrder").click(function(){

        if(chbArray.length == 0){
            $(".alert p").html("Please select checkbox for delivered order!");
            alertShow();
            setTimeout(alertHide,3000);
        }else{$.ajax({
                    url:'app/logic/order.php',
                    method:'get',
                    dataType:'json',
                    data:{
                        action:'noDelivered',
                        params:chbArray
                    },success:function(data){
                        let ispis = ``;
                        for(let i=0; i<data.length; i++){
                            ispis += `<tr class="order-tr `; if(data[i].delivered == 1) ispis += "delivered-success";  ispis += `" data-id=`+ data[i].Id +`>
                                            <td><input type="checkbox" class="chbOrders"  onclick="chbOrdersClick(this)" data-id=`+ data[i].Id +`></td>
                                            <td>`+ data[i].Products +`</td>
                                            <td>`+ data[i].Customer +`</td>
                                            <td>`+ data[i].Quantity +`</td>
                                            <td>`+ data[i].Date +`</td>
                                            <td>`+ data[i].Price +`</td>
                                        </tr>`;
                        }
                        $("#bodyOrders").html(ispis);
                        chbArray = [];
                    },error:function(){
                        $(".alert p").html("Please select only orders that have been delivered!");
                        alertShow();
                        setTimeout(alertHide,3000);
                    }
                });
            }
    });

    $("#btnDeleteProduct").click(function(){

        if(chbArray.length == 0){
            $(".alert p").html("Please select checkbox for delete product!");
            alertShow();
            setTimeout(alertHide,3000);
        }else{$.ajax({
            url:'app/logic/product.php',
            method:'get',
            dataType:"json",
            data:{
                action:'delete',
                params:chbArray
            },success:function(data){
                let ispis = ``;
                for(let i=0; i<data.length; i++){
                ispis += `<tr class="product-tr" data-id=`+ data[i].id +`>
                            <td><input type="checkbox" class="chbProducts"  onclick="chbProductsClick(this)" data-id=`+data[i].id+`></td>
                            <td>`+ data[i].name +`</td>
                            <td>`+ data[i].stock +`</td>
                            <td>`+ data[i].price +`</td>
                        </tr>`;
                }
                $("#bodyProducts").html(ispis);
                chbArray = [];    
            },error:function(){
                $(".alert p").html("Please select only one product for delete!");
                alertShow();
                setTimeout(alertHide,3000);
            }
        });
    }
    });

    var editFormIdentificator = 1;
    $("#btnUpdateProduct").click(function(){
        lastClick = "updateProduct";
        if(chbArray.length == 0 && editFormIdentificator == 1){
            $(".alert p").html("Please select product!");
            alertShow();
            setTimeout(alertHide,3000); 
        }else if(chbArray.length > 1 && editFormIdentificator == 1){
            $(".alert p").html("Please select only one product!");
            alertShow();
            setTimeout(alertHide,3000); 
        }else{
            if(editFormIdentificator == 1){
                let id = chbArray[0];
                $.ajax({
                    url:"app/logic/product.php",
                    method:"get",
                    dataType:"json",
                    data:{
                        id : id,
                        action: "getOne"
                    },success:function(data){
                        $("#productName").val(data[0].name);
                        $("#productStock").val(data[0].stock);
                        $("#productPrice").val(data[0].price);
                        $("#productDescription").val(data[0].description);
                        if(data[0].org_image!=""){
                            $('#uploaded_img').html('<img src = "'+data[0].small_image+'" class="img-thumbnail" />');
                        }else  $('#uploaded_img').html("Nema slike!");
                        putanjaSlike = data[0].small_image;
                        putanjaSlikeOrg = data[0].org_image;
                    },error:function(){
                        $(".alert p").html("Something is wrong!");
                        alertShow();
                        setTimeout(alertHide,3000);
                    }
                });
                $(".edit-form").show();
                editFormIdentificator=2;
            }   
            else{
                $(".edit-form").hide()
                editFormIdentificator=1;
            }
        }
    });
    var form_identificator;
    $(".edit-form button").click(function(){
        
        let tmpArray = [];
        if (window.XMLHttpRequest) {
            xmlhttp=new XMLHttpRequest();
        } else {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        if(lastClick == "updateProduct"){
            form_identificator = "ajax";
            let productName = $("#productName").val();
            let productStock = $("#productStock").val();
            let productPrice = $("#productPrice").val();
            let productDescription = $("#productDescription").val();

            let productNameReg = /[^\.\,\"\?\!\;\:\#\$\%\&\(\)\*\+\-\/\<\>\=\@\[\]\\\^\_\{\}\|\~]+/;
            let productStockReg = /\d+/;
            let productPriceReg = /\d+\,{1}\d+/;
            let productDescriptionReg = /[^\"\;\:\#\$\%\&\(\)\*\+\-\/\<\>\=\@\[\]\\\^\_\{\}\|\~]+/;

            if(!productNameReg.test(productName)) greske.push("Product name was incorect!");
            if(!productStockReg.test(productStock)) greske.push("Product stock was incorect!");
            if(!productPriceReg.test(productPrice)) greske.push("Product price was incorect!");
            if(!productDescriptionReg.test(productDescription)) greske.push("Product description was incorect!");

            if(greske.length == 0){
                let id = chbArray[0];
                $.ajax({
                    url:"app/logic/product.php",
                    method:"post",
                    data:{
                        action:"update",
                        productName:productName,
                        productStock:productStock,
                        productPrice:productPrice,
                        productDescription,productDescription,
                        orgImage:putanjaSlikeOrg,
                        smallImage:putanjaSlike,
                        id:id
                    },success:function(){
                        $(".alert p").html("Selected checkbox are modified!");
                        alertShow();
                        setTimeout(alertHide,3000);  
                    },error:function(){
                        $(".alert p").html("Selected checkbox arent modified!");
                        alertShow();
                        setTimeout(alertHide,3000); 
                    }
                });
            }else{
                let textErrors = "";
                for(let i = 0; i < greske.length; i++){
                    textErrors+= greske[i]+"<br>";
                }
                $(".alert p").html(textErrors);
                alertShow();
                setTimeout(alertHide,7000);  
                greske = [];
            }
        }else if(lastClick == "insertProduct"){
            form_identificator = "ajax";
            let productName = $("#productName").val();
            let productStock = $("#productStock").val();
            let productPrice = $("#productPrice").val();
            let productDescription = $("#productDescription").val();

            let productNameReg = /[^\.\,\"\?\!\;\:\#\$\%\&\(\)\*\+\-\/\<\>\=\@\[\]\\\^\_\{\}\|\~]+/;
            let productStockReg = /\d+/;
            let productPriceReg = /\d+\,{1}\d+/;
            let productDescriptionReg = /[^\"\;\:\#\$\%\&\(\)\*\+\-\/\<\>\=\@\[\]\\\^\_\{\}\|\~]+/;

            if(!productNameReg.test(productName)) greske.push("Product name was incorrent!");
            if(!productStockReg.test(productStock)) greske.push("Product stock was incorrent!");
            if(!productPriceReg.test(productPrice)) greske.push("Product price was incorrent!");
            if(!productDescriptionReg.test(productDescription)) greske.push("Product description was incorrent!");

            if(greske.length == 0){
                $.ajax({
                    url:"app/logic/product.php",
                    method:"post",
                    dataType:"json",
                    data:{
                        action:"newProduct",
                        productName:productName,
                        productStock:productStock,
                        productPrice:productPrice,
                        productDescription:productDescription,
                        orgImage:imgSrc,
                    },success:function(data){
                        let ispis = ``;
                        for(let i=0; i<data.length; i++){
                        ispis += `<tr class="product-tr" data-id=`+ data[i].id +`>
                                    <td><input type="checkbox" class="chbProducts"  onclick="chbProductsClick(this)" data-id=`+data[i].id+`></td>
                                    <td>`+ data[i].name +`</td>
                                    <td>`+ data[i].stock +`</td>
                                    <td>`+ data[i].price +`</td>
                                </tr>`;
                        }
                        $("#bodyProducts").html(ispis);
                        chbArray = [];    
                        $(".alert p").html("Product was added!");
                        alertShow();
                        setTimeout(alertHide,5000);  
                    },error:function(){
                        alert("Image was required!");
                    }
                });
            }else{
                let textErrors = "";
                for(let i = 0; i < greske.length; i++){
                    textErrors+= greske[i]+"<br>";
                }
                $(".alert p").html(textErrors);
                alertShow();
                setTimeout(alertHide,7000);  
                greske = [];
            }
        }else if(lastClick == "insertCustomer"){
            let customerName = $("#customerName").val();
            let customerAddress = $("#customerAddress").val();
            let customerPhone = $("#customerPhone").val();

            let customerNameReg = /[^\.\,\"\?\!\;\:\#\$\%\&\(\)\*\+\-\/\<\>\=\@\[\]\\\^\_\{\}\|\~]+/;
            let customerAddressReg = /[^\.\,\"\?\!\;\:\#\$\%\&\(\)\*\+\-\/\<\>\=\@\[\]\\\^\_\{\}\|\~]+/;
            let customerPhoneReg = /0?(\+?381[6123456]|0[6123456]{1,3}){1}(([ \/\+_-]{1}\d)+|\d+){1,6}/;

            if(!customerNameReg.test(customerName)) greske.push("Customer name was incorect!");
            if(!customerAddressReg.test(customerAddress)) greske.push("Customer address was incorect!");
            if(!customerPhoneReg.test(customerPhone)) greske.push("Customer phone was incorect!");
            
            if(greske.length == 0){
                tmpArray = [customerName,customerAddress,customerPhone];
                $.ajax({
                    url:'app/logic/customer.php',
                    method:'post',
                    dataType:"json",
                    data:{
                        action:'newCustomer',
                        customerName:customerName,
                        customerAddress:customerAddress,
                        customerPhone:customerPhone
                    },success:function(data){
                        let ispis = ``;
                        for(let i=0; i<data.length; i++){
                        ispis += `<tr class="customer-tr" data-id=`+ data[i].id +`>
                                    <td><input type="checkbox" class="chbCustomer" onclick="chbCustomerClick(this)" data-id=`+data[i].id+`></td>
                                    <td>`+ data[i].name +`</td>
                                    <td>`+ data[i].address +`</td>
                                    <td>`+ data[i].phone +`</td>
                                </tr>`;
                        }
                        $("#bodyCustomer").html(ispis);
                        chbArray = [];    
                        $(".alert p").html("Customer was added!");
                        alertShow();
                        setTimeout(alertHide,3000);  
                    },error:function(err){
                        console.log(err);
                        alert("greska");
                    }
                });
            }else{
                let textErrors = "";
                for(let i = 0; i < greske.length; i++){
                    textErrors+= greske[i]+"<br>";
                }
                $(".alert p").html(textErrors);
                alertShow();
                setTimeout(alertHide,7000);  
                greske = [];
            }
        }else if(lastClick == "updateCustomer"){
            let customerName = $("#customerName").val();
            let customerAddress = $("#customerAddress").val();
            let customerPhone = $("#customerPhone").val();
            let id = chbArray[0];

            let customerNameReg = /[^\.\,\"\?\!\;\:\#\$\%\&\(\)\*\+\-\/\<\>\=\@\[\]\\\^\_\{\}\|\~]+/;
            let customerAddressReg = /[^\.\,\"\?\!\;\:\#\$\%\&\(\)\*\+\-\/\<\>\=\@\[\]\\\^\_\{\}\|\~]+/;
            let customerPhoneReg = /0?(\+?381[6123456]|0[6123456]{1,3}){1}(([ \/\+_-]{1}\d)+|\d+){1,6}/;

            if(!customerNameReg.test(customerName)) greske.push("Customer name was incorect!");
            if(!customerAddressReg.test(customerAddress)) greske.push("Customer address was incorect!");
            if(!customerPhoneReg.test(customerPhone)) greske.push("Customer phone was incorect!");

            tmpArray = [customerName,customerAddress,customerPhone,id];
            if(greske.length == 0){
                $.ajax({
                    url:'app/logic/customer.php',
                    method:'post',
                    data:{
                        action:'update',
                        customerName:customerName,
                        customerAddress:customerAddress,
                        customerPhone:customerPhone,
                        id:id
                    },success:function(data){
                        console.log(data);
                        $(".alert p").html("Selected checkbox are modified!");
                        alertShow();
                        setTimeout(alertHide,3000);
                    },error:function(){
                        alert("greska");
                    }
                });
            }else{
                let textErrors = "";
                for(let i = 0; i < greske.length; i++){
                    textErrors+= greske[i]+"<br>";
                }
                $(".alert p").html(textErrors);
                alertShow();
                setTimeout(alertHide,7000);  
                greske = [];
            }
        } 
    });

    $("#btnInsertProduct").click(function(){
        lastClick = "insertProduct";
        $("#productName").val("");
        $("#productStock").val("");
        $("#productPrice").val("");
        $("#uploaded_img").html("");
        $("#productDescription").val("");
        if(editFormIdentificator == 1){
            $(".edit-form").show();
            editFormIdentificator = 2;
        }else{
            $(".edit-form").hide();
            editFormIdentificator = 1;
        }
    });

    $("#btnInsertCustomer").click(function(){
        lastClick = "insertCustomer";
        $("#customerName").val("");
        if(editFormIdentificator == 1){
            $(".edit-form").show();
            editFormIdentificator = 2;
        }else{
            $(".edit-form").hide();
            editFormIdentificator = 1;
        }
    });

    $("#btnDeleteCustomer").click(function(){

        $.ajax({
            url:'app/logic/customer.php',
            method:'get',
            dataType:"json",
            data:{
                action:'delete',
                params:chbArray
            },success:function(data){
                    let ispis = ``;
                    for(let i=0; i<data.length; i++){
                    ispis += `<tr class="customer-tr" data-id=`+ data[i].id +`>
                                <td><input type="checkbox" class="chbCustomer" onclick="chbCustomerClick(this)" data-id=`+data[i].id+`></td>
                                <td>`+ data[i].name +`</td>
                                <td>`+ data[i].address +`</td>
                                <td>`+ data[i].phone +`</td>
                            </tr>`;
                    }
                    $("#bodyCustomer").html(ispis);
                    chbArray = [];    
                    $(".alert p").html("Selected checkboxs are deleted!");
                    alertShow();
                    setTimeout(alertHide,3000);    
            },error:function(){
                $(".alert p").html("Please select checkbox for delete customer!");
                alertShow();
                setTimeout(alertHide,3000);
            }
        });
    });

    $("#btnUpdateCustomer").click(function(){
        lastClick = "updateCustomer";
        if(chbArray.length == 0 && editFormIdentificator == 1){
            $(".alert p").html("Please select customer!");
            alertShow();
            setTimeout(alertHide,3000); 
        }else if(chbArray.length > 1 && editFormIdentificator == 1){
            $(".alert p").html("Please select only one customer!");
            alertShow();
            setTimeout(alertHide,3000); 
        }else{
            if(editFormIdentificator == 1){
                let id = chbArray[0];
                $.ajax({
                    url:"app/logic/customer.php",
                    method:"get",
                    dataType:"json",
                    data:{
                        id : id,
                        action: "getOne"
                    },success:function(data){
                        $("#customerName").val(data[0].name);
                        $("#customerAddress").val(data[0].address);
                        $("#customerPhone").val(data[0].phone);
                    }
                });
                $(".edit-form").show();
                editFormIdentificator=2;
            }   
            else{
                $(".edit-form").hide()
                editFormIdentificator=1;
            }
        }
    });

    $(".qty-input-text").keyup(function(){
        let id = $(this).data("id");
        let qty = $(this).val();
        if(qty == "" || isNaN(qty)){
            $(".btn-new-order[data-id="+id+"]").attr("disabled", true);
        }else{
            $(".btn-new-order[data-id="+id+"]").removeAttr("disabled");
        }
    });

    $(".btn-new-order").click(function(){
        let id = $(this).data("id");
        let qty = $(".qty-input-text[data-id="+id+"]").val();


        let orderQtyReg = /\d+/;
        if(!orderQtyReg.test(qty)) greske.push("Order quantuty was incorect!");

        if(greske.length == 0){
        $.ajax({
            url:"app/logic/order.php",
            method:"get",
            data:{
                action:"newOrder",
                productId:id,
                qty:qty
            },success:function(){
                alert("uspesno");
            },error:function(){
                alert("neuspeh");
            }
            
        });
    }else{
        let textErrors = "";
        for(let i = 0; i < greske.length; i++){
            textErrors+= greske[i]+"<br>";
        }
        $(".alert p").html(textErrors);
        alertShow();
        setTimeout(alertHide,7000);  
        greske = [];
    }
    });
});


