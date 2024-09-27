<x-layout>
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-lg shadow-lg mt-8">
        <h1 class="text-3xl font-bold text-center mb-6"><i class="fas fa-gavel text-red-600"></i> Rules & Regulations</h1>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-blue-600 mb-4"><i class="fas fa-info-circle"></i> How to Login & Access the Dashboard</h2>
            <p class="text-gray-700 mb-2">
                To access the dashboard and manage your posts, you must verify your email. Once you attempt to access the 
                <a href="{{ route('dashboard') }}" class="text-blue-600 underline hover:text-blue-800">dashboard</a>, 
                an email verification link will be sent to your registered email address. Please follow the instructions in the email to verify your account.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-blue-600 mb-4"><i class="fas fa-clipboard-list"></i> Posting Rules</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li class="mb-2"><i class="fas fa-check-circle text-green-500"></i> Posts should be respectful and non-offensive.</li>
                <li class="mb-2"><i class="fas fa-check-circle text-green-500"></i> Ensure your content is original. Plagiarism is not allowed.</li>
                <li class="mb-2"><i class="fas fa-check-circle text-green-500"></i> Avoid using inappropriate language or making harmful comments. <a href="{{ route('upcomingFeatures') }}" class="text-blue-600 underline hover:text-blue-800">read more</a>.</li>
                
                <li class="mb-2"><i class="fas fa-check-circle text-green-500"></i> Posts should be informative and relevant to the blog topic.</li>
                <li class="mb-2"><i class="fas fa-check-circle text-green-500"></i> Adhere to all copyright laws when sharing media or other content.</li>
            </ul>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-blue-600 mb-4"><i class="fas fa-handshake"></i> General Etiquette</h2>
            <p class="text-gray-700">
                Please treat all users with respect. Any form of harassment or abusive behavior will not be tolerated and may result in the suspension of your account.
            </p>
        </section>
    </div>
</x-layout>
