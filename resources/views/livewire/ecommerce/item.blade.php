<tr>
	<td>
		<img class="img-fluid img-40" src="{{ $product_avatar }}" alt="#">
	</td>
	<td>
		<div class="product-name">
			<a href="#">{{ $product_name }}</a>
		</div>
	</td>
	<td>₱{{ number_format($product_price, 2, '.', ',') }}</td>
	<td>
		<div class="input-group">
			<input class="form-control text-center" type="number" wire:model="quantity">
		</div>
	</td>
	<td>
		<i class="fa fa-times-circle" wire:click="delete_cart"></i>
	</td>
	<td>₱{{ number_format($total, 2, '.', ',') }}</td>
</tr>