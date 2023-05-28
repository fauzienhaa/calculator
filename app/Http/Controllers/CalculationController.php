<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation;

class CalculationController extends Controller
{
    public function index()
    {
        $calculations = Calculation::latest()->take(10)->orderBy('id','desc')->get();
        $riwayat = Calculation::latest('id')->first();
        return view('welcome', compact('calculations', 'riwayat'));
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'operand1' => 'required',
            'operator' => 'required',
            'operand2' => 'required',
        ]);

        $operand1 = $request->input('operand1');
        $operator = $request->input('operator');
        $operand2 = $request->input('operand2');
        $result = $this->performCalculation($operand1, $operator, $operand2);

        Calculation::create([
            'operand1' => $operand1,
            'operator' => $operator,
            'operand2' => $operand2,
            'result' => $result,
        ]);

        return redirect()->back();
    }

    public function history($result)
    {
        $riwayat = Calculation::orderBy('created_at', 'desc')->get();
        return view('welcome', [ 
            'result' => $result,
            'calculations' => $riwayat
        ]);
    }

    private function performCalculation($operand1, $operator, $operand2)
    {
        switch ($operator) {
            case '+':
                return $operand1 + $operand2;
            case '-':
                return $operand1 - $operand2;
            case '*':
                return $operand1 * $operand2;
            case '/':
                return $operand1 / $operand2;
            default:
                return null;
        }
    }
}
