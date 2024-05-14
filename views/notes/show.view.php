<?php require(DIR_BASE . "/views/partials/head.php"); ?>
<?php require(DIR_BASE . "/views/partials/nav.php"); ?>
<?php require(DIR_BASE . "/views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 underline">Go back...</a>
        </p>
        <p><?= htmlspecialchars($note['body']) ?></p>
    </div>
</main>

<?php require(DIR_BASE . "/views/partials/footer.php"); ?>
