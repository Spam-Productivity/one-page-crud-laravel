<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', [
            'customers' => Customer::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $old_data_count = Customer::count();
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required|max:100',
            'telpon' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required|email:dns|unique:customers',
            'username' => 'required|unique:customers',
        ]);

        Customer::create($validatedData);

        $data_count = Customer::count();

        if ($data_count > $old_data_count) {
            return redirect()->route('index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('index')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('index', [
            'customer' => $customer,
            'customers' => Customer::latest()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required|max:100',
            'telpon' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required|email:dns',
            'username' => 'required',
        ]);

        $customer->update($validatedData);

        return redirect()->route('index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
