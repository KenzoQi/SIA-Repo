<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mb-4">
                    <div class="card text-center" style="width: 60%; margin: 0 auto;">
                        <div class="card-body">
                            <h5 class="card-title">Graph 1</h5>
                            <p class="card-text">This is the description for Graph 1.</p>
                            <canvas id="graph1" style="width: 100%; height: 200px; margin: 0 auto;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card text-center" style="width: 60%; margin: 0 auto;">
                        <div class="card-body">
                            <h5 class="card-title">Graph 2</h5>
                            <p class="card-text">This is the description for Graph 2.</p>
                            <canvas id="graph2" style="width: 100%; height: 200px; margin: 0 auto;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="w-100"></div> <!-- Add a clearfix -->
                <div class="col-md-6 mb-4 mt-4"> <!-- Add mt-4 class for top margin -->
                    <div class="card text-center" style="width: 60%; margin: 0 auto;">
                        <div class="card-body">
                            <h5 class="card-title">Graph 3</h5>
                            <p class="card-text">This is the description for Graph 3.</p>
                            <canvas id="graph3" style="width: 100%; height: 200px; margin: 0 auto;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 mt-4"> <!-- Add mt-4 class for top margin -->
                    <div class="card text-center" style="width: 60%; margin: 0 auto;">
                        <div class="card-body">
                            <h5 class="card-title">Graph 4</h5>
                            <p class="card-text">This is the description for Graph 4.</p>
                            <canvas id="graph4" style="width: 100%; height: 200px; margin: 0 auto;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Mock data for demonstration
        const data1 = [12, 19, 3, 5, 2, 3];
        const data2 = [5, 7, 10, 3, 8, 15];
        const data3 = [3, 10, 13, 15, 22, 30];
        const data4 = [10, 15, 20, 25, 30, 35];

        // Chart 1
        new Chart(document.getElementById('graph1'), {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Dataset 1',
                    data: data1,
                    borderColor: 'blue',
                    fill: false
                }]
            },
            options: {
                responsive: false
            }
        });

        // Chart 2
        new Chart(document.getElementById('graph2'), {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Dataset 2',
                    data: data2,
                    backgroundColor: 'green'
                }]
            },
            options: {
                responsive: false
            }
        });

        // Chart 3
        new Chart(document.getElementById('graph3'), {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Dataset 3',
                    data: data3,
                    backgroundColor: ['red', 'blue', 'yellow', 'green', 'purple', 'orange']
                }]
            },
            options: {
                responsive: false
            }
        });

        // Chart 4
        new Chart(document.getElementById('graph4'), {
            type: 'radar',
            data: {
                labels: ['A', 'B', 'C', 'D', 'E'],
                datasets: [{
                    label: 'Dataset 4',
                    data: data4,
                    backgroundColor: 'orange',
                    borderColor: 'orange'
                }]
            },
            options: {
                responsive: false
            }
        });
    </script>
</x-app-layout>
