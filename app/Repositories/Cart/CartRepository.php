<?php

namespace App\Repositories\Cart;

use App\Models\product;

interface CartRepository
{
public function get();

public function add(product $product,$quantity);

public function update($id ,$quantity);

public function delete($id);

public function empty();

public function total() : float;

}
