export const UpdateJobStatus = {

    elements: {},

    init: function () {
        this.cachedElements();
        this.bindEvents();
    },

    cachedElements: function () {
        this.elements = {
            $document: $(document),
            $modalHolder: $('#modal_holder'),
            $modal: null,
            $form: null,
        }
    },


    bindEvents: function () {

    },

    async showModal(url, callback) {
        try {

            const response = await $.get(url);
            this.elements.$modalHolder.html(response);

            // call newly cached modal and form elements
            this.elements.$modal = $('#updateJobStatusModal');
            this.elements.$form = $('#updateJobStatusFrm');

            this.elements.$modal.modal('show');
            this.bindFormSubmit(callback);

        } catch (error) {
            console.error('Error fetching update job status modal:', error);
            bootbox.alert('Failed to load the update status form. Please try again.');
        }
    },


    bindFormSubmit(callback) {

        this.elements.$form.off('submit').on('submit', async (event) => {
            event.preventDefault();

            try {
                const response = await $.post(
                    this.elements.$form.attr('action'),
                    this.elements.$form.serialize()
                );

                if (response.status === 'success') {
                    this.hideModal();
                    if (callback && typeof callback === 'function') {
                        callback(response);
                    }
                }
            } catch (error) {
                console.error('Error updating job status:', error);
                bootbox.alert('Failed to update the job status. Please try again.');
            }
        });

    },

    hideModal() {
        if (this.elements.$modal) {
            this.elements.$modal.modal('hide');
        }
    }

}

$(document).ready(() => UpdateJobStatus.init());
