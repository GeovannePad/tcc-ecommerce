<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Doomus\Product;
use Doomus\Order;
use Doomus\Historic;

class AdminController extends Controller
{
    public function index(){
        $qtdPedidosMes_chart[] = ['Mês', 'Quantidade de pedidos', 'Esperado'];
        for($i = 1; $i <= 6; $i++){
            $qtdPedidosMes_chart[] = [$i, rand(20, 70), rand(10,100)];
        }

        $qtdPedidosStatus_chart[] = ['Pedidos e status', 'Quantidade de pedidos'];
        $qtdPedidosStatus_chart[] = ['Aprovados', 220];
        $qtdPedidosStatus_chart[] = ['Em andamento', 60];
        $qtdPedidosStatus_chart[] = ['Recusados', 120];

        $arrayqtdMes = $qtdPedidosMes_chart;
        $arrayqtdStatus = $qtdPedidosStatus_chart;

        return view('admin.index')->with('qtdPedidosStatus', json_encode($arrayqtdStatus))->with('qtdPedidosMes', json_encode($arrayqtdMes));
    }

    public function products(){
        $products = Product::all();

        $array[] = ['ID Produto', 'Nome', 'Quantidade', 'Valor', 'Categoria'];

        foreach($products as $data){
            $array[] = [$data->id, $data->name, $data->qtd_last, $data->price, $data->category->name];
        }

        return view('admin.products')->with('products', json_encode($array));    
    }

    // Aplicar desconto a um determinado produto
    public function ofertaProduto($product_id, $desconto){
        $product = Product::find($product_id);
        $product->price = $product->price - ($product->price * $desconto);
        $product->save();
        return back();
    }

    // Aplicar desconto a toda uma categoria
    public function ofertaCategoria($categoria_id, $desconto){
        $products = Product::where('category_id', $categoria_id);

        foreach($products as $product){
            $product->price = $product->price - ($product->price * $desconto);
            $product->save();
        }
        return back();
    }

    public function orders(){
        $orders = Order::all();

        $array[] = ['ID Pedido', 'Produto', 'Usuário', 'Status', 'Método de Pagamento'];

        foreach($orders as $order){
            $array[] = [$order->id, $order->product->id, $order->user->id, true, $order->payment_method->name];
        }
        
        return view('admin.orders')->with('orders', json_encode($array));
    }
}
