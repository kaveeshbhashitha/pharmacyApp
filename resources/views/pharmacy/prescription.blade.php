<x-pharmacy-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                <div class="quotation">
                    <a href="{{ route('userQuotation') }}" class="abutton">See Quotations</a>
                </div>
                <div class="uploadcontainer">
                    
                </div>
                <div class="formbox">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Prescription Note</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Address line 1</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Address line 2</label>
                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Lane / Streat</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">City / Town</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Delivery time slot 1</label><span class="text-danger">*</span>
                                <input type="time" class="form-control" placeholder="First name" aria-label="First name">
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Delivery time slot 2</label><span class="text-danger">*</span>
                                <input type="time" class="form-control" placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <div class="col">
                                <div class="col mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Image 1</label><span class="text-danger">*</span>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">Image 4</label>
                                    <input type="file" class="form-control">
                                </div>
                            </div>

                            <div class="col">
                                <div class="col mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Image 2</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">Image 5</label>
                                    <input type="file" class="form-control">
                                </div>
                            </div>

                            <div class="col">
                                <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">Image 3</label>
                                    <input type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-dark">Upload Prescription</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-pharmacy-layout>