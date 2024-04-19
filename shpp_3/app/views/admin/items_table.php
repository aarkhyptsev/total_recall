<table class="table table-striped text-center">
    <thead class="table">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Author_1</th>
        <th scope="col">Year</th>
        <th scope="col">Action</th>
        <th scope="col">Click</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">
    <?php foreach ($books as $item) : ?>
        <tr>
            <th scope="row"><?= $item['book_id'] ?></th>
            <td><?= $item['book_name'] ?></td>
            <td><?= $item['book_author_1'] ?></td>
            <td><?= $item['book_year'] ?></td>
            <td>delete</td>
            <td><?= $item['book_click'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php
$total_pages = $pagination['total_pages'];
$current_page = $pagination['current_page'];
?>
<nav aria-label="...">
    <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <?php if ($i == $current_page) : ?>
                <li class="page-item active" aria-current="page">
                    <span class="page-link"><?= $i ?></span>
                </li>
            <?php else: ?>
                <li class="page-item"><a class="page-link" href="http://test.library/admin/<?= $i ?>"><?= $i ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>
    </ul>
</nav>