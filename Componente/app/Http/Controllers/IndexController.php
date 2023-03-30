<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Models\Carrito;
use App\Models\Carritos;
use Hardevine\ShoppingCart\Facades\Cart;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends Controller
{


    function index()
    {
        //Ver todas las frutas
        $objetos = Productos::all();

        return view('welcome', ['objetos' => $objetos]); //--> views/vista1.blade.php
    }

    function dashboard()
    {
        //Ver todas las frutas
        $objetos = Productos::all();
        return view('dashboard', ['objetos' => $objetos]); //--> views/vista1.blade.php
    }

    public function modify(Request $r)
    {
        $objeto = Productos::find($r->id);
        return view("modifyProduct", ['objeto' => $objeto]);
    }

    public function delete(Request $r)
    {
        $objetos = Productos::find($r->id);
        $objetos->delete();
        return redirect('/dashboard');
    }

    function insertar(Request $r)
    {
        $objeto = new Productos;

        $objeto->nombre = $r->nombre;
        $objeto->precio = $r->precio;

        $imagen = $r->imagen->store('objetos', 'public');

        $objeto->imagen = 'storage/' . $imagen; //ruta imgaen

        $objeto->save();

        return redirect('/dashboard');
        // $fruites=Fruta::all();
        // return view('vista1',['fruites'=>$fruites]);

    }

    public function update(Request $r)
    {
        $objeto = Productos::find($r->id);

        $objeto->nombre = $r->nombre;
        $logo = $r->imagen->store('objetos', 'public');
        $objeto->imagen = 'storage/' . $logo;
        $objeto->precio = $r->precio;
        $objeto->save();
        return redirect('/dashboard');
    }

    public function comprar(Request $r)
    {


        /*         $objeto= new Productos;

		$objeto->nombre=$r->nombre;
		$objeto->precio=$r->precio;
 */

        $objeto = Productos::find($r->id);
        $carrito = new Carritos;

        $carrito->NombreP = $objeto->nombre;
        $carrito->Precio = $objeto->precio;
        $carrito->idUsuario = Auth::id();
        $carrito->imagen = $objeto->imagen; //ruta imgaen

        $carrito->save();

        $carritos = Carritos::all()->where($carrito->idUsuario == $r->id);

        return redirect("/");

        /*  return view("shop", ['objeto' => $carritos]); */

        /* return redirect()->route('/comprar')->with('objeto', $carrito); */

        /*
        return redirect('/comprar', ['objeto' => $carrito]);*/
    }


    function comprarShow()
    {

        $carrito = Carritos::all();
        $objetos = Productos::all();

        /*  $carritos = Carritos::all()->where($carrito->idUsuario == Auth::id()); */
        return view("shop", ['objeto' => $carrito]);
    }

    function comprarDelete()
    {

/*         $objetos = Productos::find($r->id);
        $objetos->delete();
        return redirect('/dashboard'); */

        Carritos::where('idUsuario',  Auth::id())->delete();

        /* 
        $carritos = Carritos::all()->where('idUsuario' == Auth::id()); */


        return redirect('/');


    }

    public function exportToExcel()
    {
        $products = Productos::all();

        return Excel::download(new ProductExport($products), 'products.xlsx');
        
         

    }


    function borrarShow(Request $r)
    {

/*         $objetos = Productos::find($r->id);
        $objetos->delete();
        return redirect('/dashboard'); */

        Carritos::where('idCarrito',  $r->id)->delete();


        return redirect('/shop');
        /* 
        $carritos = Carritos::all()->where('idUsuario' == Auth::id()); */




    }


    /*  public function show()
    {
        $objetos = objeto::all();
        $categories = Category::all();
        return view("showobjetos", ['objetos' => $objetos, 'categories' => $categories]);
    } */
}
