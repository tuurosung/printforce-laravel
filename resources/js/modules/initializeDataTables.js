export const InitializeDataTables = {

    init: function() {
        this.cachedElements();
        this.initializeTables();
    },

    elements: {},

    cachedElements: function() {
        this.elements = {
            $dataTables: $('.datatables'),
        };
    },


    initializeTables: function() {

        this.elements.$dataTables.each(function() {
            $(this).DataTable();
        });

    },
}


$(document).ready(() =>{
    InitializeDataTables.init()
});

window.InitializeDataTables = InitializeDataTables;
