<div id="{{ $id ?? 'authCardId' }}" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div class="col-lg-6 offset-1 sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>