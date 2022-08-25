<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();


        return view('user.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
/* cart*/
/*  public function getCart()
  {
      $cart = Cart::where('user_id', auth()->user()->id)->get();
      $sum = 0;
      foreach ($cart as $carts) {
          $project = Project::select('project_price')->where('id', $carts->project_id)->first();
          $price = $project->project_price;
          $sum += $price;
      }
      return view('user.cart', compact('cart', 'sum'));

  }


  public function AddToCart($id)
  {
      $project = Project::findOrFail($id);
      $my_cart = Cart::where('user_id', auth()->user()->id)->first();
      $cart = $my_cart::where('project_id', $project->id)->first();
      if (!isset($cart)) {

          Cart::create([
              'project_id' => $project->id,
              'user_id' => auth()->user()->id
          ]);
      } else {
          return redirect()->back()->with(['failed' => 'You already added it']);
      }
      return redirect()->to(route('cart'));


  }

//    public function ClearAllCart()
//    {
//        $all_cart = Cart::where('user_id', auth()->user()->id)->get();
//        //$all_cart->delete();
//        foreach ($all_cart as $cart) {
//            $cart->delete();
//        }
//        return redirect()->back();
//    }
*/
