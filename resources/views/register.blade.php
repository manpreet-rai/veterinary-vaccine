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

    <div class="py-12">
        <form class="max-w-7xl mx-auto p-8 bg-white rounded-lg shadow-sm" action="/register" method="POST">
            @csrf
            <span class="block font-medium">Owner Details</span>
            <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-2">
                <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="owner_name" id="owner_name" title="Owner Name" placeholder="Owner Name (Required)" size="50" required>
                <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="owner_email" id="owner_email" title="Owner Email" placeholder="Owner Email" required size="50">
            </div>

            <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-6">
                <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="tel" name="owner_phone1" id="owner_phone1" title="Primary Phone No." placeholder="Primary Phone No. (Required)" size="14" required>
                <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="tel" name="owner_phone2" id="owner_phone2" title="Other Phone No." placeholder="Other Phone No." value="NA" required size="14">
            </div>

            <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-6">
                <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="owner_address" id="owner_address" title="Address" placeholder="Address (Required)" size="50" required>
                <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="owner_registration" id="owner_registration" title="Registration No." placeholder="Reg. No. (Required)" size="50" required>
            </div>

            <span class="block font-medium mt-6">Pet Details</span>
            <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-2">
                <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="pet_name" id="pet_name" title="Pet Name" placeholder="Pet Name (Required)" size="50" required>
                <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="pet_breed" id="pet_breed" title="Pet Breed" placeholder="Pet Breed (Required)" size="50" required>
            </div>

            <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-6">
                <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="pet_gender" id="pet_gender" title="Pet Gender" placeholder="Pet Gender (Required)" size="14" required>
                <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="pet_colour" id="pet_colour" title="Pet Colour" placeholder="Pet Colour (Required)" size="14" required>
            </div>

            <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-6">
                <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="pet_breeder_address" id="pet_breeder_address" title="Breeder Address" placeholder="Breeder Address" value="Breeder Address (Optional)" required size="100">
            </div>

            <div class="flex flex-col md:flex-row space-y-2 space-x-0 md:space-y-0 md:space-x-2 mt-6">
                <input type="submit" id="savePet" class="font-medium bg-green-800 text-gray-50 hover:bg-green-700 rounded px-6 py-2 w-full md:w-auto" value="Register">
            </div>
            <h1 id="mandatory" class="hidden text-red-800 font-medium pt-2">Fill all compulsory fields</h1>
        </form>
    </div>
</x-app-layout>
