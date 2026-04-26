<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<main>
    <div class="mx-auto max-w-md px-4 py-8 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Login to Your Account</h2>
            
            <form action="/session" method="POST">
                <div class="space-y-6">
                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                            <?php if (isset($error['email'])): ?>
                            <p class="text-red-500 text-sm mt-2"><?= $error['email']; ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                            <?php if (isset($error['password'])): ?>
                            <p class="text-red-500 text-sm mt-2"><?= $error['password']; ?></p>
                        <?php endif; ?>
                    </div>
                
                    <!-- Submit Button -->
                    <div>
                        <button type="submit" 
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Login
                        </button>
                    </div>
                </div>
            </form>
            
            <div class="mt-6 text-center text-sm">
                <p class="text-gray-600">
                    Don't have an account? 
                    <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Sign up
                    </a>
                </p>
            </div>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>