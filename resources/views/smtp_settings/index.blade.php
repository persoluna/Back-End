<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-4xl font-bold text-white mb-4">SMTP Settings</h1>
            <nav class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
                <span class="text-white">/</span>
                <a href="{{ route('smtp-settings.index') }}" class="text-white hover:text-gray-200">SMTP Settings</a>
            </nav>
        </header>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">

        <!-- SMTP Settings form -->
        <form action="{{ route('smtp-settings.update', $smtpSetting->id) }}" method="POST" class="w-full">
            @csrf
            @method('PUT')
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- Mail Mailer input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="mail_mailer">Mail Mailer</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="mail_mailer" placeholder="Enter mail mailer" type="text" name="mail_mailer" value="{{ old('mail_mailer', $smtpSetting->mail_mailer) }}">
                    @error('mail_mailer')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mail Host input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="mail_host">Mail Host</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="mail_host" placeholder="Enter mail host" type="text" name="mail_host" value="{{ old('mail_host', $smtpSetting->mail_host) }}">
                    @error('mail_host')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mail Port input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="mail_port">Mail Port</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="mail_port" placeholder="Enter mail port" type="number" name="mail_port" value="{{ old('mail_port', $smtpSetting->mail_port) }}">
                    @error('mail_port')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mail Username input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="mail_username">Mail Username</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="mail_username" placeholder="Enter mail username" type="email" name="mail_username" value="{{ old('mail_username', $smtpSetting->mail_username) }}">
                    @error('mail_username')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mail Password input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="mail_password">Mail Password</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="mail_password" placeholder="Enter mail password" type="password" name="mail_password" value="{{ old('mail_password', $smtpSetting->mail_password) }}">
                    @error('mail_password')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mail Encryption input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="mail_encryption">Mail Encryption</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="mail_encryption" placeholder="Enter mail encryption" type="text" name="mail_encryption" value="{{ old('mail_encryption', $smtpSetting->mail_encryption) }}">
                    @error('mail_encryption')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mail From Address input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="mail_from_address">Mail From Address</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="mail_from_address" placeholder="Enter mail from address" type="email" name="mail_from_address" value="{{ old('mail_from_address', $smtpSetting->mail_from_address) }}">
                    @error('mail_from_address')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mail From Name input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="mail_from_name">Mail From Name</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="mail_from_name" placeholder="Enter mail from name" type="text" name="mail_from_name" value="{{ old('mail_from_name', $smtpSetting->mail_from_name) }}">
                    @error('mail_from_name')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex gap-4">
                    <!-- Update SMTP Settings button -->
                    <div class="pt-8 flex justify-center sm:w-fit lg:col-span-2">
                        <button class="rounded-tr-2xl rounded-bl-2xl ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50" type="submit">
                            Update SMTP Settings
                        </button>
                    </div>
                    <!-- Add this button after the "Update SMTP Settings" button -->
                    <div class="pt-8 flex justify-center sm:w-fit lg:col-span-2">
                        <button id="testEmailBtn" class="rounded-tr-2xl rounded-bl-2xl ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50" type="button">
                            Test Email
                        </button>
                    </div>

                    <div id="spinnerContainer" class="hidden absolute min-h-[1200px] inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin h-5 w-5 mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38"/>
                        </svg>
                    </div>
                </div>
            </div>

        </form>


        <!-- Add this script at the end of your Blade template -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('testEmailBtn').addEventListener('click', function () {
                // Show the spinner
                document.getElementById('spinnerContainer').classList.remove('hidden');

                fetch('{{ route('smtp-settings.test') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    // Hide the spinner when the response is received
                    document.getElementById('spinnerContainer').classList.add('hidden');
                    alert(data.message);
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Hide the spinner on error
                    document.getElementById('spinnerContainer').classList.add('hidden');
                    alert('An error occurred while sending the test email: ' + error);
                });
            });
        });
        </script>
    </div>
</x-app-layout>