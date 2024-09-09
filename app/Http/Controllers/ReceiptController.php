<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReceiptController extends Controller
{
    public function index(): View {
        $receipts = Receipt::paginate(10);
        return view('adminLevel.receipts.index',compact('receipts'));
     }

    public function create(): View {
        return view('adminLevel.receipts.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'date' => 'required',
        ]);

        Receipt::create([
            'date' => $request->date,
        ]);
        return redirect()->route('admin.receipts.index');
    }

    public function show(string $id): View {
        $receipt = Receipt::findOrFail($id);
        return view('adminLevel.receipts.show', compact('receipt'));
    }

    public function edit(string $id): View {
        $receipt = Receipt::findOrFail($id);
        return view('adminLevel.receipts.edit', compact('receipt'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'date' => 'required',
        ]);

        $receipt = Receipt::findOrFail($id);
        $receipt->update([
            'date' => $request->date,
        ]);
        return redirect()->route('admin.receipts.index');
    }

    public function destroy($id): RedirectResponse {
        $receipt = Receipt::findOrFail($id);
        $receipt->delete();
        return redirect()->route('admin.receipts.index');
    }
}
