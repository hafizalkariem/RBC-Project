@extends('layouts.app')

@section('fullwidth')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 pt-20">
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Header -->
        <div class="glass rounded-2xl p-8 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Edit Profile</h1>
                    <p class="text-gray-300">Update your profile information</p>
                </div>
                <a href="{{ route('profile') }}" class="glass px-4 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-blue-500/20 transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>Back
                </a>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="glass rounded-lg p-4 mb-8 border border-green-500/50 bg-green-500/10">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-400 mr-3"></i>
                    <span class="text-green-300">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="glass rounded-lg p-4 mb-8 border border-red-500/50 bg-red-500/10">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle text-red-400 mr-3 mt-1"></i>
                    <div>
                        <h3 class="text-red-300 font-semibold mb-2">Please fix the following errors:</h3>
                        <ul class="text-red-300 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Edit Form -->
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')
            
            <!-- Profile Picture -->
            <div class="glass rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-white mb-6">Profile Picture</h2>
                <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-8">
                    <div class="relative">
                        <img id="profile-preview" src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=3b82f6&color=fff&size=150' }}" 
                             alt="Profile" class="w-32 h-32 rounded-full border-4 border-blue-500/50 object-cover">
                        <div class="absolute inset-0 bg-black/50 rounded-full opacity-0 hover:opacity-100 transition-opacity flex items-center justify-center cursor-pointer" onclick="document.getElementById('photo-upload').click()">
                            <i class="fas fa-camera text-white text-2xl"></i>
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-300 mb-4">Click on the image or button to upload a new photo</p>
                        <input type="file" id="photo-upload" name="photo" accept="image/*" class="hidden" onchange="previewImage(this)">
                        <button type="button" onclick="document.getElementById('photo-upload').click()" class="bg-gradient-to-r from-blue-500 to-purple-600 px-4 py-2 rounded-lg text-white hover:from-blue-600 hover:to-purple-700 transition-all duration-300">
                            <i class="fas fa-upload mr-2"></i>Upload Photo
                        </button>
                        @error('photo')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-400 text-xs mt-2">Max file size: 2MB. Supported formats: JPEG, PNG, JPG, GIF</p>
                    </div>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="glass rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-white mb-6">Personal Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-300 mb-2">Full Name *</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" 
                               class="w-full glass p-3 rounded-lg text-white placeholder-gray-400 border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition-colors">
                        @error('name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-gray-300 mb-2">Email Address *</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" 
                               class="w-full glass p-3 rounded-lg text-white placeholder-gray-400 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition-colors">
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-gray-300 mb-2">Phone Number</label>
                        <input type="tel" name="phone" value="{{ Auth::user()->phone_number }}" placeholder="Enter your phone number" 
                               class="w-full glass p-3 rounded-lg text-white placeholder-gray-400 border border-gray-600 focus:border-blue-500 focus:outline-none transition-colors">
                    </div>
                    
                    <div>
                        <label class="block text-gray-300 mb-2">Location</label>
                        <input type="text" name="location" value="{{ Auth::user()->address }}" placeholder="Enter your location" 
                               class="w-full glass p-3 rounded-lg text-white placeholder-gray-400 border border-gray-600 focus:border-blue-500 focus:outline-none transition-colors">
                    </div>
                </div>
            </div>

            <!-- Security -->
            <div class="glass rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-white mb-6">Change Password</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-gray-300 mb-2">Current Password</label>
                        <input type="password" name="current_password" placeholder="Enter current password" 
                               class="w-full glass p-3 rounded-lg text-white placeholder-gray-400 border {{ $errors->has('current_password') ? 'border-red-500' : 'border-gray-600' }} focus:border-blue-500 focus:outline-none transition-colors">
                        @error('current_password')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-gray-300 mb-2">New Password</label>
                        <input type="password" name="password" placeholder="Enter new password" 
                               class="w-full glass p-3 rounded-lg text-white placeholder-gray-400 border border-gray-600 focus:border-blue-500 focus:outline-none transition-colors">
                    </div>
                    
                    <div>
                        <label class="block text-gray-300 mb-2">Confirm New Password</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm new password" 
                               class="w-full glass p-3 rounded-lg text-white placeholder-gray-400 border border-gray-600 focus:border-blue-500 focus:outline-none transition-colors">
                    </div>
                </div>
                
                <p class="text-gray-400 text-sm mt-4">Leave password fields empty if you don't want to change your password</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4 justify-end">
                <a href="{{ route('profile') }}" class="glass px-6 py-3 rounded-lg text-gray-300 hover:text-white hover:bg-gray-500/20 transition-all duration-300 text-center">
                    Cancel
                </a>
                <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-3 rounded-lg text-white hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection