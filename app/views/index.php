<a href="./?controller=product&action=add" class="btn btn-md btn-primary">Add New Product</a>
<table class="table table-striped caption-top text-center">
    <caption>List of phones</caption>
    <thead>
        <tr>
            <?php foreach (array_keys($products[0]) as $key): ?>
                <th scope="col"><?php echo ucwords($key) ?></th>
            <?php endforeach; ?>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <?php foreach ($product as $key => $value): ?>
                    <td><?php echo $value; ?></td>
                <?php endforeach; ?>
                <td>
                    <a href="/?controller=product&action=edit&id=<?php echo $product['id'] ?>"
                       class="d-inline-block btn btn-sm btn-success">Edit</a>
                    <form class="d-inline-block p-0" action="/?controller=product&action=delete" method="post">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
