<div class="card">
    <div class="card-body p-4 pb-0" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: -24px -24px 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                        style="height: auto; overflow: hidden;">
                        <div class="simplebar-content" style="padding: 24px 24px 0px;">
                            <div class="row flex-nowrap mb-3">
                                <div class="col">

                                    <x-cards.colour-card2 title="Monthly Revenue" colour="primary" icon="sack-dollar"
                                        :value="$monthly_payments" valueType="currency" />

                                </div>
                                <div class="col">

                                    <x-cards.colour-card2 title="Monthly Expenditure" colour="danger"
                                        :value="$monthly_expenditure" icon="usd-square" valueType="currency" />

                                </div>
                                <div class="col">

                                    <x-cards.colour-card2 title="New Customers" colour="success"
                                        :value="$countNewCustomers" icon="users" valueType="number" />

                                </div>
                                <div class="col">

                                    <x-cards.colour-card2 title="Total Jobs" colour="warning" value="0" icon="user-tie"
                                        valueType="number" />

                                </div>
                                <div class="col">

                                    <x-cards.colour-card2 title="Total Debt" colour="success" icon="hand-holding-dollar"
                                        value="0" valueType="currency" />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: 1140px; height: 279px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
        </div>
    </div>
</div>



<div class="row mb-5">

    <div class="col-md-6">

        <div class="card border-0 h-100 rounded-1">
            <div class="card-body">
                <h4 class="h5 mb-0">Income Graph</h4>

                <div>
                    <div class="chart mb-2">
                        <canvas id="revenue_chart" class="w-100" height="250"
                            style="display: block; box-sizing: border-box; height: 190px; width: 479px;"
                            width="479"></canvas>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <div class="col-md-6">

        <div class="card border-0 h-100 rounded-1">
            <div class="card-body">
                <h4 class="h5 mb-0">Expenses Graph</h4>
            </div>
        </div>

    </div>
</div>
