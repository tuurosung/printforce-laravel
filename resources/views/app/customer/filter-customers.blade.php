<table class="table table-sm datatable">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Type</th>
                        <th>Phone Number</th>
                        <th class="text-end">Jobs</th>
                        <th class="text-end">Paid</th>
                        <th class="text-end">Balance</th>
                        <th class="text-end">Option</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $i = 1;
                    $total_jobs = 0;
                    $total_payments = 0;
                    $total_balance = 0;
                    @endphp

                    @foreach ($customers as $customer)

                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td class="text-capitalize" style="text-decoration: underline;">
                            <a href="{{ route('customer-info', $customer) }}">

                                {{ strtolower($customer->name) }}

                            </a>
                        </td>
                        <td>{{ $customer->customer_category_description }}</td>
                        <td><?php echo $customer['phone']; ?></td>
                        <td class="text-end">
                            <?php echo number_format($customer->customer_debit, 2); ?>
                        </td>
                        <td class="text-end"><?php echo number_format($customer->customer_credit, 2); ?></td>
                        <td class="text-end"><?php echo number_format($customer->customer_balance, 2); ?></td>
                        <td class="text-end">
                            <a
                                href="/edit-customer/{{ $customer->customer_id }}"
                                class="text-primary me-3">
                                <i class="fas fa-pen me-3 text-primary "></i>
                                Edit
                            </a>

                            <?php //if ($user->isAdmin()) :
                            ?>

                            <a
                                href="#"
                                class="text-danger delete"
                                data-url="customer-controller/delete-customer.php?sn=<?php echo $customer['sn']; ?>">
                                <i class="fas fa-trash-alt text-danger" aria-hidden="true"></i>
                                Delete
                            </a>

                            <?php //endif;
                            ?>

                        </td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
