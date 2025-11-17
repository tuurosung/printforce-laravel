import { GetServiceCost } from "../../print-services/GetServiceCost";
import { CalculateEmbroideryJobTotal } from "./CalculateEmroideryJobTotal";
import { GetEmbroideryJobsData } from "./GetEmbroideryJobsData";
import { AssignJobHandler } from "../HandleAssignJob";
import { UpdateJobStatus } from "../UpdateJobstatus";

const HandleEmbroideryJobs = {

    config: {
        filterUrl: window.routes.filterEmbroideryJobs
    },

    'elements': {},

    init: function() {
        this.cachedElements();
        this.bindEvents();
    },


    cachedElements: function() {
        this.elements = {
            $document: $(document),
            $modalHolder: $('#modal_holder'),
            $jobsFilterFrm: $('#filter_jobs_frm'),
            $editJobModal: '',
            $editJobForm: '',
            $deleteJobForm: '',
            $serviceId: ''
        }
    },


    bindEvents: function() {
        this.elements.$document.on('click', '.table tbody .update-jobstatus-button', this.handleUpdateJobStatusClick.bind(this));
        this.elements.$document.on('click', '.table tbody .assign-job-button', this.handleAssignJobClick.bind(this));
        this.elements.$document.on('click', '.table tbody .edit-button', this.handleEditBtnClick.bind(this));
        this.elements.$document.on('click', '.table tbody .delete-button', this.handleDeleteBtnClick.bind(this));
        this.elements.$jobsFilterFrm.on('submit', this.handleFilterSubmit.bind(this));
    },


    handleUpdateJobStatusClick: function (event) {
        event.preventDefault();

        UpdateJobStatus.showModal(
            $(event.currentTarget).data('fetch-url'),
            (response) => {
                GetEmbroideryJobsData.getData();
            }
        )
    },


    handleAssignJobClick: function (event) {
        event.preventDefault();

        AssignJobHandler.showModal(
            $(event.currentTarget).data('url'),
            (response) => { GetEmbroideryJobsData.getData(); }
        )
    },


    /**
     * Handles the click event for the edit button in the table.
     * Prevents the default event behavior and instead sends a GET request to the server
     * with the edit job URL. If the request is successful, it shows the edit job modal with the response HTML.
     * If the request fails, it shows an error message to the user.
     * @param {jQuery.Event} event - the click event triggered by the edit button
     */
    async handleEditBtnClick(event) {
        event.preventDefault();

        try {

            const $editUrl = $(event.currentTarget).data('url');
            const response = await $.get($editUrl);

            this.showEditModal(response);

        } catch (error) {
            console.error('Error fetching edit job modal:', error);
            bootbox.alert('Failed to load the edit job form. Please try again.');
        }
    },


    /**
     * Handles the click event for the delete button in the table.
     * Shows an alert message when triggered.
     */
    handleDeleteBtnClick: function (event) {
        event.preventDefault();

        this.elements.$deleteJobForm = $(event.currentTarget).closest('form');

        bootbox.confirm("Are you sure you want to delete this job?", (answer) => {
            if (answer) {
                this.elements.$deleteJobForm.submit();
            }
        });
    },


    async handleFilterSubmit(event) {

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

    /**
     * Shows the edit job modal with the given response HTML
     * Also binds the input fields in the edit job modal to recalculate the total cost when changed
     * @param {string} response - the HTML response from the server for the edit job modal
     */
    showEditModal: function(response) {

        this.elements.$modalHolder.html(response);

        this.elements.$editJobModal = $('#editEmbroideryJobModal');
        this.elements.$editJobModal.modal('show');

        const parent = this.elements.$editJobModal;
        CalculateEmbroideryJobTotal.handleInputChange(parent);

        this.elements.$serviceId = parent.find('[name="service_id"]').on('change', this.handleServiceChange.bind(this));

    },


    /**
     * Handles the change event for the service dropdown in the edit job modal.
     * When the service dropdown is changed, this function fetches the cost of the selected service
     * and updates the total cost in the edit job modal.
     * @param {jQuery.Event} event - the change event triggered by the service dropdown
     */
    async handleServiceChange(event) {
        event.preventDefault();

        try {

            const service_cost = await GetServiceCost.getServiceCostWithCustomerId(
                $(event.currentTarget).data('fetch-url'),
                $(event.currentTarget).val(),
                $(event.currentTarget).data('customer_id')
            );

            // update the service cost and total fields in the edit modal
            $('#embroidery_unit_cost').val(service_cost);

            const parent = this.elements.$editJobModal;
            CalculateEmbroideryJobTotal.calculateEmbroideryTotal(parent);

        } catch (error) {
            console.error('Error fetching service cost:', error);
            bootbox.alert('Failed to fetch service cost. Please try again.');
        }
    }

}

$(document).ready(() => HandleEmbroideryJobs.init());
