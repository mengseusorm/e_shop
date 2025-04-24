<?php

namespace App\Http\Controllers;

use App\Models\AddToCart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function addToCart( $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1,
                "id" => $product->id,
                "image" => $product->image,
                "description" => $product->description,
                "category" => $product->category,
                "created_at" => $product->created_at,
                "updated_at" => $product->updated_at,
                "status" => $product->status,
            ];
        }
        
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('frontend_e_shop.cart.index', compact('cart'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed!');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('frontend_e_shop.cart.checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $cart = session()->get('cart');

        if (!$cart || count($cart) == 0) {
            return redirect()->back()->with('error', 'Cart is empty');
        }

        $order = Order::create([
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'total' => array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)),
            'status' => 'pending', // Default status
            'reason' => $request->input('reason', 'No reason provided') // Optional reason
        ]);

        foreach ($cart as $item) {
            $order = OrderItem::create([
                'order_id' => $order->id,    
                'product_id' =>  $item['id'], 
                'quantity' => $item['quantity'] , 
                'price' => $item['price'],
                'total_price' => $item['price'] * $item['quantity'],
            ]);
        }

        session()->forget('cart'); // clear cart after order is placed
        
        return redirect()->route('frontend.cart.index')->with('success', 'Order placed successfully!');
    }

}
