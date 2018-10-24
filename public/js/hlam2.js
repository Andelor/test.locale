$(document).ready(function () {

    var i = 1;
    var timer;
    var bool_key;

    $('#yes').on('click', function () {
        $('.modal-window').addClass('display-none');
        $('.overlay').addClass('display-none');
        activeIncident();
    });


    var count_item = $('.save > .content-incident').length;
    //console.log(count_item);

    function activeIncident(){

        if(i <= count_item){

            var main_block = $('.content-incident:nth-of-type('+i+') > .content-items > div');
            main_block.css('border','4px solid #FFCD00');
            var min = $('.content-incident:nth-of-type('+i+') > .timer-block > div > .timer > .min');
            var sec = $('.content-incident:nth-of-type('+i+') > .timer-block > div > .timer > .sec');
            var indication = $('.content-incident:nth-of-type('+i+') > .timer-block > div > .progress > div');

            var percentt = Number(min.text()*60) + Number(sec.text());
            bool_key = true;

            $('.content-incident:nth-of-type('+i+') > .timer-block > div > .button-action > div > a').on('click', function(){
                timerDecrement(min, sec, false, percentt, indication, main_block);
                bool_key = false;
                if(sec.text() > 0 || min.text() > 0){

                    main_block.css({
                        'border'     : '4px solid #36b47b',
                        'background' : '#fff'
                    }).removeClass('shake').addClass('pulse');

                    min.css('color','#36b47b');
                    sec.css('color','#36b47b');

                    $('.content-incident:nth-of-type('+i+') > .timer-block > div > .button-action > div > a').text('Выполнено').addClass('disabled').css({
                        'color':'#36B47B',
                        'border':'1px solid #36B47B'
                    });

                }
                i = i + 1;
                var destination = $('.content-incident:nth-of-type('+i+')').offset().top;
                $('html').animate({ scrollTop: destination-100 }, 1100);
                activeIncident();
            });

            timerDecrement(min, sec, bool_key, percentt, indication, main_block);

            return false;
        }

    }

    function timerDecrement(min, sec, bool_key, percentt, indication, main_block){

        var newMin = Number(min.text());
        var newSec = Number(sec.text());
        var result = bool_key;
        var block = main_block;
        const percent = percentt;
        var percent_res = (100 * ((newMin * 60) + newSec)) / percentt;
        //console.log(percent_res);
        var indication = indication;
        indication.attr("aria-valuenow", percent_res).css("width", percent_res+"%");

        if(result)

            timer = setTimeout( function () {
                if(newSec == 0){

                    if(newMin > 0){
                        //console.log('2');
                        newMin = newMin - 1;
                        min.text(newMin);
                        sec.text(59);
                        newSec = sec.text();
                    }

                    if(newMin == 0){
                        block.css({
                            'background':'#fff',
                            'border':'4px solid #FB2527'
                        }).addClass('shake');
                        min.css('color','#FB2527');
                        sec.css('color','#FB2527');
                    }
                } else{

                    newSec = newSec - 1;
                    if(newSec < 10) sec.text("0"+newSec);
                    else sec.text(newSec);

                }

                if((newMin == 0 && newSec > 0) || (newMin > 0)) timerDecrement(min, sec, result, percent, indication, main_block);
                else {
                    //console.log(newSec);
                    //console.log(newMin);
                    result = false;
                    clearTimeout(timer);
                    timerDecrement(min, sec, result, percent, indication, main_block);
                }

            }, 1000);

        else {
            clearTimeout(timer);
            //console.log(result);
            $('.content-incident:nth-of-type('+i+') > .timer-block > div > .button-action > div > a').text('Время вышло').addClass('disabled').css({
                'color':'#fb2527',
                'border':'1px solid #fb2527'
            });

            //console.log(i);
            bool_key = false;

        }

        return bool_key;

    }

});