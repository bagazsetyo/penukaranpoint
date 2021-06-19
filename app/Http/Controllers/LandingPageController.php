<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailTransaction;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::paginate(20);
        return view('pages.landingpage')->with([
            'items' => $items
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function addto($id)
    {
        $items = Product::where('slug',$id)->firstOrFail();
        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $items->id
        ]);

        return back();
    }
    public function cart()
    {
        $items = Cart::where('user_id',auth()->user()->id)
                ->withSum('product','price')
                ->with('product')
                ->where('detail_transaction_id','0')
                ->get();

        return view('pages.cart')->with([
            'items' => $items
        ]);
    }
    public function deletecart($id)
    {
        $items = Cart::findOrFail($id);
        $items->delete();

        return back();
    }
    public function transaction()
    {
        $price = Cart::where('user_id',auth()->user()->id)
                ->withSum('product','price')
                ->where('detail_transaction_id','0')
                ->get();
        $items = Transaction::create([
            'uuid' => uniqid(),
            'price' => $price->sum('product_sum_price'),
        ]);
        $detail = DetailTransaction::create([
            'transaction_id' => $items->id,
            'user_id' => auth()->user()->id
        ]);

        foreach($price as $p){
            $p->update([
                'detail_transaction_id' => $detail->id
            ]);
        }

        return redirect()->route('/');
    }
}
