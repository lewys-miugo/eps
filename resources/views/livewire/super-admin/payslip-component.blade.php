<div class="-mt-[520px] p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="h-fit">
            <div class="container mx-auto mt-10 p-5 bg-white shadow rounded-md">

                <h2 class="text-2xl font-semibold mb-4">Rates Effective - 01.08.2021</h2>

                <h2 class="text-2xl text-center font-semibold mb-4"> Employee Name: <span><p class="">{{$user->full_name}}</p></span></h2>

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
                    $deductions = $user->nssf + $user->nhif;
                    $taxablePay = $grossIncome - $deductions;

                    $firstTax = 24000 * 0.10;
                    $nextTax = min($taxablePay, 8333) * 0.25;
                    $aboveTax = max($taxablePay - 32333, 0) * 0.30;

                    $totalTax = $firstTax + $nextTax + $aboveTax;
                    $personalRelief = 2400;
                    $netTax = $totalTax - $personalRelief;
                    $netincome = $grossIncome-$netTax-$deductions;
                @endphp

                    <!-- Then, in your table -->
                    <tr>
                            <td class="border px-4 py-2">Gross Income from Employment</td>
                            <td class="border px-4 py-2 text-right">{{$grossIncome}}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">NHIF</td>
                        <td class="border px-4 py-2 text-right">{{ $user->nhif }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">NSSF</td>
                        <td class="border px-4 py-2 text-right">{{ $user->nssf }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Taxable Pay</td>
                        <td class="border px-4 py-2 text-right">{{ $taxablePay }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">First</td>
                        <td class="border px-4 py-2 text-right">{{ $firstTax }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">next tax</td>
                        <td class="border px-4 py-2 text-right">{{ $nextTax }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Above</td>
                        <td class="border px-4 py-2 text-right">{{ $aboveTax }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-semibold">Tax Payable</td>
                        <td class="border px-4 py-2 text-right font-semibold">{{ $netTax }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-semibold">Salary Payable</td>
                        <td class="border px-4 py-2 text-right font-semibold">{{ $netincome }}</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>
