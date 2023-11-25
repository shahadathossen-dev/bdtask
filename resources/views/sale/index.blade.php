@extends('layouts.app')

@section('content')
    <div
        class="max-w-6xl mx-auto w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex-1">
        <h2 class="text-lg font-medium text-left text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 p-4"
            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">Sales</h2>

        @if (Session::has('message'))
            <p class="text-gray-500 p-4 {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 p-4">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Product</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                    <th scope="col" class="px-6 py-3">Quantity</th>
                    <th scope="col" class="px-6 py-3">Total</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($sales->count())
                    @foreach ($sales as $sale)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $sale->id }}
                            </th>
                            <td scope="col" class="px-6 py-3">{{ $sale->joining_date }}</td>
                            <td scope="col" class="px-6 py-3">{{ $sale->name }}</td>
                            <td scope="col" class="px-6 py-3">{{ $sale->price }}</td>
                            <td scope="col" class="px-6 py-3">{{ $sale->quantity }}</td>
                            <td scope="col" class="px-6 py-3 flex">
                                <a href="{{ url("sale/$sale->id/edit") }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto p-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                                &nbsp;
                                <form action="{{ url("sale/$sale->id") }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto p-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" colspan="7"
                            class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            No data to show
                        </th>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $sales->links() }}
    </div>
@endsection
