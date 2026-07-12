<div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
<x-cards.colour-card2 title="Monthly Revenue" colour="primary" icon="sack-dollar" :value="$payment_statistics->monthsTotalPayment"
    valueType="currency" />
</div>
<div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
<x-cards.colour-card2 title="Monthly Expenditure" colour="danger" :value="$monthly_expenditure" icon="usd-square"
    valueType="currency" />
</div>
<div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
<x-cards.colour-card2 title="New Customers" colour="success" :value="$countNewCustomers" icon="users"
    valueType="number" />
</div>
<div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
<x-cards.colour-card2 title="Total Jobs" colour="warning" value="0" icon="user-tie" valueType="number" />
</div>
<div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
<x-cards.colour-card2 title="Total Debt" colour="success" icon="hand-holding-dollar" value="0" valueType="currency" />
</div>

