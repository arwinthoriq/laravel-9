<?php
    
namespace App\Http\Controllers;
    
use App\Models\Product;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Session;
    
class TransaksiController extends Controller
{
    public function create($id)//menampilkan id tempat yg di klik
    {
        try {
            $id = Crypt::decrypt($id);
            $product= Product::findOrFail($id);
            $id_plaintext = $product->id;
            Session::put('id_session', $id_plaintext);
            //$product=Product::where('id', $id)->first();
            return view('transaksi.create',compact('product'));
        } catch (DecryptException $e) {
            return abort(404);
        }
     }

     public function store(Request $request)
     {
         request()->validate([
             'user_id' => '',
             'product_id' => '',
         ]);
         Transaksi::create([
            'user_id' => Auth()->id(),
            'product_id' => Session::get('id_session'),
         //'user_id' => Auth()->id(),
         //'product_id' => Session::get('id_session'),
         ]);
     
       //  Product::create($request->all());
     
         return redirect()->route('home')
                         ->with('success','Product created successfully.');
     }
 


}