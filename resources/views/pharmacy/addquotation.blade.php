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

    @php
        $drugs = app(\App\Http\Controllers\DrugController::class)->showDrugNames();
    @endphp

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
                            <form method="post" action="{{ url('quotation') }}" enctype="multipart/form-data"> 
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
                                <div class="quotation d-none justify-content-between">
                                    <input type="text" class="form-control w-auto bg-white" name="pname" value="{{ $prescription-> pname }}">
                                    <input type="text" class="form-control w-auto mx-1 bg-white" name="pemail" value="{{ $prescription->pemail }}">
                                    <a href="{{ route('userQuotation') }}" class="abutton">See Quotations</a>
                                </div>
                                <div class="col-md-12 my-2">
                                    <h2 class="text-xl">Drugs List</h2>
                                    <textarea id="insertedDrugs" name="description" class="form-control text-left my-2" rows="5"></textarea>
                                    <input type="text" id="totalCharge" name="total" class="form-control text-end">
                                </div>
                                        <div class="form-group my-2">
                                            <label for="drugName">Drug Name:</label>
                                            <select type="text" class="form-control my-2 w-50" id="drugName" name="drugName">
                                                @foreach ($drugs as $drugName)
                                                    <option value="{{ $drugName -> drugname }}">{{ $drugName -> drugname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="quantity">Quantity:</label>
                                            <input type="number" class="form-control my-2 w-50" id="quantity" name="quantity">
                                        </div>
                                        <button type="button" class="btn btn-primary my-2" id="addDrugBtn">Add</button>
                                    </div>
                                    <button class="btn btn-secondary w-100" type="submit">Send quotation</button>
                                </div>
                            </form>
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
        var drugs = @json($drugs); // Convert the PHP array to JavaScript object

        // Handle adding drug
        $('#addDrugBtn').click(function() {
            var drugName = $('#drugName').val();
            var quantity = parseInt($('#quantity').val());
            
            // Find the selected drug in the drugs array
            var selectedDrug = drugs.find(drug => drug.drugname === drugName);

            if (selectedDrug) {
                var pricePerOne = parseFloat(selectedDrug.priceperone);

                // Calculate total charge
                var totalCharge = pricePerOne * quantity;

                // Construct the drug details string
                var drugDetails = `${drugName} : ${quantity} x ${pricePerOne} = $${totalCharge.toFixed(2)}\n`;

                // Update selected drugs textarea
                var selectedDrugsText = $('#insertedDrugs').val();
                $('#insertedDrugs').val(selectedDrugsText + drugDetails + '| ');

                // Update total charge input
                var currentTotalCharge = parseFloat($('#totalCharge').val().replace('$', '')) || 0;
                var newTotalCharge = currentTotalCharge + totalCharge;
                $('#totalCharge').val('Total charge = $' + newTotalCharge.toFixed(2));

                // Reset form fields
                $('#quantity').val('');
            } else {
                alert('Selected drug not found in the database.');
            }
        });
    });

</script>
</body>
</html>

