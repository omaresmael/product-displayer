<div>
    <div id="header">
        <x-header></x-header>
    </div>
    <div id="categories">
        @livewire('categories')
    </div>
    <div id="products">
        @forelse($products as $product)
            <ul>
                <li>{{$product['name']}}</li>
                <ul>
                    <li>name: {{$product['category']['name']}}</li>
                    <li>price: {{$product['price']}}</li>
                    <li><button wire:click="getDescription({{$product['id']}})">Show Description</button></li>
                    @if(key_exists('description', $product))
                    <li>Desc: {{$product['description']}}</li>
                    @endif


                </ul>
            </ul>
        @empty
            <p>There is no products</p>
        @endforelse
    </div>
</div>
