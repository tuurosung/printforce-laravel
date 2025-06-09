<h4 class="mb-5">Payment History</h4>

                <table class="table table-sm datatables">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>ID</th>
                            <th>Account</th>
                            <th class="text-end">Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                            $total = 0;
                        @endphp

                        @foreach ($customer->payments as $payment)

                            <tr>
                                <td><?php    echo $i++; ?></td>
                                <td>{{ $payment->payment_date ?? $payment->created_at }}</td>
                                <td> {{ $payment->timestamp ?? $payment->created_at }} </td>
                                <td>{{ $payment->payment_id }}</td>
                                <td>{{ $payment->payment_account_name }}</td>
                                <td class="text-end">{{ number_format($payment->amount_paid, 2) }}</td>
                                <td class="text-end">

                                    <div class="dropdown">
                                        <a class="" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-receipt me-3  text-primary"></i>
                                                Reciept
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-pen me-3  text-primary"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-trash-alt me-3  text-danger"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>

                            @php
                                $total += (float) $payment->amount_paid;
                            @endphp


                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-end Axiforma fs-18px fw-600">
                                {{ number_format($customer->payments->sum('amount_paid'), 2) }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
