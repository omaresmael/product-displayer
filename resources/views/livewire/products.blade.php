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
                    <li>{{$product['category']['name']}}</li>
                    <li>{{$product['price']}}</li>
                </ul>
            </ul>
        @empty
            <p>There is no products</p>
        @endforelse
    </div>
</div>
