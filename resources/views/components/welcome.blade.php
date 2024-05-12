<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <form method="post" action="{{ url('prescription') }}" enctype="multipart/form-data">   
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
        @csrf
        <div class="quotation">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div>Error</div>
            @else
            <input type="text" class="form-control w-auto bg-white" name="pname" value="{{ Auth::user()->name }}">
            <input type="text" class="form-control w-auto mx-1 bg-white" name="pemail" value="{{ Auth::user()->email }}">
            @endif

            <a href="{{ route('userQuotation') }}" class="abutton">See Quotations</a>
        </div>
        <div class="uploadcontainer">
            <x-application-logo class="block h-12 w-auto" />

            <div class="headingtopic">
                <h1 class="topic">Welcome to ABC pharmacy</h1>
                <h3>You can freely upload your prescriptions here</h3>
            </div>
        </div>
        <div class="formbox">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prescription Note</label><span class="text-danger">*</span>
                <input type="text" class="form-control" name="pnote" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Address line 1</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" name="address" placeholder="First name" aria-label="First name">
                </div>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Lane / Streat</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" name="street" placeholder="Last name" aria-label="Last name">
                </div>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">City / Town</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" name="city" placeholder="Last name" aria-label="Last name">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Delivery time slot 1</label><span class="text-danger">*</span>
                    <input type="time" class="form-control" name="dtimeone" placeholder="First name" aria-label="First name">
                </div>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Delivery time slot 2</label><span class="text-danger">*</span>
                    <input type="time" class="form-control" name="dtimetwo" placeholder="Last name" aria-label="Last name">
                </div>
            </div>

            <div class="flex mb-4">
                <div class="col">
                    <div class="col mb-4">
                        <label for="exampleInputEmail1" class="form-label">Image 1</label><span class="text-danger">*</span>
                        <input type="file" class="form-control" name="image1">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Image 4</label>
                        <input type="file" class="form-control" name="image4">
                    </div>
                </div>

                <div class="col">
                    <div class="col mb-4">
                        <label for="exampleInputEmail1" class="form-label">Image 2</label>
                        <input type="file" class="form-control" name="image2">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Image 5</label>
                        <input type="file" class="form-control" name="image5">
                    </div>
                </div>

                <div class="col">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Image 3</label>
                        <input type="file" class="form-control" name="image3">
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-dark">Upload Prescription</button>
        </div>
    </form>
</div>