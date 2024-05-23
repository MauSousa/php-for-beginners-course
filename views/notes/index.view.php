<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($notes as $note) : ?>
                <a href="/note?id=<?php echo $note['id'] ?>" class="text-blue-500 hover:underline">
                    <li><?php echo htmlspecialchars($note['body']) ?></li>
                <?php endforeach; ?>
        </ul>

        <article class="mt-6 flex flex-row gap-x-3">
            <p>
                <a href="/notes/create" class="text-blue-500 hover:underline">Create a note</a>
            </p>

            <p>
                <a href="/notes/pdf" class="text-blue-500 hover:underline" target="_blank">Download pdf</a>
            </p>
        </article>
    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>
