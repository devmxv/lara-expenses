<?php

namespace App\Http\Controllers;

use App\Category;
use App\Expense;
use App\Http\Requests\CreateExpenseRequest;
use App\Payment;
use App\User;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expenses.index')->with('expenses', Expense::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create')->with('expenses', Expense::all())->with('categories', Category::all())->with('payments', Payment::all())->with('users', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExpenseRequest $request, Expense $expense)
    {
        //dd($request);
        $is_divided = $request->is_divided == 'true' ? 1 : 0;

        $expense = Expense::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'payment_id' => $request->payment_id,
            'isDivided' => $is_divided,
            'purchase_date' => $request->purchase_date,
            'category_id' => $request->category_id
        ]);

        session()->flash('success', 'Gasto registrado correctamente!');

        return redirect(route('expenses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
