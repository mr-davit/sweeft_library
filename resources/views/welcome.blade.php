<x-layout>

    <!-- Start block -->
    <section class="bg-gray-50 min-h-[100vh] dark:bg-gray-900 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
    {{--search--}}
                    <div class="w-full md:w-1/2">
                        <form  action="{{ route('home') }}" method="GET" class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
    {{--search--}}
                    <x-sort page="home"/>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-4">Book Title</th>
                            <th scope="col" class="px-4 py-3">Author</th>
                            <th scope="col" class="px-4 py-3">Published</th>
                            <th scope="col" class="px-4 py-3">Status</th>

                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)

                        <tr class="border-b dark:border-gray-700">

                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap truncate dark:text-white">
                                    {{$book->title}}
                                </th>
                            <td class="px-4 py-3 max-w-[12rem] text-wrap  ">@foreach($book->authors as $author)
                                    {{ $author->name }},
                                @endforeach</td>
                            <td class="px-4 py-3">{{$book->year}}</td>
                            <td class="px-4 py-3 max-w-[12rem]">{{$book->status}}</td>
                        </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
    <div class="w-5/12 mx-auto mb-24">
        {{$books->links()}}

    </div>
</x-layout>
