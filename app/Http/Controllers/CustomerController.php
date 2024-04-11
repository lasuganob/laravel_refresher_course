<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\CustomerForm;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CustomerForm::class, [
            'method' => 'POST',
            'url' => route('customer.store')
        ]);

        return view('customer.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormBuilder $formBuilder, Customer $customer, Request $request)
    {
        $form = $formBuilder->create(CustomerForm::class);

        if(!$form->isValid()) {
            return redirect()->back()->withInput()->withErrors($form->getErrors());
        }

        Customer::create($request->all());
        return redirect()->back()->with('success','Successfully saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5',
        ]);

        $customer = Customer::find($id);
        $customer->update($request->all());

        return redirect()->route('customer.index')->with('success_edit', 'Customer Successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->route('customer.index')->with('success_delete', 'Customer successfully deleted');
    }
}
