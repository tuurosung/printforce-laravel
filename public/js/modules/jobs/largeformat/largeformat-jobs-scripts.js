import { GetLargeFormatJobsData } from './GetLargeFormatjobsData.js';
import { CalculateLargeFormatJobTotal } from './CalculateLargeFormatTotal.js';
import { GetServiceCost } from '../../print-services/GetServiceCost.js';
import { AssignJobHandler } from '../HandleAssignJob.js';
import { UpdateJobStatus } from '../UpdateJobstatus.js';

const HandleLargeFormatJobs =  {

    config: {},

    'elements': {},

    init: function() {
        this.cachedElements();
        this.bindEvents();
    },


    cachedElements: function() {
        this.elements = {
            $document: $(document),
            $modalHolder: $('#modal_holder'),
            $serviceId: $('#service_id'),
            $jobsFilterFrm: $('#filter_jobs_frm'),
        }
    },

    bindEvents: function() {

        this.elements.$document.on('click', '.table tbody .edit-button', this.handleEditJobClick.bind(this));
        this.elements.$document.on('click', '.table tbody .delete-button', this.handleDeleteJobClick.bind(this));
        this.elements.$document.on('click', '.table tbody .assign-job-button', this.handleAssignJobClick.bind(this));
        this.elements.$document.on('click', '.table tbody .update-jobstatus-button', this.handleUpdateJobStatusClick.bind(this));
        this.elements.$serviceId.on('change', this.handleServiceChange.bind(this));
        this.elements.$jobsFilterFrm.on('submit', this.handleJobsFilter.bind(this));

        $(document).on('change', '#service_id', this.handleServiceChange.bind(this));

    },


    // Event Handlers ---------------------------------------------------------------------------------------------------


    handleAssignJobClick: function (event) {
        event.preventDefault();

        AssignJobHandler.showModal(
            $(event.currentTarget).data('url'),
            (response) => { GetLargeFormatJobsData.getData(); }
        )

    },


    handleUpdateJobStatusClick: function (event) {
        event.preventDefault();

        UpdateJobStatus.showModal(
            $(event.currentTarget).data('fetch-url'),
            (response) => {
                GetLargeFormatJobsData.getData();
            }
        )
    },



    /**
     * Handles the click event for the edit button in the table.
     * Prevents the default event behavior and instead sends a GET request to the server
     * with the edit job URL. If the request is successful, it shows the edit job modal with the response HTML.
     * If the request fails, it shows an error message to the user.
     * @param {jQuery.Event} event - the click event triggered by the edit button
     */
    async handleEditJobClick(event) {
        event.preventDefault();

        try {

            const $editUrl = $(event.currentTarget).data('url');
            const response = await $.get($editUrl);
            this.showEditModal(response);

        } catch (error) {
            console.error('Error handling edit job click:', error);
        }
    },



    /**
     * Handles the click event for the delete button in the table.
     * Shows a confirmation dialog to the user asking if they are sure they want to delete the job.
     * If the user confirms, it submits the form to delete the job.
     * @param {jQuery.Event} event - the click event triggered by the delete button
     */
    handleDeleteJobClick(event) {
        event.preventDefault();

        const $form = $(event.currentTarget).closest('form');
        bootbox.confirm("Are you sure you want to delete this job?", function (answer) {
            if (answer) {
                $form.submit();
            }
        });
    },



    /**
     * Handles the change event for the service dropdown in the edit job modal.
     * When the service dropdown is changed, this function fetches the cost of the selected service
     * and updates the total cost in the edit job modal.
     * @param {jQuery.Event} event - the change event triggered by the service dropdown
     */
    async handleServiceChange(event) {

        try {

            // pass the customer id along with service id to get the correct service cost
            var service_cost = await GetServiceCost.getServiceCostWithCustomerId(
                $(event.currentTarget).data('fetch-url'),
                $(event.currentTarget).val(),
                $(event.currentTarget).data('customer_id')
            );

            // update the service cost and total fields in the edit modal
            $('#edit_largeformat_cost').val(service_cost);

            const parent = this.elements.$modalHolder;
            CalculateLargeFormatJobTotal.calculateLargeFormatTotal(parent);

        } catch (error) {

            console.error('Error fetching service cost:', error);
            $('#largeformat_cost').val(0);
            $('#edit_largeformat_total').val(0);

        }

    },



    /**
     * Handles the submission of the jobs filter form.
     * Prevents the default form submission behavior and instead sends a POST request to the server
     * with the form data. If the request is successful, it updates the table with the response HTML.
     * If the request fails, it shows an error alert to the user.
     * @param {jQuery.Event} event - the submission event triggered by the form
     */
    async handleJobsFilter(event)
    {
        event.preventDefault();
        const $url = this.elements.$jobsFilterFrm.attr('action');

        try {

            const response = await $.post($url, this.elements.$jobsFilterFrm.serialize());
            $('#data_holder').html(response);

        } catch (error) {

            console.error('Error filtering jobs:', error);
            bootbox.alert('An error occurred while filtering jobs. Please try again.');

        }

    },





    // Methods ----------------------------------------------------------------------------------------------------------


    /**
     * Shows the edit job modal with the given response HTML
     * Also binds the dimensional inputs in the edit job modal to recalculate the total cost when changed
     * @param {string} response - the HTML response from the server for the edit job modal
     */
    showEditModal(response) {

        this.elements.$modalHolder.html(response);
        $('#edit_largeformat_modal').modal('show');

        $('#service_id').on('change', this.handleServiceChange.bind(this));

        const parent = this.elements.$modalHolder;
        CalculateLargeFormatJobTotal.handleDimensionalInputsOnChange(parent);
    },


}

$(document).ready(() => HandleLargeFormatJobs.init());
window.HandleLargeFormatJobs = HandleLargeFormatJobs;
