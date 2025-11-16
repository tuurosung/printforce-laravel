export const GetServiceCost = {


    async getCost(url, serviceId) {

        if (!serviceId) return;

        if (!serviceId) return;

        try {

            const response = await $.ajax({
                url: url,
                method: 'GET',
                data: {
                    serviceId: serviceId,
                 },
                dataType: 'json',
            });

            return response.cost;

        } catch (error) {
            console.error('Error fetching service details:', error);
            return 0;
        }
    },


    async getServiceCostWithCustomerId(url, serviceId, customerId) {

        if (!serviceId || !customerId) return null;

        try {
            const response = await $.ajax({
                url: url,
                method: 'GET',
                data: {
                    service_id: serviceId,
                    customer_id: customerId,
                },
                dataType: 'json',
            });

            return response.cost;

        } catch (error) {
            console.error('Error fetching service cost with customer ID:', error);
            return null;
        }
    }
}
