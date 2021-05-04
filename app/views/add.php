<form class="w-50 mx-auto" action="./?controller=product&action=add" method="post">
    <?php if(isset($message)): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <fieldset>
        <legend>Edit Product</legend>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="quantity">
        </div>
    </fieldset>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/" class="btn btn-danger">Back</a>
</form>