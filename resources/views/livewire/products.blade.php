<div class="bg-slate-200">
    <div id="header" class="w-full bg-white mb-5">
        <x-header></x-header>
    </div>
    <div class="flex space-x-10">
        <div id="categories">
            @livewire('categories')
        </div>
        <div id="products" class="grid grid-cols-3 gap-4 grow">
            @forelse($products as $product)
                <div class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$product['name']}}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Price: {{$product['price']}}</p>
                    <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Category: {{$product['category']['name']}}</p>
                    <p wire:click="getDescription({{$product['id']}})" class="cursor-pointer inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Show Description
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </p>

                    @if(key_exists('description', $product))
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Desc: {{$product['description']}}</p>
                    @endif
                </div>
            @empty
                <p class="text-3xl font-bold underline">
                    There are now products :(
                </p>
            @endforelse
        </div>
    </div>
{{--    <div class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">--}}
{{--        <a href="#">--}}
{{--            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>--}}
{{--        </a>--}}
{{--        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>--}}
{{--        <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">--}}
{{--            Read more--}}
{{--            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
{{--        </a>--}}
{{--    </div>--}}
</div>
