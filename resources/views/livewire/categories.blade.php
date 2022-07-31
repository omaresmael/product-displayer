<div>
    @foreach($categories as $category)
        <ul>

            <li wire:click="getProducts({{$category['id']}},{{$category['parent_id']}})">{{$category['name']}}</li>
            <ul>
                @foreach($category['sub_categories'] as $subCategory)
                    <li wire:click="getProducts({{$subCategory['id']}},{{$subCategory['parent_id']}})">{{$subCategory['name']}}</li>
                @endforeach
            </ul>

        </ul>
    @endforeach
</div>
