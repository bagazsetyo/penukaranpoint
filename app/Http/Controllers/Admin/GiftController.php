<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gift::paginate(10);
        return view('pages.admin.gift.index')->with([
            'items' => $items, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.gift.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:gifts,name',
            'point' => 'required|integer',
            'qty' => 'required|integer',
            'image' => 'required',
        ]);

        $data = $request->only('name','point','qty');
        if($file = $request->file('image')){
            $data['image'] = $file->hashName();
            $file->move('image',$data['image']);
        }        
        Gift::create($data);

        return redirect(route('admin.gift.index'));
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
        $items = Gift::findOrFail($id);

        return view('pages.admin.gift.edit')->with([
            'items' => $items
        ]);
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
        
        $request->validate([
            'name' => 'required|unique:gifts,name,' . $id,
            'point' => 'required|integer',
            'qty' => 'required|integer',
        ]);

        $data = $request->only('name','point','qty');
        if($file = $request->file('image')){
            $data['image'] = $file->hashName();
            $file->move('image',$data['image']);
        }        
        $items = Gift::find($id);
        $items->update($data);

        return redirect(route('admin.gift.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $items = Gift::findOrFail($id)->delete();
        return back();
    }
}
