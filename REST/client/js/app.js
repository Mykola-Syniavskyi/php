(function($){
    var $cars = $('#cars');
    var $oneCar= $('#oneCar')
    var template_car = $('#template_car').text();
    var template_car1 = $('#template_car1').text();
   
   
    function buildCars(cars) {
        $(cars).each(function(index, val) {
            var $car = $(template_car);
            $car.find('.cars-list').text(val.id + '.' +' '+ val.brand +' '+ val.model);
            $car.find('.button').text('watch ->'+val.model).data('id', val.id);
            $car.appendTo($cars);
        });

    
    
       

        //CLOSE WINDOW WITH ONE CAR
        $('body').on('click', ".car-list0", function() {
            $oneCar.html('');
            })
        
    }

//SWICHER FOR TOGGLE REGISTER AND LOGIN FORMS
    function hideForms(){
        var regForm = $("#ajax_form");
        var logForm = $("#log_form");
        var buyCar = $("#buy_js");
        // regForm.hide();
        regForm.css('display','none');
        // logForm.hide();
        logForm.css('display','none');
        buyCar.css('display','none');



        $( document ).ready(function() {
            $("#js_reg_show").click(
                function(){
                    regForm.toggle();
                    return false; 
                }
            );
        });

        $( document ).ready(function() {
            $("#js_log_show").click(
                function(){
                    logForm.toggle();
                    return false; 
                }
            );
        });
    }
    hideForms();
    

    //CANCEL BUYING
    $( document ).ready(function() {
        $(".btn_cancel").click(
            function(){
                var buyCar = $("#buy_js");
                buyCar.css('display','none');
                return false; 
            }
        );
    });
    
    
    
    function buildOneCar(oneCar)
    {   $oneCar.html(''); //console.log(oneCar[0].id);
        var $id = $('#hiddenId').val( oneCar[0].id);

        var $car1 = $(template_car1);
        $(oneCar).each(function(index, val) {

            $car1.find('.car-list1').text("engine_capacity: "+val.engine_capacity+" L");
            $car1.find('.car-list2').text("color: " + val.color);
            $car1.find('.car-list3').text("model: " + val.model);
            $car1.find('.car-list4').text("max_speed: " + val.max_speed + "km/h");
            $car1.find('.car-list5').text("price: " + val.price + "uan");
            $car1.find('.car-list6').text("year : " + val.year);
            $car1.find('.button1').text('buy ->'+val.model);
            $car1.find('.button1').addClass('buycar');
            $car1.appendTo($oneCar);
        });


        //SHOW FORM BUY CAR 
        $( document ).ready(function() {
            $(".buycar").click(
                function(){
                    var buyCar = $("#buy_js");
                    buyCar.css('display','block');
                    return false; 
                }
            );
        });


   



        
    }



     $('body').on('click', ".button", function() {
        var $this = $(this), 
            id = $this.data('id');
            //alert(id);
            GetDetails(id); 
        })

    function GetDetails(id){
     
        $.ajax({
        // url: '/REST/server/api/carShop/oneCar/'+id+'/',
        url: '/~user15/php/REST/client/api/carShop/oneCar/'+id+'/',
        method: 'GET',
        data: {
            results: 50,
            seed: 'test'
        },
        success: function(data) {

            //console.log(data);
           
            buildOneCar(data);
            
            //sendId();
        },
        error: function(e) {

            console.log('ajax error', e);
        },
        complete: function() {
            console.log('allways runned')
        }
        
        })
    }
    
    $.ajax({
        // url: '/REST/client/api/carShop/allCars/',
                        url: '/~user15/php/REST/client/api/carShop/allCars/',
        method: 'GET',
        data: {
            results: 50,
            seed: 'test'
        },
        success: function(data) {

            console.log(data);
            buildCars(data);
            //sendId();
        },
        error: function(e) {

            console.log('ajax error', e);
        },
        complete: function() {
            console.log('allways runned')
        }
    })

    // REGISTER FUNCTION
    function sendPutAjax(result_form,log_form,url){
        
        $.ajax({
            url:     url, //url страницы 
            type:     "PUT", //метод отправки
            dataType: "html", //формат данных
            data: $("#log_form").serialize(),  // Сеарилизуем объект
            success: function(response) { //Данные отправлены успешно
            //console.log(response);
                result = $.parseJSON(response);
                $('#log_form')[0].reset();//clear form
                console.log(result);
                //result = response;
                // $('#result_form').html('login: '+result.loginstatus);
                    // if (result.loginstatus == 'OK'){
                    //     document.cookie = "uid="+result.email;
                    //     document.cookie = "key="+result.key;
                    //     document.cookie = "name="+result.name;
                    // }else{
                    //     document.cookie = "uid="+result.email;document.cookie = "key=0";
                    //     document.cookie = "name="+'guest';
                    // }
            },
            error: function(response) { // Данные не отправлены
                $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });

}
    
//button for log form
    $("#btn_log").click(
    function(){
        sendPutAjax('result_form', 'log_form', '~user15/php/REST/client/api/carShop/log/');
        // '/REST/client/api/carShop/log/');
    return false; 
    }
    );
    
    
}(jQuery))





$( document ).ready(function() {
    $("#btn_send").click(
        function(){
            sendAjaxForm('result_form', 'ajax_form', 
            // 'http://mysite.local/REST/client/api/carShop/reg'
            '/~user15/php/REST/client/api/carShop/reg'
            );
            return false; 
        }
    );
});




    function sendAjaxForm(result_form, ajax_form, url) {
        
        $.ajax({
            url:     url, //url страницы (action_ajax_form.php)
            type:     "POST", //метод отправки
            dataType: "html", //формат данных
            data: $("#ajax_form").serialize(),  // Сеарилизуем объект
            success: function(response) { //Данные отправлены успешно
                
                result = $.parseJSON(response);//console.log(result);
                $('#ajax_form')[0].reset();//clear form
                // result = response;
                console.log(result);
                if (result.success){
                    $('#result_form').addClass(".alert alert-success regAlert").html(result.success);
                    

                }else{
                    $('#result_form').addClass(".alert alert-danger error regAlert").html(result.error);
                }
                
               
                
            },
            error: function(response) { // Данные не отправлены
                $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });
        
    }






    
    //BUTTON FOR SENDING POST BUY
    $( document ).ready(function() {
        $("#btn_buy").click(

            function(){ 
                sendAjaxBuyForm('result_form', 'buy_form', 
                // 'http://mysite.local/REST/client/api/carShop/buy'
                '/~user15/php/REST/client/api/carShop/buy'
                );
                var $buyCar = $("#buy_js");
                var buy_form = $("#buy_form");
                buy_form.html('');
                $buyCar.css('display','none');
                return false; 
            }
        );
    });
    


         //FUNCTION SEND POST BUY 
         function sendAjaxBuyForm(result_form, buy_form, url) {
        
            $.ajax({
                url:     url, //url страницы (action_ajax_form.php)
                type:     "POST", //метод отправки
                dataType: "html", //формат данных
                data: $("#buy_form").serialize(),// Сеарилизуем объект и добавляю айди кар
                        
                
                success: function(response) { //Данные отправлены успешно
                    
                    result = $.parseJSON(response);//console.log(result);
                    //$('#ajax_form')[0].reset();//clear form
                    // result = response;
                    console.log(result);
                    if (result.success){

                        $('#result_form').addClass(".alert alert-success regAlert").html(result.success);
    
                    }else{
                        $('#result_form').addClass(".alert alert-danger error regAlert").html(result.error);
                    }
    
                },
                error: function(response) { // Данные не отправлены
                    $('#result_form').html('Ошибка. Данные не отправлены.');
                }
            });
            
        }

       
        $( document ).ready(function() {
            $("#btn_find_byparams").click(
                
                 function(){ //alert(5);

                    findByParams('result_form', 'find_params_js', '/~user15/php/REST/client/api/carShop/findCarByParams');// 'http://mysite.local/REST/client/api/carShop/findCarByParams'
                
                //     var $buyCar = $("#buy_js");
                //     var buy_form = $("#buy_form");
                //     buy_form.html('');
                //     $buyCar.css('display','none');
                     return false; 
                }
            );
        });

        function findByParams(result_form, find_params_js, url){
            $.ajax({
                url:     url, //url страницы (action_ajax_form.php)
                type:     "POST", //метод отправки
                dataType: "html", //формат данных
                data: $("#find_params_js").serialize(),// Сеарилизуем объект и добавляю айди кар
                        
                
                success: function(response) { //Данные отправлены успешно
                    
                    result = $.parseJSON(response);//console.log(result);
                    //$('#ajax_form')[0].reset();//clear form
                    // result = response;
                    console.log(result);
                    if (result.success){
                        $('#result_form').addClass(".alert alert-success regAlert").html(result.success);
    
                    }else{
                        $('#result_form').addClass(".alert alert-danger error regAlert").html(result.error);
                    }
                    if (result.length > 0){
                        buildOneCar(result);
                    }else{
                        return false;
                    }
    
                },
                error: function(response) { // Данные не отправлены
                    $('#result_form').html('Ошибка. Данные не отправлены.');
                }
            });
        }