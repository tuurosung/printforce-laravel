import { InitializeDataTables } from '../../initializeDataTables.js';

export const GetLargeFormatJobsData = {

    config: {
        URL: window.routes.getLargeFormatJobs
    },


   init: function() {
         this.cachedElements();
         this.getData();
   },

   elements: {},

   cachedElements: function(){
         this.elements = {
             $document: $(document),
         }
   },


   async getData() {
       try {

           const response = await $.get(this.config.URL);
           $('#data_holder').html(response);
           InitializeDataTables.init();

       } catch (error) {

           console.error('Error refreshing data table:', error);

       }
   }


}

$(document).ready(() => GetLargeFormatJobsData.init());
window.GetLargeFormatJobsData = GetLargeFormatJobsData;
