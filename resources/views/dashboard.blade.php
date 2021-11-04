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

    @if(isset($vaccinesDue))
        <div class="py-12">
            <h1 class="text-gray-900 font-bold text-center underline pb-6">Upcoming Vaccines</h1>
            <div class="max-w-7xl mx-auto p-8 bg-white rounded-lg shadow-sm">
                <table class="block md:table overflow-x-auto whitespace-nowrap w-full rounded-t mx-auto text-gray-800">
                    <thead>
                    <tr class="text-left border-b-2">
                        <th class="px-4 py-3">S. No.</th>
                        <th class="px-4 py-3">Owner</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Pet</th>
                        <th class="px-4 py-3">Vaccine</th>
                        <th class="px-4 py-3">Due Date</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach( $vaccinesDue as $vaccine)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $vaccine['Owner'] }}</td>
                            <td class="px-4 py-3">{{ $vaccine['Phone'] }}</td>
                            <td class="px-4 py-3">{{ $vaccine['Pet'] }}</td>
                            <td class="px-4 py-3">{{ $vaccine['Vaccine'] }}</td>
                            @if ($vaccine['Days'][0] === '-')
                                <td class="px-4 py-3 text-red-700">{{ $vaccine['Days'] }} Days</td>
                            @else <td class="px-4 py-3 text-green-700">{{ $vaccine['Days'] }} Days</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</x-app-layout>
