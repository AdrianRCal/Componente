<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Carritos;
use App\Models\Productos;
use Illuminate\Http\Request;
use Hardevine\ShoppingCart\Facades\Cart;

class CartController extends Controller
{

 /*    public function shop()
    {
        $products = Productos::all();
       //dd($products);
        return view('shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function cart()  {
        $cartCollection = Cart::getContent();
        //dd($cartCollection);
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request){
        Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    } */

    public function add(Request$request){

        Carritos::add(array(
            'id' => $request->id,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'imagen' => $request->imagen
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        Carritos::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

  /*   public function clear(){
        Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    } */

}
