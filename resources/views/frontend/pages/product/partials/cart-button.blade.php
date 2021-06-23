<form class="form-inline" action="{{ route('carts.store')}}" method="post">
	@csrf
	<input type="hidden" name="product_id" value="{{$product->id }}">
	<button class="btn btn-warning" type="submit"><i class="fa fa-plus"></i>Add to cart</button>
	
</form>