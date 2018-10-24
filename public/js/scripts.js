$(document).ready(function () {

    var timer = true;
    var sec; var min; var actionBlock; var indication; var aClick; var destination; var mainBlock;
    //var i = 1;
    var time; var colorStart; var colorStartT; var flag; var keyAction;
    var count_item = $('.save > .content-incident').length;

    function actionIncident(){

        editEl();
        keyActionFunc();

        flag = true;

        if(min.text() != '-' && sec.text() != '-'){
            if(keyAction){

                aClick.on('click', stopTimer);
                if(i <= count_item){

                    time = Number(min.text()*60) + Number(sec.text());
                    if(timer) {
                        //console.log('Таймер начал работу');
                        timerDecrement();
                    }
                    else {
                        //console.log('Таймер завершил работу');
                        if(i < count_item) {

                            endTimer();

                        } else allEnd();

                    }

                }

            }

        }
        else {

            aClick.on('click', longIncident);

            if(i <= count_item) actionTimer();

        }



    } // главная функция, регулирующая выполнение определенного блока

    function timerDecrement(){

        actionTimer();
        timer = setInterval(timerNumb, 1000);

    } // функция запуйска таймера

    function timerNumb(){

        var newSec; var newMin;
        if(sec.text() > 0){

            newSec = sec.text();
            newMin = min.text();
            newMin = Number(newMin);
            newSec = newSec - 1;
            if(newSec < 10) sec.text('0'+newSec);
            else sec.text(newSec);

            if(newMin == 0 && flag) {

                pickOutRed();
                startColor();
                flag = false;

            }

        } else if(min.text() > 0){

            newMin = min.text();
            newMin = newMin - 1;
            min.text(newMin);
            sec.text(59);

            if(!newMin) {

                pickOutRed();
                startColor();
                flag = false;

            }

        } else stopTimer();

        indicateValue();

    } // функция управления таймером

    function stopTimer(){

        clearInterval(timer);
        timer = false;

        if(min.text() != 0 || sec.text() != 0) pickOutGreen();
        else pickOutRedExit();
        // endStep(//время//номер шага);
        stopColor();
        actionIncident();

    } // функция останавливающая таймер

    function editEl() {

        min         = $('.content-incident:nth-of-type('+i+') > .timer-block > div > .timer > .min');
        sec         = $('.content-incident:nth-of-type('+i+') > .timer-block > div > .timer > .sec');
        actionBlock = $('.content-incident:nth-of-type('+i+') > .content-items > div');
        indication  = $('.content-incident:nth-of-type('+i+') > .timer-block > div > .progress > div');
        aClick      = $('.content-incident:nth-of-type('+i+') > .timer-block > div > .button-action > div > a');
        mainBlock   = $('.content-incident:nth-of-type('+i+')');

    } // функция для выбора элементов html

    function pickOutRed(){

        actionBlock.css({
            'background':'#fff',
            'border':'4px solid #ffa145'
        }).addClass('shake');
        min.css('color','#FB2527');
        sec.css('color','#FB2527');
        indication.removeClass('progress-bar-success').addClass('progress-bar-danger');

    } // функция указания стилей если осталось мало времени

    function pickOutRedExit(){

        actionBlock.css({
            'background':'#fff',
            'border':'4px solid #FB2527'
        }).removeClass('shake').addClass('pulse');
        min.css('color','#FB2527');
        sec.css('color','#FB2527');

        $('.content-incident:nth-of-type('+i+') > .timer-block > div > .button-action > div > a').text('Время вышло').addClass('disabled').css({
            'color':'#fb2527',
            'border':'1px solid #fb2527'
        });
    } // функция указания стилей если время истекло

    function pickOutGreen(){

        actionBlock.css({
            'border'     : '4px solid #36b47b',
            'background' : '#fff'
        }).removeClass('shake').addClass('pulse');

        //actionBlock.removeClass('shake').addClass('pulse').addClass('incident-green');

        min.css('color','#36b47b');
        sec.css('color','#36b47b');

        $('.content-incident:nth-of-type('+i+') > .timer-block > div > .button-action > div > a').text('Выполнено').addClass('disabled').css({
            'color':'#36B47B',
            'border':'1px solid #36B47B'
        });

        indication.removeClass('progress-bar-danger').addClass('progress-bar-success');

    } // функция указания стилей если оператор справился вовремя

    function indicateValue(){

        var newSec = Number(sec.text());
        var newMin = Number(min.text());
        var percent_res = (100 * ((newMin * 60) + newSec)) / time;

        indication.attr("aria-valuenow", percent_res).css("width", percent_res+"%");

    } // функция для расчета остаточного % индикатора

    function endTimer(){

        i = i + 1;
        //console.log('i = '+i);
        timer = true;
        destination = $('.content-incident:nth-of-type('+i+')').offset().top;
        $('html').animate({ scrollTop: destination-40 }, 1100);
        actionIncident();

    } // действия когда таймер закончил выполнение

    function actionTimer(){

        actionBlock.css('border','4px solid #ffe616');

    } // функция указания стилей активного блока

    function allEnd(){

        $('html, body').animate({scrollTop: 0},500);
        setTimeout(function() {

            $('#modal-win2').css('display','block');
            $('#overl2').css('display','block');

        }, 400);

        $('#cancel2').on('click', function() {

            $('#modal-win2').css('display','none');
            $('#overl2').css('display','none');

        });

    } // функция отображения модального окна, когда все блоки инструкций выполнены

    function longIncident(){

        pickOutGreen();
        if(i < count_item) endTimer();
        else allEnd();

    } // функция выполнения долгосрочных инцидентов

    function startColor(){

        colorStart = setInterval(function() {

            actionBlock.css({
                'border':'4px solid #ffa145'
            });

            colorStartT = setTimeout(function() {

                actionBlock.css({
                    'border':'4px solid #ffe3bf'
                });

            }, 400);

        }, 800);

    } // функция запуска мигания

    function stopColor(){ // функция, останавливающая мигание

        clearInterval(colorStart);
        clearTimeout(colorStartT);

    }

    function keyActionFunc(){

        if(mainBlock.attr('data-key') == 'green') {

            pickOutGreen();
            endTimer();
            keyAction = false;

        } else if(mainBlock.attr('data-key') == 'red'){

            min.text('0');
            sec.text('00');
            pickOutRedExit();
            redIndicate();
            endTimer();
            keyAction = false;

        } else keyAction = true;

    }

    function redIndicate(){

        indication.attr("aria-valuenow", 0).css("width", "0%");

    }

    actionIncident(); // вызов главной функции

});