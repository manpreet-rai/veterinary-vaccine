<x-app-layout>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto p-8 bg-white rounded-lg shadow-sm font-bold text-red-700">
            <form id="filledVaccineTemplate" method="POST" action="/edit">
                @csrf
                <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-2">
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="vaccine_name" id="vaccine_name" title="Vaccine Name" value="{{ $vaccine->vaccine_name }}" placeholder="Vaccine Name" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="vaccine_label" id="vaccine_label" title="Vaccine Label" value="{{ $vaccine->vaccine_label }}" placeholder="Vaccine Label" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="vaccinator" id="vaccinator" title="Vaccinator" value="{{ $vaccine->vaccinator }}" placeholder="Vaccinator" required>
                </div>

                <div class="flex flex-col md:flex-row space-y-6 space-x-0 md:space-y-0 md:space-x-6 mt-6">
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="date" name="vaccine_date" id="vaccine_date" title="Vaccine Date" value="{{ $vaccine->vaccine_date }}" placeholder="Vaccine Date" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="date" name="next_due_date" id="next_due_date" title="Next Due Date" value="{{ $vaccine->next_due_date }}" placeholder="Next Due Date" required>
                    <input class="text w-full text-gray-900 py-2 px-4 border-2 border-gray-300 rounded outline-none focus:outline-none focus:border-gray-600" type="text" name="remarks" id="remarks" title="Remarks" value="{{ $vaccine->remarks }}" placeholder="Remarks">
                </div>

                <div class="flex flex-col md:flex-row space-y-2 space-x-0 md:space-y-0 md:space-x-2 mt-6">
                    <input type="submit" id="updateVaccine" class="font-medium bg-green-800 text-gray-50 hover:bg-green-700 rounded px-6 py-2 w-full md:w-auto" value="Update Vaccine Record">
                    <input class="hidden" type="_hidden" name="id" value="{{ $id }}">
                </div>
                <h1 id="mandatoryVaccines" class="hidden text-red-800 font-medium pt-2">Fill all compulsory fields</h1>
            </form>
        </div>
    </div>
</x-app-layout>