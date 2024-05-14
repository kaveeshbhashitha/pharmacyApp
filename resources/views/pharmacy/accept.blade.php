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

            @if ($quotation->isEmpty())
                <p>No quotation found.</p>
            @else
                @foreach ($quotation as $quotation)
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-2">
                        <div class="p-2 lg:p-2 bg-white border-b border-gray-200">
                            <div class="p-1">
                                <div class="d-flex p-2"><h4>Accepted at: </h4><h4 class="text-success"> {{$quotation->updated_at}}</h4></div>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <p class="mx-2 boldtext">Name</p>
                                            <h4 class="mx-2">{{ $quotation->pname }}</h4>
                                            <p class="mx-2 boldtext">Email</p>
                                            <h4 class="mx-2">{{ $quotation->pemail }}</h4>
                                        </div>
                                        
                                        <div class="mx-3 direction">
                                            <p class="boldtext">Drug data</p>
                                            @php
                                                $descriptions = explode('|', $quotation->description);
                                            @endphp
                                            @foreach ($descriptions as $description)
                                                <h4 class="my-1">{{ $description }}</h4>
                                            @endforeach
                                        </div>

                                        <div class="mx-3 direction">
                                            <p class="boldtext">Price for drugs</p>
                                            <p class="text-success">{{ $quotation->total }}</p>
                                        </div>

                                    <div class="d-flex">
                                        <form action="{{ route('quotation.destroy', $quotation->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded bg-secondary px-2 py-1 pb-[5px] pt-[6px] text-white mx-1">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-pharmacy-layout>
