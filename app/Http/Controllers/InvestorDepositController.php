<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestorDepositController extends Controller
{
    public function index()
    {
        // Admin sees all deposits, Investor sees only their own
        $query = Deposit::query()->orderBy('created_at', 'desc');

        if (Auth::user()->role !== 'admin') {
            $query->where('user_id', Auth::id());
        }

        $deposits = $query->get();
        return view('investor.deposits.index', compact('deposits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|max:50',
            'document' => 'nullable|mimes:pdf,doc,docx,xlsx,xls|max:2048',
            'remarks' => 'nullable|string|max:500'
        ]);

        if (Auth::user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Accesso negato. Solo gli amministratori possono creare depositi.'], 403);
        }

        $path = null;
        if ($request->hasFile('document')) {
            $path = $request->file('document')->store('deposits', 'public');
        }

        $deposit = Deposit::create([
            'user_id' => $request->user_id,
            'reference_no' => 'DEP-' . strtoupper(uniqid()),
            'amount' => $request->amount,
            'currency' => 'GBP',
            'payment_method' => $request->payment_method,
            'status' => 'approved',
            'remarks' => $request->remarks,
            'document_path' => $path,
        ]);

        return response()->json(['success' => true, 'message' => 'Deposito creato con successo!', 'deposit' => $deposit]);
    }

    public function update(Request $request, Deposit $deposit)
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Accesso negato. Solo gli amministratori possono modificare depositi.'], 403);
        }

        $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|max:50',
            'remarks' => 'nullable|string|max:500',
            'document' => 'nullable|mimes:pdf,doc,docx,xlsx,xls|max:2048'
        ]);

        $path = $deposit->document_path;
        if ($request->hasFile('document')) {
            $path = $request->file('document')->store('deposits', 'public');
        }

        $deposit->update([
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'remarks' => $request->remarks,
            'document_path' => $path,
        ]);

        return response()->json(['success' => true, 'message' => 'Deposito aggiornato con successo!']);
    }

    public function destroy(Deposit $deposit)
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Accesso negato. Solo gli amministratori possono eliminare depositi.'], 403);
        }

        $deposit->delete(); // soft delete
        return response()->json(['success' => true, 'message' => 'Deposito eliminato (soft delete) con successo!']);
    }

    public function restore($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $deposit = Deposit::withTrashed()->findOrFail($id);
        $deposit->restore();

        return response()->json(['success' => true, 'message' => 'Deposito ripristinato con successo!']);
    }

    public function trashed()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $deposits = Deposit::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        return view('investor.deposits.trashed', compact('deposits'));
    }

            public function forceDelete($id)
        {
            if (!Auth::user()->isAdmin()) abort(403);

            $deposit = Deposit::onlyTrashed()->findOrFail($id);
            $deposit->forceDelete();

            return response()->json(['success' => true, 'message' => 'Deposito eliminato definitivamente!']);
        }

}
