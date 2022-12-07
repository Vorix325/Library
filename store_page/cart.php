<?php include '../view/header.php'; ?>
<main>
    <aside>
        <h1>Categories</h1>
        <nav>
        <ul>
            <!-- display links for all categories -->
            <?php foreach($categories as $category) : ?>
            <li>
                <a href="?category_id=<?php echo $category->getID(); ?>">
                    <?php echo $category->getName(); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>
    </aside>
    <section>
        <table border="1">
            <tr>
                <th>Product Name</th><!-- comment -->
                <th>Product Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Add</th>
                <th>Remove</th>
            </tr>
            <?php foreach($cart as $item): ?>
            <tr>
                <td><?php echo $item['']
            </tr>
        </table>
    </section>
</main>


