<x-app-layout>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto p-8 bg-white rounded-lg shadow-sm">
            <p>New Registration</p><br>
            <a class="font-medium bg-gray-900 text-gray-50 hover:bg-gray-800 rounded px-4 py-2" href="/register">Register New Pet</a>

            <span class="block my-6 font-medium">-- OR --</span>

            <span class="block font-medium">Find Existing Pet</span>
            <form class="flex flex-col md:flex-row space-y-4 space-x-0 md:space-y-0 md:space-x-4 mt-2" method="POST" action="/find">
                @csrf
                <input class="w-full md:w-1/2 text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="find" id="find" placeholder="Registration No." size="10" required>
                <input type="submit" class="font-medium bg-gray-900 text-gray-50 hover:bg-gray-800 rounded px-4 py-2 w-full md:w-auto" value="Find">
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="pt-12">
            <div class="max-w-7xl mx-auto p-8 bg-white rounded-lg shadow-sm font-bold text-green-700">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('failure'))
        <div class="pt-12">
            <div class="max-w-7xl mx-auto p-8 bg-white rounded-lg shadow-sm font-bold text-red-700">
                {{ session('failure') }}
            </div>
        </div>
    @endif
</x-app-layout>
