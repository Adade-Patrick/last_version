<!-- Modal message -->
    <div id="messageModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 invisible">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-lg font-semibold mb-4 text-center">Message</h2>

            @if ($errors->any())
                <ul class="text-red-500 mb-4">
                    @foreach ($errors->all() as $error)
                        <li class="mb-1">• {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @if (session('success'))
                <div class="text-green-500 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-center">
                <button onclick="closeModal()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    OK
                </button>
            </div>
        </div>
    </div>
    
<script>
    window.addEventListener("matiere_store", function(e) {
        document.querySelector("#messageModal").classList.remove("invisible");

        setTimeout(() => {
        document.querySelector("#messageModal").classList.add("invisible");
        }, 5000);
    })

    window.addEventListener("matiere_delete", function(e) {
        document.querySelector("#messageModal").classList.remove("invisible");

        setTimeout(() => {
        document.querySelector("#messageModal").classList.add("invisible");
        }, 5000);
    })
</script>
