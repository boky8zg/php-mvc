function loadPage(page) {
    $.ajax({
        dataType: 'json',
        method: 'POST',
        url: '/ajax/posts',
        data: {
            start: (page - 1) * 6,
            count: 6
        }
    }).done(function (data) {
        var $cols = $('.col-lg-6');

        $cols.each(function () {
            $(this).html('');
        });

        for (var i = 0; i < data.length; i++) {
            $cols.eq(i % 2).append(
                '<h4>{Title}</h4><p>{Text}</p>'.format(data[i])
            );
        }

        $('.col-lg-6').fadeIn();
    });
}

$(function () {
    $.ajax({
        dataType: 'json',
        method: 'POST',
        url: '/ajax/posts/pages',
        data: {
            postsPerPage: 6
        }
    }).done(function (data) {
        for (var i = 0; i < data.pages; i++) {
            $('<li><a href="#" data-page="{0}">{0}</a></li>'.format(i + 1)).insertBefore('.pagination li:last');
        }

        $('.pagination li:nth-child(2)').toggleClass('active', true);
    });

    loadPage(1);

    $('.pagination').on('click', 'a', function (e) {
        $('.col-lg-6').fadeOut();

        loadPage($(this).data('page'));

        $('.pagination li').toggleClass('active', false);
        $('.pagination li:nth-child(' + ($(this).data('page') + 1) + ')').toggleClass('active', true);

        e.preventDefault();
    });
});