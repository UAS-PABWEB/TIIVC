<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Customer data validation.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __validation($request)
    {
        $message = config('validation_message');
        $request->validate([
            'foto_pelanggan'   => 'nullable|image',
            'nama_pelanggan'   => 'required|string',
            'nomor_hp'         => 'nullable|numeric|digits_between:11,15',
            'email_pelanggan'  => 'nullable|email',
            'alamat_pelanggan' => 'nullable|string',
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customer.add_customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->__validation($request);

        if ($request->foto_pelanggan) {
            $path = $request->file('foto_pelanggan')->store('public/user_customer');
        } else {
            $path = null;
        }

        $customer = new Customer([
            'image'   => $path,
            'name'    => ucfirst($request->nama_pelanggan),
            'phone'   => $request->nomor_hp,
            'email'   => $request->email_pelanggan,
            'address' => $request->alamat_pelanggan,
        ]);

        Auth::user()->customers()->save($customer);

        return redirect()->route('customer.show', $customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customerDebts = $customer->debts()->orderByDesc('date')->get();
        $modalTitle = 'Hapus Utang';
        $modalText = 'Yakin hapus utang ini?';

        return view('backend.customer.profile', compact('customer', 'customerDebts', 'modalTitle', 'modalText'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('backend.customer.edit_customer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->__validation($request);

        if ($request->foto_pelanggan) {
            $path = $request->file('foto_pelanggan')->store('public/user_customer');

            // delete old image
            if (Storage::exists($customer->image)) {
                Storage::delete($customer->image);
            }
        } else {
            $path = (Storage::exists($customer->image)) ? $customer->image : null;
        }

        $customer->image   = $path;
        $customer->name    = ucfirst($request->nama_pelanggan);
        $customer->phone   = $request->nomor_hp;
        $customer->email   = $request->email_pelanggan;
        $customer->address = $request->alamat_pelanggan;

        Auth::user()->customers()->save($customer);

        return redirect($request->redirect);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if (count($customer->debts) > 0) {
            $customer->debts()->delete();
        }

        if ($customer->image) {
            Storage::delete($customer->image);
        }

        $customer->delete();

        return redirect()->route('backend.index');
    }
}
