<x-pharmacy-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif 
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg my-2">
                <div class="p-2 lg:p-2 bg-white border-b border-gray-200">
                    <div class="quotation">
                        <a href="#" class="abutton">Hi {{ Auth::user()->name }}</a>
                    </div>
                </div>
            </div>

            @php
                $prescription = app(\App\Http\Controllers\PharmacyController::class)->seeAllPresc();
            @endphp

            @if ($prescription->isEmpty())
                <p>No prescriptions found.</p>
            @else
                @foreach ($prescription as $prescription)
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-2">
                        <div class="p-2 lg:p-2 bg-white border-b border-gray-200">
                            <div class="p-1">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex my-1">
                                        <h4 class="mx-2">{{ $prescription->pname }}</h4>
                                        <h4 class="mx-2">{{ $prescription->pemail }}</h4>
                                        <h4 class="mx-2">{{ $prescription->city }}</h4>
                                    </div>
                                    
                                    <div class="d-flex">
                                        <a href="{{ $prescription->image1 }}" target="blank"><img src="{{ asset('icons/image00.png') }}" alt="Icon"></a>
                                        <a href="{{ $prescription->image2 }}" target="blank"><img src="{{ asset('icons/image01.png') }}" alt="Icon" class="mx-1"></a>
                                        <a href="{{ $prescription->image3 }}" target="blank"><img src="{{ asset('icons/image02.png') }}" alt="Icon" class="mx-1"></a>
                                        <a href="{{ $prescription->image4 }}" target="blank"><img src="{{ asset('icons/image03.png') }}" alt="Icon" class="mx-1"></a>
                                        <a href="{{ $prescription->image5 }}" target="blank"><img src="{{ asset('icons/image04.png') }}" alt="Icon"></a>
                                    </div>

                                    <div class="d-flex">
                                        <a href="{{ route('prescription.edit', $prescription->id) }}" class="rounded bg-primary text-white p-1 mx-1">Add Quotation</a>
                                        <form action="{{ route('prescription.destroy', $prescription->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded bg-secondary px-2 py-1 pb-[5px] pt-[6px] text-white mx-1">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <div>
                                    <p class="mx-2">{{ $prescription->pnote }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-pharmacy-layout>