<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>
<?php require 'partials/banner.php'; ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <?php foreach ($notes as $note) : ?>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-4 w-1/3">
                <div class="px-4 py-5 sm:px-6">
                    <p class="mt-1 max-w-2xl text-sm text-gray-500"><a class="underline text-blue-500" href="note?id=<?= $note['id']; ?>"><?=htmlspecialchars( $note['body']); ?></a></p>
                </div>
            </div>
        <?php endforeach; ?>

        <button class="text-blue-500 underline mb-4 rounded-lg bg-blue-50 px-4 py-2"><a href="/note/create" class="text-blue-500 underline mb-4 rounded-lg bg-blue-50 px-4 py-2">New Note</a></button>
    </div>
</main>
<?php require 'partials/footer.php'; ?>