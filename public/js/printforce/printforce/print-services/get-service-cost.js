/**
 * Retrieves the cost of a specific service by making an asynchronous API call.
 *
 * @async
 * @function getServiceCost
 * @param {string|number} serviceId - The unique identifier of the service to get the cost for
 * @returns {Promise<number>} A promise that resolves to the cost of the service
 * @throws {Error} Throws an error if the API request fails or if there's a network issue
 *
 * @example
 * try {
 *   const cost = await getServiceCost(123);
 *   console.log(`Service cost: $${cost}`);
 * } catch (error) {
 *   console.error('Failed to get service cost:', error);
 * }
 */
async function getServiceCost(serviceId) {
    try {
        // define the url to get the service cost
        const url = window.routes.getServiceCost.replace(':serviceId', serviceId);

        const response = await $.get(url);
        return response.cost;

    } catch (error) {
        console.error('Error fetching service cost:', error);
        throw error;
    }
}
