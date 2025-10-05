<?php

$currentPage = $currentPage ?? 1;
$totalPages = $totalPages ?? 1;
$baseUrl = $baseUrl ?? BASE_URL;

if ($totalPages <= 1) {
    return;
}
?>

<nav aria-label="Page navigation example" style="text-align: center;">
    <ul class="pagination">
        <?php if ($currentPage > 1): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $baseUrl ?>?page=<?= $currentPage - 1 ?>">Previous</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <a class="page-link" href="#">Previous</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i === $currentPage) ? 'active' : '' ?>">
                <a class="page-link" href="<?= $baseUrl ?>?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $baseUrl ?>?page=<?= $currentPage + 1 ?>">Next</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>