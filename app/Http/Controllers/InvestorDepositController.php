<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestorDepositController extends Controller
{
    public function index()
    {
        $deposits = Deposit::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('investor.deposits.index', compact('deposits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|max:50',
        ]);

        $deposit = Deposit::create([
            'user_id' => Auth::id(),
            'reference_no' => 'DEP-' . strtoupper(uniqid()),
            'amount' => $request->amount,
            'currency' => 'GBP',
            'payment_method' => $request->payment_method,
            'status' => 'approved',
            'remarks' => $request->remarks,
        ]);

        return response()->json(['success' => true, 'message' => 'Deposito creato con successo!', 'deposit' => $deposit]);
    }

    public function update(Request $request, Deposit $deposit)
    {
        if ($deposit->user_id !== Auth::id()) {
            abort(403);
        }

        $deposit->update([
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'remarks' => $request->remarks,
        ]);

        return response()->json(['success' => true, 'message' => 'Deposito aggiornato con successo!']);
    }

    public function destroy(Deposit $deposit)
    {
        if ($deposit->user_id !== Auth::id()) {
            abort(403);
        }

        $deposit->delete();
        return response()->json(['success' => true, 'message' => 'Deposito eliminato con successo!']);
    }
}
