<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CustomerDebt;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    /**
     * Debt data validation.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __validation($request)
    {
        $message = config('validation_message');

        $request->validate([
            'nominal'    => 'required|numeric|min:100',
            'keterangan' => 'nullable',
            'tanggal'    => 'required|date',
        ], $message);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        return view('backend.debt.add_form', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        $this->__validation($request);

        $debt = new CustomerDebt([
            'user_id'     => Auth::id(),
            'nominal'     => $request->nominal,
            'description' => $request->keterangan,
            'date'        => date('Y-m-d', strtotime($request->tanggal)),
        ]);

        $customer->debts()->save($debt);

        return redirect($request->redirect);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerDebt  $customerDebt
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerDebt $customerDebt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerDebt  $customerDebt
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerDebt $debt)
    {
        $debt->date = date('d F Y', strtotime($debt->date));

        return view('backend.debt.edit_form', compact('debt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerDebt  $customerDebt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerDebt $debt)
    {
        $this->__validation($request);

        $debt->nominal     = $request->nominal;
        $debt->description = $request->keterangan;
        $debt->date        = date('Y-m-d', strtotime($request->tanggal));

        $debt->save();

        return redirect()->route('customer.show', $debt->customer_id);
    }

    /**
     * Change debt status.
     *
     * @param  \App\Models\CustomerDebt  $customerDebt
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(CustomerDebt $customerDebt)
    {
        $status = ($customerDebt->status == 0) ? 1 : 0;

        $customerDebt->status = $status;
        $customerDebt->save();

        return redirect()->route('customer.show', $customerDebt->customer_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerDebt  $customerDebt
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerDebt $customerDebt)
    {
        $customerID = $customerDebt->customer_id;
        $customerDebt->delete();

        return redirect()->route('customer.show', $customerID);
    }
}
