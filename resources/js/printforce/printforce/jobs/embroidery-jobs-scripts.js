// Filter form on submit
$('#filter_jobs_frm').on('submit', function (event) {
    event.preventDefault();

    var url = window.routes.filterEmbroideryJobs;

    $.post(url, $(this).serialize())
        .done(function (data) {
            $('tbody').html('');
            $('tbody').append(data);

            bindEvents();
        })
        .fail(function (data) {
            bootbox.alert(data);
        });
});


