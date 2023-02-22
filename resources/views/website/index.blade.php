<x-guest-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div>
    </x-slot>

    <section class="p-6 overflow-hidden shadow-md dark:bg-dark-eval-1 lg:h-screen bg-gray-50">
        <div class="mx-auto">
            <div class="lg:flex items-center justify-center">
                <!-- Local Government Areas -->
                <div class="w-full lg:w-7/12 p-2">
                    <h2 class="text-2xl font-bold text-orange-600">Local Government Areas</h2>
                    <p class="mb-4">
                        Total cumulative votes from each local government area.
                    </p>
                    <div class="grid grid-flow-row lg:grid-flow-col lg:grid-cols-3 gap-4">
                        @foreach ($localGovernmentAreas as $lga)
                            <div class="p-10 bg-white dark:bg-dark-eval-1 dark:shadow-2xl shadow-xl">
                                <i class="fa-solid fa-users mb-3 text-green-500"></i>

                                <p>
                                    <span class="font-semibold text-2xl">
                                        {{ $lga->name }}
                                    </span>
                                </p>
                                <p>
                                    <span class="font-bold text-3xl">
                                        {{ number_format($lga->units->sum('vote')) }}
                                    </span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full lg:w-5/12 mx-auto p-2 overflow-hidden">
                    <!-- Canvas container -->
                    <div class="p-10">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <h2 class="text-2xl font-bold text-orange-600">Wards</h2>
        <p class="mb-4">
            Total cumulative votes from each ward.
        </p>


        <div class="mt-4">
            <canvas id="myWard"></canvas>
        </div>


        <hr class="my-10">

        <div class="grid grid-flow-row lg:grid-cols-5 gap-3">
            @foreach ($wards as $ward)
                <div class="py-10 px-5 bg-white dark:bg-dark-eval-1 dark:shadow-2xl shadow-xl">
                    <i class="fa-solid fa-users mb-4 text-green-300"></i>

                    <p class="mb-2">
                        <span class="font-semibold text-lg uppercase">
                            {{ $ward->name }}
                        </span>
                    </p>
                    <p>
                        <span class="font-bold text-3xl text-gray-700">
                            {{ number_format($ward->units->sum('vote')) }}
                        </span>
                    </p>
                </div>
            @endforeach
        </div>


    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            var myWard = new Chart("myWard", {
                type: 'bar',
                data: {
                    labels: {{ Js::from($totalVotesByWard->keys()->toArray()) }},
                    datasets: [{
                        label: '# of Votes by Ward',
                        data: {{ Js::from($totalVotesByWard->values()->toArray()) }},
                        borderWidth: 1,
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var myChart = new Chart("myChart", {
                type: 'doughnut',
                data: {
                    labels: {{ Js::from($totalVotesByLocalGovernment->values()->toArray()) }},
                    datasets: [{
                        label: '# of Votes by Local Government Area',
                        data: {{ Js::from($totalVotesByLocalGovernment->keys()->toArray()) }},
                        backgroundColor: ['rgb(50,205,50)', 'rgb(20,25,50)', 'rgb(255, 99, 132)'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Votes by Local Government Area Doughnut Chart'
                        }
                    }
                },
            });

            myChart.render();
            myWard.render();
        </script>
    @endpush
</x-guest-layout>
