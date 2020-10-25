@extends('layouts.app')

@section('content')

<div class="container mx-auto flex items-center">
    <div class="text-center font-extrabold px-10 py-10 min-w-full">Shopping Cart</div>
</div>

<div class="container mx-auto flex justify-center">
    <form action="{{ route('item.store') }}" method="POST" class="w-full max-w-sm">
        @csrf
        <div class="flex items-center border-b border-teal-500 py-2">
        <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Enter item" name="name">
        <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
            Add to cart
        </button>
        <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
            Cancel
        </button>
        </div>
    </form>
</div>

    
    <div class="container mx-auto py-10 flex justify-around ">

        <div class="container">
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="w-1/2 px-4 py-2">Cart</th>
                        <th class="w-1/4 px-4 py-2"></th>
                        <th class="w-1/4 px-4 py-2"></th>
                    </tr>
                </thead>
                @foreach ($items as $item)
                <tbody>

                    <tr>
                        @if(!$item->isPurchased())
                        <td class="border px-4 py-2">{{ $item->name }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('item.update', $item->id) }}" method="POST">
                                @csrf 
                                @method('PATCH')
                                <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                                    Purchase
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    
                </tbody>
                @endforeach
            </table>
        </div>


        <div class="container flex justify-center">
                
            <table class="table-auto">
                <thead>
                    <tr>

                        <th class="w-1/2 px-4 py-2">Items Purchased</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    @if($item->isPurchased())
                    <tr>
                        <td class="border px-4 py-2 line-through">{{ $item->name }}</td>
                        
                        <td class="border px-4 py-2">
                            <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded">
                                    Discard
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
    
    @stop
    