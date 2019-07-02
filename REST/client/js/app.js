(function($){
    var $cars = $('#cars');
    var $oneCar= $('#oneCar');
    var $carParam = $('#cars_params');
    var template_car = $('#template_car').text();
    var template_car1 = $('#template_car1').text();
    var template_car_byParams = $('#template_car_byParams').text();
    var $logOut = $('#btn_logout');
    var $buy_car = $('.button1');
    var $car1 = $(template_car1);

    //GET USER FROM LOCAL STORAGE
    var user = localStorage.getItem('name');
                if (localStorage.getItem('name')){
                    $('#user').text('hello: '+user);
                    $logOut.css('display','inline');
                    $('.form').css('display','none');
                    $('#js_log_show').css('display','none');
                }else{
                    $logOut.css('display','none');
                    // $('#btn-buy').css('display','none');
                    $('#user').text('You need to register for buying car !');
                }
   
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

//FUNC FOR BUILDING CARS LIST AFTER SEARCHING
    function buildCarsByParams(cars) {
        $carParam.html('');//clear form before searching
        $(cars).each(function(index, val) {
            var $car = $(template_car_byParams);
            $car.find('.cars_list_byParams').text(val.id + '.' +' '+ val.brand +' '+ val.model);
            $car.find('.button').text('watch ->'+val.model).data('id', val.id);
            $car.appendTo($carParam);
        });
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
        $(oneCar).each(function(index, val) {
            
            $car1.find('.car-list1').text("engine_capacity: "+val.engine_capacity+" L");
            $car1.find('.car-list2').text("color: " + val.color);
            $car1.find('.car-list3').text("model: " + val.model);
            $car1.find('.car-list4').text("max_speed: " + val.max_speed + "km/h");
            $car1.find('.car-list5').text("price: " + val.price + "uan");
            $car1.find('.car-list6').text("year : " + val.year);

            if (localStorage.getItem('name')){
                $car1.find('.button1').text('buy ->'+val.model);
                 $car1.find('.button1').addClass('buycar');
                console.log('hello');}
                else{
                    console.log('notHelo');
                    $car1.find('.button1').css('display','none');
                }
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


//BUTTON LOG OUT
    $('body').on('click', '#btn_logout', function() {
            localStorage.removeItem('id');
            localStorage.removeItem('name');
            localStorage.removeItem('password');
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


    // LOGIN FUNCTION
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
                if (result.error){
                    $('#result_form').addClass(".alert alert-danger error regAlert").html(result.error);
                }else{
                    localStorage.setItem('id', result[0].id);// add user to storage
                    localStorage.setItem('name', result[0].name);
                    localStorage.setItem('password', result[0].password);
                }
                
                if (user.password){
                    $('#btn_logout').css('display','inline');
                    $('.form').css('display','none');
                    $('#js_log_show').css('display','none');
                   
                }else{
                    $('#user').text('you have to log in !');
                }
                

                // показать имя  
                // кнопки покупки (показать)
                // кнопки выйти (показать)
                // спрятать регистрации и логин

                // при выходе:
                // спрятать кнопки выйти 
                // спрятать кнопки покупка
                // показать регистрации и логин

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
    
//BUTTON LOGIN
    $("#btn_log").click(
    function(){
        sendPutAjax('result_form', 'log_form', 
        'api/carShop/log/');
        // '/REST/client/api/carShop/log/');
    return false; 
    }
    );
    



    $( document ).ready(function() {
        $("#btn_find_byparams").click(
            
             function(){ //alert(5);

                findByParams('result_form', 'find_params_js', 
                '/~user15/php/REST/client/api/carShop/findCarByParams'
            //    'http://mysite.local/REST/client/api/carShop/findCarByParams'
             );
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
                    buildCarsByParams(result);
                }else{
                    return false;
                }

            },
            error: function(response) { // Данные не отправлены
                $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });
    }
    
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



//REGISTER FUNC
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

       
       