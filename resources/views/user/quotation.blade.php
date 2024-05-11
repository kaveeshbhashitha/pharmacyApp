<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg my-2">
                <div class="p-2 lg:p-2 bg-white border-b border-gray-200">
                    <div class="quotation">
                        <a href="{{ route('dashboard') }}" class="abutton">Upload Prescription</a>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2 lg:p-2 bg-white border-b border-gray-200">
                    <div class="p-1">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <a href=""><img src="{{ asset('icons/image00.png') }}" alt="Icon"></a>
                                <a href=""><img src="{{ asset('icons/image01.png') }}" alt="Icon" class="mx-1"></a>
                                <a href=""><img src="{{ asset('icons/image02.png') }}" alt="Icon" class="mx-1"></a>
                                <a href=""><img src="{{ asset('icons/image03.png') }}" alt="Icon" class="mx-1"></a>
                                <a href=""><img src="{{ asset('icons/image04.png') }}" alt="Icon"></a>
                            </div>
                            <div class="d-flex my-1">
                                <h4 class="mx-2">Time 01</h4>
                                <h4 class="mx-2">Time 02</h4>
                            </div>
                        </div>
                        <div>
                            <table class="table table-hover my-4 table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Drug name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Amount/1</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Otto</td>
                                        <td>mdo</td>
                                        <td>mdo</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" scope="row" class="text-end">Total</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>