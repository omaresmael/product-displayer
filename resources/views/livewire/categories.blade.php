
<div class="h-screen w-48 text-sm font-medium text-gray-900 bg-white rounded-r-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    <div class="text-white text-center font-medium mb-2 text-xl ">Categories</div>
    @foreach($categories as $category)
        <div class="mb-5">

            <p wire:click="getProducts({{$category['id']}},{{$category['parent_id']}})" class="py-2 px-4 w-full font-medium text-left text-white bg-blue-700 rounded-t-lg border-b border-gray-200 cursor-pointer focus:outline-none dark:bg-gray-800 dark:border-gray-600">{{$category['name']}}</p>
            <div class="ml-5">
                @foreach($category['sub_categories'] as $subCategory)
                    <p wire:click="getProducts({{$subCategory['id']}},{{$subCategory['parent_id']}})" class="mt-3 py-2 px-4 w-full font-medium text-left text-white bg-blue-700 rounded-t-lg border-b border-gray-200 cursor-pointer focus:outline-none dark:bg-gray-800 dark:border-gray-600">{{$subCategory['name']}}</p>
                @endforeach
            </div>

        </div>
    @endforeach
</div>
