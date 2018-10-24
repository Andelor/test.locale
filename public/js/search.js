$(document).ready(function(){
    $.ajaxSetup({ cache: false });
    $('#search').keyup(function(){
        $('#result').html('');
        $('#state').val('');
        var searchField = $('#search').val();
        var expression = new RegExp(searchField, "i");

        $.getJSON('../data.json', function(data) {
            $.each(data, function(key, value){
                if (value.description.search(expression) != -1 && searchField.length != 0)
                {
                    $('#result').addClass('bounceInLeft');
                    $('#result').append('<li class="list-group-item link-class"><img src="img/book.svg" width="15" alt="Icon"/><span class="text-muted">'+value.description+' </span></li>');
                } else $('#result').removeClass('bounceInLeft');
            });
        });

    });
    $('#result').on('click', 'li', function() {
        var click_text = $(this).text().split('|');
        $('#search').val($.trim(click_text[0]));
        $("#result").html('');
    });
});