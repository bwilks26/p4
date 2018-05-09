<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class BillSplitterController extends Controller
{
    public function splitterForm(Request $request)
    {
        return view('forms.splitterForm')->with([
            'splitTerm' => '',
            'billAmount' => '',
            'tipAmount' => '',
            'roundUp' => '',
            'result' => ''
        ]);
    }

    public function splitBill(Request $request)
    {

        Log::info('Testing 123...');
        if ($request->has('splitTerm') && $request->has('billAmount')) {
            $splitTerm = $request->input('splitTerm');
            $billAmount = $request->input('billAmount');
            $tipAmount = $request->input('tipAmount', 0);
            $roundUp = $request->has('roundUp');

            /* do form validation */
            $this->validate($request, [
                'splitTerm' => 'required|numeric',
                'billAmount' => 'required|numeric'
            ]);

            // calculate correct result if form has no errors
            if ($tipAmount) {
                $result = ($billAmount + ($billAmount * ($tipAmount / 100))) / $splitTerm;
            } else {
                $result = $billAmount / $splitTerm;
            }

            // round up by taking the ceiling of number if selected
            if ($roundUp) {
                $result = ceil($result);
            }

            // format result to be more user-friendly
            $result = number_format($result, 2, '.', ',');
        }

        # Return the view, with the form terms *and* results (if any)
        return view('forms.splitterForm')->with([
            'splitTerm' => $splitTerm,
            'billAmount' => $billAmount,
            'tipAmount' => $tipAmount,
            'roundUp' => $roundUp,
            'result' => $result
        ]);
    }

}
