<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bootstrap Div Division</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="left-side">
                <h2>Inserted Drugs</h2>
                <textarea id="insertedDrugs" class="form-control text-left" rows="5" readonly>
                Drug Name           Quantity            Price
                ------------------------------------------------
                </textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="right-side">
                <h2>Add Drug</h2>
                <form id="addDrugForm">
                    <div class="form-group">
                        <label for="drugName">Drug Name:</label>
                        <input type="text" class="form-control" id="drugName" name="drugName">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity">
                    </div>
                    <button type="button" class="btn btn-primary" id="addDrugBtn">Add Drug</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
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
