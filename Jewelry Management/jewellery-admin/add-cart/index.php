<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Jewelry</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            padding-top: 50px;
            background-color: #f8f9fa;
        }
        .add-form-container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-heading {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="container add-form-container">
    <h2 class="form-heading">Add New Jewelry</h2>
    
    <form action="add_jewelry.php" method="post">
        <div class="form-group">
            <label for="name">Jewelry Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter jewelry name" required>
        </div>
        
        <div class="form-group">
            <label for="image">Jewelry Image Filename</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="Enter image filename (e.g., necklace.jpg)" required>
        </div>
        
        <div class="form-group">
            <label for="price">Price (in ₹)</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Enter price" required>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" required>
                <option value="" disabled selected>Select Category</option>
                <option value="ring">Ring</option>
                <option value="earring">Earring</option>
                <option value="necklace">Necklace</option>
                <option value="bracelet">Bracelet</option>
                <option value="pendant">Pendant</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-custom btn-block">Add Jewelry</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
