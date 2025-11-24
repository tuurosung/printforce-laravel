import { InitializeDataTables } from "../../initializeDataTables";


export const GetEmbroideryJobsData = {

    config: {
        URL: window.routes.getEmbroideryJobs
    },

    elements: {},

    init: function() {
        this.cachedElements();
        this.getData();
    },

    cachedElements: function() {
        this.elements = {
            $dataHolder: $('#data_holder'),
        }
    },

    async getData() {

        try {

            const response = await $.get(this.config.URL);
            this.elements.$dataHolder.html(response);
            InitializeDataTables.init();

        } catch (error) {
            console.error('Error refreshing data table:', error);
        }

    }

}

$(document).ready(() => GetEmbroideryJobsData.init());
