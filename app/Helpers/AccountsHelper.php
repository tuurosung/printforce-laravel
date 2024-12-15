<?php


class AccountsHelper {

    public static $accountTypes = [

        1 => 'Assets',
        2 => 'Equity',
        3 => 'Liabilities',
        4 => 'Income',
        5 => 'Expenses'
    ];


    public static $accountHeaders = [
        1 => [
            'current' => [
                1 => 'Cash & Bank',
                2 => 'Money In Transit',
                3 => 'Expected Payments',
                4 => 'Inventory',
                7 => 'Vendor Prepayment'
            ],
            'fixed' => [
                5 => 'Property, Plant, Equipment',
                6 => 'Depreciation & Amortization'
            ]
        ],
        2 => [
            '' => [
                17 => 'Retained Earnings',
                18 => "Owner's Capital"
            ]
        ],
        3 => [
            'current' => [
                10 => 'Expected Payments To Vendors',
                11 => 'Prepayment & Deferred Accounts',
                12 => 'Other Current Liabilities'
            ],
            'fixed' => [
                8 => 'Credit Card',
                9 => 'Loans',
                13 => 'Other Fixed Liabilities'
            ]
        ],
        4 => [
            'current' => [
                14 => 'Income',
                15 => 'Discount',
                16 => 'Other Income',
                24 => 'Previous Balances'
            ]
        ],
        5 => [
            '' => [
                19 => 'Operating Expenses',
                20 => 'Cost Of Goods Sold',
                21 => 'Payment Processing Fees',
                22 => 'Payroll Expenses',
                23 => 'Sales Taxes'
            ]
        ]
    ];
}
