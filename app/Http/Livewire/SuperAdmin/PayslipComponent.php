<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\User;

class PayslipComponent extends Component
{
    public $employee_id;

    public function mount($id)
    {
        $this->employee_id = $id;
    }

    public function generateCsv($user)
{
    $headers = [
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=payslip.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    ];

    $callback = function() use ($user) {
        $handle = fopen('php://output', 'w');

        // Defining the headers
        fputcsv($handle, ["Description", "Amount"]);

        $grossIncome = $user->salary + $user->bonus;
        $deductions = $user->nssf + $user->nhif;
        $taxablePay = $grossIncome - $deductions;

        $firstTax = 24000 * 0.10;
        $nextTax = min($taxablePay, 8333) * 0.25;
        $aboveTax = max($taxablePay - 32333, 0) * 0.30;

        $totalTax = $firstTax + $nextTax + $aboveTax;
        $personalRelief = 2400;
        $netTax = $totalTax - $personalRelief;
        $netincome = $grossIncome - $netTax - $deductions;

        // Define the data rows
        $data = [
            ["Salary", $user->salary],
            ["Bonuses", $user->bonus],
            ["Gross Income from Employment", $grossIncome],
            ["NHIF", $user->nhif],
            ["NSSF", $user->nssf],
            ["Taxable Pay", $taxablePay],
            ["First Tax", $firstTax],
            ["Next Tax", $nextTax],
            ["Above Tax", $aboveTax],
            ["Tax Payable", $netTax],
            ["Salary Payable", $netincome]
        ];


        // Writing the data to the CSV
        foreach ($data as $row) {
            fputcsv($handle, $row);
        }

        fclose($handle);
    };

    return response()->stream($callback, 200, $headers);
}

public function downloadPayslip()
{
    $user = User::find($this->employee_id);
    return $this->generateCsv($user);
}


    

    public function render()
    {
        $user = USer::where('id',$this->employee_id)->first();

        return view('livewire.super-admin.payslip-component',['user'=>$user]);
    }
}
