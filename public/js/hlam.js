$(document).ready(function() {
    var intervalId = null;
    var nth = 2;
    var flag;
    $('#modal_close').click(close_modal);

    // ОТКРЫТИЕ МОДАЛЬНОГО ОКНА
    $('#overlay').fadeIn(400,
        function(){
            //console.log('kek');
            $('#modal_form')
                .css('display', 'block')
                .animate({opacity: 1, top: '37%'}, 200);
        });

    // ЗАКРЫТИЕ МОДАЛЬНОГО ОКНА
    function close_modal(){

        $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,
                function(){
                    $(this).css('display', 'none');
                    $('#overlay').fadeOut(400);
                    go_work();
                }
            );


    }

    function go_work(){
        console.log(0);
        // РЕАЛИЗАЦИЯ ОБРАТНОГО ОТСЧЕТА
        var parseTime_bv = function(){

            var min = $('.timer-active > .time-val > .min').text();
            var sec = $('.timer-active > .time-val > .sec').text();

            if(sec == 0) {
                if(min != 0){
                    min--;
                    if(min < 1){
                        $('.active-action').addClass('red-action-line');
                        $('.timer-active').addClass('timer-red');
                    }
                    $('.timer-active > .time-val > .min').text(min);
                    sec = 59;
                    $('.timer-active > .time-val > .sec').text(sec);
                }
                else {
                    clearInterval(intervalId);
                    goClick();
                }
            } else{
                if(min == 0){
                    $('.active-action').addClass('red-action-line');
                    $('.timer-active').addClass('timer-red');
                }
                if(sec < 11) {
                    sec--;
                    $('.timer-active > .time-val > .sec').text('0'+sec);
                }
                else {
                    sec--;
                    $('.timer-active > .time-val > .sec').text(sec);
                }
            }


        };
        // ЗАВЕРШАЕМ ВЫПОЛНЕНИЕ ПУНКТА
        $(document).on('click', '.timer-active > .action-exit', goClick);

        function goClick() {
            console.log('lol');
            var min = $('.timer-active > .time-val > .min').text();
            var sec = $('.timer-active > .time-val > .sec').text();
            nth++;
            if((min == 0 && sec > 0) || (min > 0)){
                $('.active-action').removeClass('active-action red-action-line').addClass('executed-action');
                $('.timer-active > .action-exit').removeClass('btn-warning').addClass('btn-success disabled').text('Выполнено');
                $('.timer-active').removeClass('timer-active timer-red').addClass('timer-green');
            } else{
                $('.active-action').addClass('active-action red-action red-action-line').removeClass('executed-action');
                $('.timer-active > .action-exit').addClass('btn-danger disabled').removeClass('btn-success').text('Время вышло');
                $('.timer-active').addClass('timer-red').removeClass('timer-green timer-active');
                intervalId = setInterval(parseTime_bv, 1000);
            }

            $('.result-block:nth-child('+nth+')').removeClass('deactivate-action').addClass('active-action');
            console.log('lol');
            $('.result-block:nth-child('+nth+') > .timer-action').addClass('timer-active');
            $('.result-block:nth-child('+nth+') > .timer-action > a').removeClass('btn-secondary disabled').addClass('btn-warning');
            var destination = $('.result-block:nth-child('+nth+')').offset().top;
            $('html').animate({ scrollTop: destination-100 }, 1100);

        };

        // ВЫЗЫВАЕМ ФУНКЦИЮ ДЛЯ ОБРАТНОГО ОТСЧЕТА
        intervalId = setInterval(parseTime_bv, 1000);
    }
});



