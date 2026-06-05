import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                // core modules
                // 'resources/js/modules/initializeDataTables.js',
                // 'resources/js/modules/initializeDatepickers.js',

                // // jobs - large format
                // 'resources/js/modules/jobs/largeformat/largeformat-jobs-scripts.js',
                // 'resources/js/modules/jobs/largeformat/CalculateLargeFormatTotal.js',
                // 'resources/js/modules/jobs/largeformat/GetLargeFormatjobsData.js',
                // 'resources/js/modules/jobs/embroidery/embroidery-job-scripts.js',

                // // invoices
                // 'resources/js/modules/invoices/print-service-calculator.js'
            ],
            refresh: true,
        }),
    ],

});
