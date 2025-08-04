<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Bisnis</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        
        .form-container {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .form-container:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        input:focus, textarea:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
        }
        
        .btn-submit {
            background-color: #4f46e5;
            transition: all 0.3s;
        }
        
        .btn-submit:hover {
            background-color: #4338ca;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }
        
        .btn-submit:active {
            transform: translateY(0);
        }
        
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        
        .logo-placeholder {
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background-color: #e0e7ff;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="form-container bg-white rounded-2xl p-8 w-full max-w-lg">
        <div class="logo-container">
            <div class="logo-placeholder">
                <img src="/invent/assets/img/apple-touch-icon.png" alt="Logo perusahaan digital modern dengan ikon bangunan dan teks bisnis berwarna ungu" class="rounded-lg" />
            </div>
        </div>
        
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Daftarkan Bisnis Anda</h1>
        @if(session('success'))
            <div class="alert alert-success">{{session('success') }}</div>
        @endif

        <form action="{{ route('register.form') }}" method="POST" class="space-y-5">

            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" id="name" name="name" required 
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="Masukkan nama lengkap">
                <p class="mt-1 text-xs text-red-500 hidden" id="nameError">Nama harus diisi</p>
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" required 
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="contoh@email.com">
                <p class="mt-1 text-xs text-red-500 hidden" id="emailError">Masukkan email yang valid</p>
            </div>
            
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
                <input type="tel" id="phone" name="phone" required 
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="081234567890">
                <p class="mt-1 text-xs text-red-500 hidden" id="phoneError">Nomor HP harus diisi</p>
            </div>
            
            <div>
                <label for="business" class="block text-sm font-medium text-gray-700 mb-1">Nama Bisnis</label>
                <input type="text" id="business" name="business" required 
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="Nama bisnis/perusahaan">
                <p class="mt-1 text-xs text-red-500 hidden" id="businessError">Nama bisnis harus diisi</p>
            </div>
            
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Bisnis</label>
                <textarea id="address" name="address" rows="3" required 
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="Alamat lengkap bisnis"></textarea>
                <p class="mt-1 text-xs text-red-500 hidden" id="addressError">Alamat harus diisi</p>
            </div>
            
            <button type="submit" class="btn-submit w-full py-3 px-4 rounded-lg text-white font-medium text-sm uppercase tracking-wider">
                Simpan Data
            </button>
        </form>
    </div>
        <div class="text-center mt-6">
            <a href="{{ route('register.form') }}"></a>;

        </div>
    <script>
        document.getElementById('registration.Form').addEventListener('submit', function(e) {
            e.preventDefault();
            let isValid = true;
            
            // Reset error messages
            document.querySelectorAll('[id$="Error"]').forEach(el => el.classList.add('hidden'));
            
            // Name validation
            const name = document.getElementById('name').value.trim();
            if (!name) {
                document.getElementById('nameError').classList.remove('hidden');
                isValid = false;
            }
            
            // Email validation
            const email = document.getElementById('email').value.trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email || !emailPattern.test(email)) {
                document.getElementById('emailError').classList.remove('hidden');
                isValid = false;
            }
            
            // Phone validation
            const phone = document.getElementById('phone').value.trim();
            if (!phone) {
                document.getElementById('phoneError').classList.remove('hidden');
                isValid = false;
            }
            
            // Business validation
            const business = document.getElementById('business').value.trim();
            if (!business) {
                document.getElementById('businessError').classList.remove('hidden');
                isValid = false;
            }
            
            // Address validation
            const address = document.getElementById('address').value.trim();
            if (!address) {
                document.getElementById('addressError').classList.remove('hidden');
                isValid = false;
            }
            
            if (isValid) {
                // Form data object to be processed
                const formData = {
                    name,
                    email,
                    phone,
                    business,
                    address
                };
                
                console.log('Form data:', formData);
                
                // Here you would typically send the data to a server
                alert('Pendaftaran berhasil! Data telah disimpan.');
                this.reset();
            }
        });
    </script>
</body>
</html>