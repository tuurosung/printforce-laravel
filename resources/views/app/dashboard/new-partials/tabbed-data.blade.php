@if (auth()->user()->access_level === 'administrator')

    <div class="lg:col-span-8 mg:col-span-12 sm:col-span-12 col-span-12">
        <div class="card overflow-hidden h-full overflow-y-auto">
            <div class="card-body">

                <div class="flex overflow-y-auto">
                    <div
                        class="flex bg-gray-100 hover:bg-gray-200 rounded-md transition p-1 dark:bg-gray-700 dark:hover:bg-gray-600">
                        <nav class="flex space-x-2 " aria-label="Tabs" role="tablist">

                            <x-tabs.tab-item id="summary-tab" label="Monthly Summary" icon="paper-plane"
                                dataHsTab="summary-content" :ariaSelected="true" />
                            <x-tabs.tab-item id="customer-ranking-tab" label="Customer Ranking" icon="briefcase"
                                dataHsTab="customer-ranking-content" :ariaSelected="false" />
                            <x-tabs.tab-item id="analytics-tab" label="Analytics" icon="file-invoice-dollar"
                                dataHsTab="analytics-content" :ariaSelected="false" />
                            <x-tabs.tab-item label="Recent Payments" icon="sack-dollar" dataHsTab="payments-content"
                                :ariaSelected="false" />

                        </nav>
                    </div>
                </div>

                <div class="mt-3">
                    <div id="summary-content" role="tabpanel" aria-labelledby="summary-tab" class="pt-5">

                    </div>
                    <div id="customer-ranking-content" role="tabpanel" aria-labelledby="customer-ranking-tab"
                        class="hidden pt-5">
                        @include('app.dashboard.partials.customer_ranking')
                    </div>
                    <div id="analytics-content" role="tabpanel" aria-labelledby="analytics-tab" class="hidden pt-5">
                        @include('app.dashboard.partials.analytics')
                    </div>
                </div>

            </div>
        </div>
    </div>

@endif
