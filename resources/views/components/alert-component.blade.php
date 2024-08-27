@props(['type', 'value'])

@if ($type == 'danger' && $value)
    <div class="w-full md:w-1/3 mx-auto">
        <div class="flex p-5 rounded-lg shadow bg-white">
            <div>
                <svg class="w-6 h-6 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M12 5.99L19.53 19H4.47L12 5.99M12 2L1 21h22L12 2zm1 14h-2v2h2v-2zm0-6h-2v4h2v-4z" />
                </svg>
            </div>
            <div class="ml-3">
                <h2 class="font-semibold text-gray-800">Error</h2>
                <p class="mt-2 text-sm text-gray-600 leading-relaxed">{{ $value }}</p>
            </div>
        </div>
    </div>
@endif

@if ($type == 'success' && $value)
    <div class="w-full md:w-1/3 mx-auto">
        <div class="flex rounded-lg shadow gap-5 bg-green-50">
            <div class="px-5">
                <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                <svg class="w-6 h-6 fill-current text-green-500" width="800px" height="800px" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#000000" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
            <div class="px-5">
                <h2 class="font-semibold text-gray-800">Success</h2>
                <p class="mt-2 text-sm text-gray-600 leading-relaxed">{{ $value }}</p>
            </div>
        </div>
    </div>
@endif
