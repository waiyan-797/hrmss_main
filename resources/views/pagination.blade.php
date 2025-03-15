<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between items-center">
            <span class="text-sm text-gray-600 dark:text-gray-300 font-arial">
                @php
                    $currentPage = $paginator->currentPage();
                    $perPage = $paginator->perPage();
                    $totalResults = $paginator->total();
                    $start = ($currentPage - 1) * $perPage + 1;
                    $end = min($currentPage * $perPage, $totalResults);
                @endphp
                Showing {{ $start }} - {{ $end }} of {{ $totalResults }} Results
            </span>

            <div>
                <span>
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span class="font-arial relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white dark:text-gray-300 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 cursor-default leading-5 rounded-md transition duration-300 hover:text-gray-700">
                            {!! __('pagination.previous') !!}
                        </span>
                    @else
                        {{-- <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="font-arial relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white dark:text-gray-300 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 leading-5 rounded-md transition duration-300 hover:text-gray-900 dark:hover:bg-gray-900 focus:outline-none focus:shadow-outline-green focus:border-green-300 active:bg-gray-100 active:text-gray-700">
                            {!! __('pagination.previous') !!}
                        </button> --}}
                        <button wire:click="previousPage"  rel="prev" class="font-arial relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white dark:text-gray-300 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 leading-5 rounded-md transition duration-300 hover:text-gray-900 dark:hover:bg-gray-900 focus:outline-none focus:shadow-outline-green focus:border-green-300 active:bg-gray-100 active:text-gray-700">
                            {!! __('pagination.previous') !!}
                        </button>
                    @endif
                </span>

                <span>
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        {{-- <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="font-arial relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white dark:text-gray-300 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 leading-5 rounded-md transition duration-300 hover:text-gray-900 dark:hover:bg-gray-900 focus:outline-none focus:shadow-outline-green focus:border-green-300 active:bg-gray-100 active:text-gray-700">
                            {!! __('pagination.next') !!}
                        </button> --}}
                        <button wire:click="nextPage"  rel="next" class="font-arial relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white dark:text-gray-300 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 leading-5 rounded-md transition duration-300 hover:text-gray-900 dark:hover:bg-gray-900 focus:outline-none focus:shadow-outline-green focus:border-green-300 active:bg-gray-100 active:text-gray-700">
                            {!! __('pagination.next') !!}
                        </button>
                    @else
                        <span class="font-arial relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white dark:text-gray-300 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 cursor-default leading-5 rounded-md transition duration-300 hover:text-gray-700">
                            {!! __('pagination.next') !!}
                        </span>
                    @endif
                </span>
            </div>
        </nav>
    @endif
</div>
