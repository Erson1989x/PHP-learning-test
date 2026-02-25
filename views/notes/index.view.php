<?php require 'views/partials/head.php'; ?>
<?php require 'views/partials/nav.php'; ?>
<?php require 'views/partials/banner.php'; ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <button class="text-blue-500 underline mb-4 rounded-lg bg-blue-50 px-4 py-2 border border-blue-400 hover:bg-blue-100"><a href="/notes/create" class="text-blue-500 no-underline">New Note</a></button>

        <?php foreach ($notes as $note) : ?>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-4 w-1/3">
                <div class="px-4 py-5 sm:px-6">
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                            <?= htmlspecialchars($note['body']) ?>
                        </a>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<?php require 'views/partials/footer.php'; ?>