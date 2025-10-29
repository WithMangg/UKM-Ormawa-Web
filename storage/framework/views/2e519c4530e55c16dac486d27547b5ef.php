<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-100 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Card Welcome -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl">
                <div class="p-8 text-gray-900 dark:text-gray-100 text-xl font-semibold flex items-center space-x-3">
                    🎉 <span><?php echo e(__("Selamat Datang ")); ?> <?php echo e(Auth::user()->name); ?>, Anda berhasil login! </span>
                </div>
            </div>

            <!-- Card Grafik Anggota -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl">
                <div class="p-8">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">📊 Statistik Keanggotaan</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Jumlah anggota aktif di seluruh
                            organisasi Politeknik Harapan Bersama</p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 overflow-x-auto">
                        <canvas id="anggotaChart" class="rounded-lg min-w-[1000px] h-[700px]"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Load Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Script Chart.js -->
    <script>
        const ctx = document.getElementById('anggotaChart').getContext('2d');
        const anggotaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels, 15, 512) ?>,
                datasets: [{
                    label: 'Jumlah Anggota',
                    data: <?php echo json_encode($data, 15, 512) ?>,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
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
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if(session('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '<?php echo e(session("success")); ?>',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /home/mangg/Documents/PROJECT/UKM-TA (2)/UKM-TA/resources/views/dashboard.blade.php ENDPATH**/ ?>