<div class="-mt-[520px] p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="h-fit">
            <div class="container mx-auto mt-10 p-5 bg-white shadow rounded-md">

                <h2 class="text-2xl font-semibold mb-4">Rates Effective - 01.01.2021</h2>

                <table class="min-w-full border">
                        <tr>
                            <td class="border px-4 py-2">
                                Salary
                            </td>
                            <td class="border px-4 py-2 text-right"> {{$user->salary}}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">
                                Bonuses
                            </td>
                            <td class="border px-4 py-2 text-right">{{$user->bonus}}</td>
                        </tr>
                @php
                    $grossIncome = $user->salary + $user->bonus;
                    $deductions = 15000 + 5000;
                    $taxablePay = $grossIncome - $deductions;

                    $firstTax = 24000 * 0.10;
                    $nextTax = min($taxablePay, 8333) * 0.25;
                    $aboveTax = max($taxablePay - 32333, 0) * 0.30;

                    $totalTax = $firstTax + $nextTax + $aboveTax;
                    $personalRelief = 2400;
                    $netTax = $totalTax - $personalRelief;
                @endphp

                    <!-- Then, in your table -->
                    <tr>
                            <td class="border px-4 py-2">Gross Income from Employment</td>
                            <td class="border px-4 py-2 text-right">{{$grossIncome}}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Taxable Pay</td>
                        <td class="border px-4 py-2 text-right">{{ $taxablePay }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">First</td>
                        <td class="border px-4 py-2 text-right">{{ $firstTax }}</td>
                    </tr>
                    ...
                    <tr>
                        <td class="border px-4 py-2 font-semibold">Tax Payable</td>
                        <td class="border px-4 py-2 text-right font-semibold">{{ $netTax }}</td>
                    </tr>

                    <tbody>
                        <!-- Salary -->
                        <!-- <tr>
                            <td class="border px-4 py-2">
                                Salary
                            </td>
                            <td class="border px-4 py-2 text-right"> {{$user->salary}}</td>
                        </tr> -->

                        <!-- Bonuses -->
                        <tr>
                            <td class="border px-4 py-2">
                                Bonuses
                            </td>
                            <td class="border px-4 py-2 text-right">115,000</td>
                        </tr>
                        <!-- Gross Income from Employment -->
                        <tr>
                            <td class="border px-4 py-2">Gross Income from Employment</td>
                            <td class="border px-4 py-2 text-right">115,000</td>
                        </tr>
                        
                        <!-- Less allowable Deductions -->
                        <tr>
                            <td class="border px-4 py-2">Less allowable Deductions</td>
                            <td class="border px-4 py-2 text-right"></td>
                        </tr>

                        <!-- Mortgage Interest -->
                        <tr>
                            <td class="border px-4 py-2">Mortgage Interest</td>
                            <td class="border px-4 py-2 text-right">15,000</td>
                        </tr>

                        <!-- Pension Contribution by Employee -->
                        <tr>
                            <td class="border px-4 py-2">NSSF</td>
                            <td class="border px-4 py-2 text-right">5,000</td>
                        </tr>

                        <!-- Taxable Pay -->
                        <tr>
                            <td class="border px-4 py-2">Taxable Pay</td>
                            <td class="border px-4 py-2 text-right">95,000</td>
                        </tr>

                        <!-- Tax calculations -->
                        <tr>
                            <td class="border px-4 py-2">First</td>
                            <td class="border px-4 py-2 text-right">24,000*10% = 2,400</td>
                        </tr>

                        <tr>
                            <td class="border px-4 py-2">Next</td>
                            <td class="border px-4 py-2 text-right">8,333*25% = 2,083.25</td>
                        </tr>

                        <tr>
                            <td class="border px-4 py-2">Above</td>
                            <td class="border px-4 py-2 text-right">(95,000-32,333) 62,667*30% = 18,800</td>
                        </tr>

                        <tr>
                            <td class="border px-4 py-2">Total tax</td>
                            <td class="border px-4 py-2 text-right">23,283.25</td>
                        </tr>

                        <!-- Deductions -->
                        <tr>
                            <td class="border px-4 py-2">Less Monthly Personal Relief</td>
                            <td class="border px-4 py-2 text-right">2,400</td>
                        </tr>

                        <tr>
                            <td class="border px-4 py-2">Insurance Relief</td>
                            <td class="border px-4 py-2 text-right">0</td>
                        </tr>

                        <!-- Tax Payable -->
                        <tr>
                            <td class="border px-4 py-2 font-semibold">Tax Payable</td>
                            <td class="border px-4 py-2 text-right font-semibold">20,883.25</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
