$(document).ready(function () {

    // Filter form on submit
    $('#filter_jobs_frm').on('submit', function (event) {
        event.preventDefault();

        var url = window.routes.filterDesignJobs;

        $.post(url, $(this).serialize())
            .done(function (data) {
                $('#data_holder').html(data);
            })
            .fail(function (data) {
                bootbox.alert(data);
            });
    });


    // viewjobs on click
    $('.table tbody').on('click', '.viewjob', function (event) {
        event.preventDefault();

        var url = $(this).data('url');

        $.get(url, function (response) {

            $('#modal_holder').html(response);
            new bootstrap.Modal(document.getElementById('jobCardModal')).show();

        })
    });


    /**
     * Handle the click event for the edit button
     */

    $(document).on('click', '.table tbody .edit', function (event) {
        event.preventDefault();

        var url = $(this).data('url');

        $.get(url, function (response) {

            $('#modal_holder').html(response);
            $('#edit_design_job_modal').modal('show');

            $('#edit_design_service_id').on('change', function (event) {

                var service_id = $(this).val();
                var service_cost = getServiceCost(service_id);

                service_cost.then(function (cost) {
                    $('#edit_design_cost').val(cost);
                    $('#edit_design_total').val((parseFloat($('#edit_design_copies').val()) * cost).toFixed(2));
                }).catch(function (error) {
                    console.error('Error fetching service cost:', error);
                    $('#edit_design_cost').val(0);
                    $('#edit_design_total').val(0);
                });

                $('#edit_design_copies').focus();
            });

            $("#edit_design_copies").on('keyup', function (event) {

                const copies = parseInt($('#edit_design_copies').val()) || 0;
                const cost = parseFloat($('#edit_design_cost').val()) || 0;

                $('#edit_design_total').val((copies * cost).toFixed(2));
            });

        }).fail(function (error) {

            bootbox.alert("Error loading job details: " + error.responseText);
        });
    })



    // delete job on click
    $(document).on('click', '.table tbody .delete', function (event) {
        var $form = $(this).closest('form');

       bootbox.confirm("Are you sure you want to delete this job?", function (answer) {
            if (answer) {
                $form.submit();
            }
       });

    }); //end click


});
