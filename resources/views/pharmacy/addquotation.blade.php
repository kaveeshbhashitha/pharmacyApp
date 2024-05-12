<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('styles/image.css') }}">
    <title>Add Quotation</title>
</head>
<body>
<x-pharmacy-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <div class="p-2 lg:p-8 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left-side">
                                <div class="d-flex direction">
                                    <div class="w-100 p-5">
                                        <img id="bigImg" src="{{ $prescription->image1 }}" alt="Big Image">
                                    </div>
                                    <div class="d-flex small-images">
                                        <img onclick="changeBigImage('{{ $prescription->image1 }}')" src="{{ $prescription->image1 }}" alt="Image 1" class="smallimage">
                                        <img onclick="changeBigImage('{{ $prescription->image2 }}')" src="{{ $prescription->image2 }}" alt="Image 1" class="smallimage">
                                        <img onclick="changeBigImage('{{ $prescription->image3 }}')" src="{{ $prescription->image3 }}" alt="Image 2" class="smallimage">
                                        <img onclick="changeBigImage('{{ $prescription->image4 }}')" src="{{ $prescription->image4 }}" alt="Image 3" class="smallimage">
                                        <img onclick="changeBigImage('{{ $prescription->image5 }}')" src="{{ $prescription->image5 }}" alt="Image 4" class="smallimage">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right-side">
                                <div class="quotation d-none justify-content-between">
                                    <input type="text" class="form-control w-auto bg-white" name="pname" value="{{ $prescription-> pname }}">
                                    <input type="text" class="form-control w-auto mx-1 bg-white" name="pemail" value="{{ $prescription->pemail }}">
                                    <a href="{{ route('userQuotation') }}" class="abutton">See Quotations</a>
                                </div>
                                <div class="col-md-12 my-2">
                                    <h2>Drugs List</h2>
                                    <textarea id="insertedDrugs" class="form-control text-left my-2" rows="5" readonly></textarea>
                                </div>
                                <form id="addDrugForm">   
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
                                        <div class="form-group my-2">
                                            <label for="drugName">Drug Name:</label>
                                            <input type="text" class="form-control my-2" id="drugName" name="drugName">
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="quantity">Quantity:</label>
                                            <input type="number" class="form-control my-2" id="quantity" name="quantity">
                                        </div>
                                        <button type="button" class="btn btn-primary my-2" id="addDrugBtn">Add Drug</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-pharmacy-layout>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function changeBigImage(imageSrc) {
        document.getElementById('bigImg').src = imageSrc;
    }

    $(document).ready(function() {
        // Handle adding drug
        $('#addDrugBtn').click(function() {
            var drugName = $('#drugName').val();
            var quantity = $('#quantity').val();
            var drugData = drugName + ' - ' + quantity;
            
            // Append drug data to the textarea
            $('#insertedDrugs').val(function(_, val) {
                return val + drugData + '\n';
            });

            // Reset form fields
            $('#drugName').val('');
            $('#quantity').val('');
        });
    });
</script>
</body>
</html>

