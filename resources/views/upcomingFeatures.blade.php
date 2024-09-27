<x-layout>
    <h1 class="text-3xl font-bold text-center my-6">🚀 Upcoming Features</h1>

    <div class="bg-white p-6 rounded-lg shadow-lg mx-auto max-w-screen-md">
        <ul class="space-y-4">
            {{-- Google Login --}}
            <li class="flex items-start space-x-4">
                <i class="fas fa-sign-in-alt text-blue-600 mt-1"></i>
                <div>
                    <h2 class="text-xl font-semibold">Google Login</h2>
                    <p>Integrate Google login for easier registration and access.</p>
                </div>
            </li>

            {{-- Search & Filter --}}
            <li class="flex items-start space-x-4">
                <i class="fas fa-search text-green-600 mt-1"></i>
                <div>
                    <h2 class="text-xl font-semibold">Search & Filter</h2>
                    <p>Implement a search and filtering feature to help users find posts based on tags, authors, or content.</p>
                </div>
            </li>

            {{-- Responsive Design --}}
            <li class="flex items-start space-x-4">
                <i class="fas fa-mobile-alt text-purple-600 mt-1"></i>
                <div>
                    <h2 class="text-xl font-semibold">Responsive Design</h2>
                    <p>Ensure the platform is fully responsive for mobile, tablet, and desktop.</p>
                </div>
            </li>

            {{-- Post Drafts --}}
            <li class="flex items-start space-x-4">
                <i class="fas fa-file-alt text-yellow-600 mt-1"></i>
                <div>
                    <h2 class="text-xl font-semibold">Post Drafts</h2>
                    <p>Enable users to save posts as drafts before publishing.</p>
                </div>
            </li>

            {{-- Rich Text Editor --}}
            <li class="flex items-start space-x-4">
                <i class="fas fa-pencil-alt text-pink-600 mt-1"></i>
                <div>
                    <h2 class="text-xl font-semibold">Rich Text Editor</h2>
                    <p>Add support for a rich text editor to enhance the post creation experience.</p>
                </div>
            </li>

            {{-- Social Media Sharing --}}
            <li class="flex items-start space-x-4">
                <i class="fas fa-share-alt text-blue-400 mt-1"></i>
                <div>
                    <h2 class="text-xl font-semibold">Social Media Sharing</h2>
                    <p>Allow users to share posts directly to their social media profiles.</p>
                </div>
            </li>

            {{-- Like/Upvote Feature --}}
            <li class="flex items-start space-x-4">
                <i class="fas fa-thumbs-up text-red-600 mt-1"></i>
                <div>
                    <h2 class="text-xl font-semibold">Like/Upvote Feature</h2>
                    <p>Add a like or upvote feature for user posts to increase engagement.</p>
                </div>
            </li>
        </ul>
    </div>
</x-layout>
