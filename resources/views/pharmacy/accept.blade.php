<x-pharmacy-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg my-2">
                <div class="p-2 lg:p-2 bg-white border-b border-gray-200">
                    <div class="quotation">
                        <a href="{{ route('addQuotation') }}" class="abutton">Test</a>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2 lg:p-2 bg-white border-b border-gray-200">
                    <div class="p-1">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex my-1">
                                <h4 class="mx-2">Time 01</h4>
                                <h4 class="mx-2">Time 02</h4>
                            </div>
                            
                            <div class="d-flex">
                                <a href=""><img src="{{ asset('icons/image00.png') }}" alt="Icon"></a>
                                <a href=""><img src="{{ asset('icons/image01.png') }}" alt="Icon" class="mx-1"></a>
                                <a href=""><img src="{{ asset('icons/image02.png') }}" alt="Icon" class="mx-1"></a>
                                <a href=""><img src="{{ asset('icons/image03.png') }}" alt="Icon" class="mx-1"></a>
                                <a href=""><img src="{{ asset('icons/image04.png') }}" alt="Icon"></a>
                            </div>

                            <div class="d-flex">
                                <a href="" class="rounded bg-primary text-white p-1 mx-1">Deliver</a>
                                <a href="" class="rounded bg-danger text-white p-1">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-pharmacy-layout>