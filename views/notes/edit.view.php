<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>
<main>
    <div class="mx-auto max-w-3xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-indigo-600">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-white">Edit Note</h1>
                    <a href="/notes" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 transition-all duration-200 ease-in-out flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Notes
                    </a>
                </div>
            </div>
            <form method="POST" action="/note" class="p-6">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <div class="mb-6">
                    <label for="body" class="block text-sm font-semibold text-gray-700 mb-2">Your Note</label>
                    <textarea
                        name="body"
                        id="body"
                        rows="8"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 ease-in-out resize-none shadow-sm"
                        placeholder="Write your thoughts, ideas, or anything you'd like to remember..."><?= $note['body'] ?></textarea>
                        <?php if (isset($error['body'])): ?>
                            <p class="text-red-500 text-sm mt-2"><?= $error['body']; ?></p>
                        <?php endif; ?>
                </div>
                <div class="mb-6 flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button type="button" class="inline-flex items-center px-5 py-2.5 bg-white hover:bg-gray-100 text-gray-700 font-medium rounded-lg transition-all duration-200 focus:ring-4 focus:ring-blue-300">
                        <a href="/notes" class="text-blue-500 underline">Cancel</a>
                    </button>
                </div>
                <div class="flex items-center justify-end">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-200 focus:ring-4 focus:ring-blue-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Update Note
                    </button>
                </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php require base_path('views/partials/footer.php'); ?>