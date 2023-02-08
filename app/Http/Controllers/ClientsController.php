<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Models\Client;
use App\Models\User;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->id());
        $clients = $user->clients()->orderBy('updated_at','asc')->get();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            $user = User::find(auth()->id());
            $client = $user->clients()->create($request->client);
            $client->cashLoan()->create([
                'adviser_id' => auth()->id(),
                'loan_amount' => $request->cash_loan_amount
            ]);
            $client->homeLoan()->create([
                'adviser_id' => auth()->id(),
                'property_value' => $request->property_value,
                'down_payment_amount' => $request->down_payment_amount
            ]);
            return redirect()->route('clients.index')->with('success', 'Client created successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        if (!$client || $client->adviser_id != auth()->id()) {
            return redirect()->back();
        }
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $user = User::find(auth()->id());
            $client = $user->clients()->where(['id' => $id])->first();
            $client->update($request->client);
            $client->cashLoan()->update(['loan_amount' => $request->cash_loan_amount]);
            $client->homeLoan()->update(['property_value' => $request->property_value, 'down_payment_amount' => $request->down_payment_amount]);

            return redirect()->route('clients.index')->with('success', 'Client updated');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find(auth()->id());
            $user->clients()->where(['id' => $id])->delete();
            return redirect()->route('clients.index')->with('success', 'Client deleted');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
