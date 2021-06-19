<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\DetailGift;
use App\Models\Gift;
use Exception;

class TransactionController extends Controller
{
    public function point()
    {
        try {    
            $items = Transaction::with('detailtransaction')
                    ->whereHas('detailtransaction', function($q){
                        $q->where('user_id',auth()->user()->id);
                    })
                    ->get();
            $gift = Gift::all();
            $detailgift = DetailGift::where('users_id', auth()->user()->id)->sum('point');
            return ResponseFormatter::success([
                'all' => $items->where('status','success')->count() * 5,
                'gift' => $gift,
                'detailgift' => $detailgift,
            ],'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ],'Load Data Failed', 500);
        }
    }
    public function store(Request $request)
    {
        try {    
            $data = Gift::findOrFail($request->gift_id);
            if($data->point > $request->point){
                return ResponseFormatter::error([
                    'message' => 'Point Anda Tidak Cukup',
                ],'Store Data Failed', 500);
            }

            if($data->qty <= 0){
                return ResponseFormatter::error([
                    'message' => 'Barang Habis',
                ],'Barang Tidak Tersedia', 500);
            }
            $items = DetailGift::create([
                'users_id' => auth()->user()->id,
                'gift_id' => $data->id,
                'point' => $data->point,
            ]);
            $data->decrement('qty',1);

            if($items->point < 0){
                $items->update([
                    'status' => 'failed'
                ]);
            }
            
            return ResponseFormatter::success([
                'gift' => $items,
            ],'Store Data Success');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ],'Store Data Failed', 500);
        }
    }
}
