<x-app-layout>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto p-8 bg-white rounded-lg shadow-sm">
            <form class="max-w-7xl mx-auto p-8 bg-white rounded-lg shadow-sm" action="/vaccine/{{ $owner->owner_registration }}" method="POST">
                @csrf
                <span class="block font-medium">Owner Details</span>
                <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-2">
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="owner_name" id="owner_name" title="Owner Name" placeholder="Owner Name (Required)" value="{{ $owner->owner_name }}" size="50" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="owner_email" id="owner_email" title="Owner Email" placeholder="Owner Email" value="{{ $owner->owner_email }}"  size="50" required>
                </div>

                <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-6">
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="tel" name="owner_phone1" id="owner_phone1" title="Primary Phone No." placeholder="Primary Phone No. (Required)" value="{{ $owner->owner_phone1 }}"  size="14" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="tel" name="owner_phone2" id="owner_phone2" title="Other Phone No." placeholder="Other Phone No." value="{{ $owner->owner_phone2 }}" required size="14">
                </div>

                <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-6">
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="owner_address" id="owner_address" title="Address" placeholder="Address (Required)" value="{{ $owner->owner_address }}"  size="50" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 bg-gray-100 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="owner_registration" id="owner_registration" title="Registration No." placeholder="Reg. No. (Required)" value="{{ $owner->owner_registration }}"  size="50" disabled required>
                </div>

                <span class="block font-medium mt-6">Pet Details</span>
                <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-2">
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="pet_name" id="pet_name" title="Pet Name" placeholder="Pet Name (Required)" value="{{ $owner->pet_name }}"  size="50" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="pet_breed" id="pet_breed" title="Pet Breed" placeholder="Pet Breed (Required)" value="{{ $owner->pet_breed }}"  size="50" required>
                </div>

                <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-6">
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="pet_gender" id="pet_gender" title="Pet Gender" placeholder="Pet Gender (Required)" value="{{ $owner->pet_gender }}"  size="14" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="pet_colour" id="pet_colour" title="Pet Colour" placeholder="Pet Colour (Required)" value="{{ $owner->pet_colour }}"  size="14" required>
                </div>

                <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-6">
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="pet_breeder_address" id="pet_breeder_address" title="Breeder Address" placeholder="Breeder Address" value="{{ $owner->pet_breeder_address }}" required size="100">
                </div>

                <div class="flex flex-col md:flex-row space-y-2 space-x-0 md:space-y-0 md:space-x-2 mt-6">
                    <input type="submit" id="savePet" class="font-medium bg-gray-800 text-gray-50 hover:bg-gray-700 rounded px-6 py-2 w-full md:w-auto" value="Update">
                    <a type="button" id="delete" class="font-medium bg-red-800 text-gray-50 hover:bg-red-700 rounded px-6 py-2 w-full md:w-auto" href="/vaccine/{{ $owner->owner_registration }}/delete">Delete</a>
                </div>
                <h1 id="mandatory" class="hidden text-red-800 font-medium pt-2">Fill all compulsory fields</h1>
            </form>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto p-8 bg-white rounded-lg shadow-sm">
            <span class="block font-medium mt-6">Vaccines</span>
            <form id="blankVaccineTemplate" method="POST" action="/add-vaccine-record">
                @csrf
                <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-2">
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="vaccine_name" id="vaccine_name" title="Vaccine Name" placeholder="Vaccine Name (Required)" size="20" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="vaccine_label" id="vaccine_label" title="Vaccine Label" placeholder="Vaccine Label (Required)" size="20" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="vaccinator" id="vaccinator" title="Vaccinator" placeholder="Vaccinator (Required)" size="50" required>
                </div>

                <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-6">
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="date" name="vaccine_date" id="vaccine_date" title="Vaccine Date" value="{{ date('Y-m-d') }}" placeholder="Vaccine Date. (Required)" size="14" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="date" name="next_due_date" id="next_due_date" title="Next Due Date" value="{{ date('Y-m-d') }}" placeholder="Next Due Date" size="14" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="remarks" id="remarks" title="Remarks" placeholder="Remarks" size="50" value="Remarks (Optional)" required>
                </div>

                <div class="flex flex-col md:flex-row space-y-2 space-x-0 md:space-y-0 md:space-x-2 mt-6">
                    <input type="submit" id="saveVaccine" class="font-medium bg-green-800 text-gray-50 hover:bg-green-700 rounded px-6 py-2 w-full md:w-auto" value="Add Vaccine Record">
                    <input class="hidden" type="_hidden" name="owner_registration" value="{{ $owner->owner_registration }}">
                </div>
                <h1 id="mandatoryVaccines" class="hidden text-red-800 font-medium pt-2">Fill all compulsory fields</h1>
            </form>
        </div>
    </div>

    <h1 class="text-gray-900 font-bold text-center underline">Vaccination Record</h1>

    @if(isset($vaccines))
        <div class="pt-6 pb-12">
            <div class="max-w-7xl mx-auto p-8 bg-white rounded-lg shadow-sm">
                <table class="block md:table overflow-x-auto whitespace-nowrap w-full rounded-t m-6 mx-auto text-gray-800">
                    <thead>
                    <tr class="text-left border-b-2">
                        <th class="px-4 py-3">S. No.</th>
                        <th class="px-4 py-3">Vaccine</th>
                        <th class="px-4 py-3">Label</th>
                        <th class="px-4 py-3">Vaccinator</th>
                        <th class="px-4 py-3">Vaccine Date</th>
                        <th class="px-4 py-3">Next Due Date</th>
                        <th class="px-4 py-3">Remarks</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach( $vaccines as $vaccine)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $vaccine->vaccine_name }}</td>
                            <td class="px-4 py-3">{{ $vaccine->vaccine_label }}</td>
                            <td class="px-4 py-3">{{ $vaccine->vaccinator }}</td>
                            <td class="px-4 py-3">{{ $vaccine->vaccine_date }}</td>
                            <td class="px-4 py-3">{{ $vaccine->next_due_date }}</td>
                            <td class="px-4 py-3">{{ $vaccine->remarks }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</x-app-layout>
