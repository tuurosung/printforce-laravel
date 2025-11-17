export const AssignJobHandler = {

    elements: {},

    init: function() {
        this.cachedElements();
        this.bindEvents();
    },



    cachedElements: function() {
        this.elements = {
            $document: $(document),
            $modalHolder: $('#modal_holder'),
            $modal: null,
            $form: null,
        }
    },



    bindEvents: function() {

    },


    async showModal(url, callback) {
        try {

            const response = await $.get(url);
            this.elements.$modalHolder.html(response);

            // call newly cached modal and form elements
            this.elements.$modal = $('#assignJobModal');
            this.elements.$form = $('#assignJobFrm');

            this.elements.$modal.modal('show');
            this.bindFormSubmit(callback);

        } catch (error) {
            console.error('Error fetching assign job modal:', error);
            bootbox.alert('Failed to load the assignment form. Please try again.');
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
                console.error('Error assigning job:', error);
                const message = error.responseJSON?.message ||
                    'An error occurred while assigning the job. Please try again.';
                bootbox.alert(message);
            }
        })
    },



    hideModal() {
        if (this.elements.$modal) {
            this.elements.$modal.modal('hide');
        }
    }
}

$(document).ready(() => AssignJobHandler.init());
