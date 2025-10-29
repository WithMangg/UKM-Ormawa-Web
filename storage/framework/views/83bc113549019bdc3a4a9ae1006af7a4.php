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
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('INI HALAMAN HISTORY')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl overflow-hidden p-6">
                <h2 class="text-xl font-bold mb-6 text-gray-800 dark:text-white">Riwayat Pendaftaran UKM</h2>

                <div x-data="{ page: 1 }" class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 uppercase font-semibold">
                            <tr>
                                <th class="px-4 py-3 text-left">No</th>
                                <th class="px-4 py-3 text-left">Nama</th>
                                <th class="px-4 py-3 text-left">NIM</th>
                                <th class="px-4 py-3 text-left">Email</th>
                                <th class="px-4 py-3 text-left">No. HP</th>
                                <th class="px-4 py-3 text-left">Program Studi</th>
                                <th class="px-4 py-3 text-left">Semester</th>
                                <th class="px-4 py-3 text-left">Jenis Kelamin</th>
                                <th class="px-4 py-3 text-left">Alasan</th>
                                <th class="px-4 py-3 text-center">Foto</th>
                                <th class="px-4 py-3 text-center">Tanggal Pendaftaran</th>
                                 <!-- <th class="px-4 py-3 text-left">Kesediaan</th> -->
                                <th class="px-4 py-3 text-left">Admin UKM</th>
                            </tr>
                        </thead>

                       <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        ``<?php $__currentLoopData = $recruitments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $recruitment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr x-show="page === Math.ceil((<?php echo e($index + 1); ?>) / 5)" class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200"><?php echo e($index + 1); ?></td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200"><?php echo e($recruitment->name); ?></td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200"><?php echo e($recruitment->nim); ?></td>
                                <td class="px-4 py-3">
                                    <a href="mailto:<?php echo e($recruitment->email); ?>" target="_blank"
                                    class="text-blue-600 hover:underline dark:text-blue-400">
                                        <?php echo e($recruitment->email); ?>

                                    </a>
                                </td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200"><?php echo e($recruitment->phone); ?></td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200"><?php echo e($recruitment->study_program); ?></td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200"><?php echo e($recruitment->semester); ?></td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 inline-flex text-xs font-medium rounded-full 
                                        <?php echo e($recruitment->gender == 'Male' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800'); ?>">
                                        <?php echo e($recruitment->gender == 'Male' ? 'Laki-Laki' : 'Perempuan'); ?>

                                    </span>
                                </td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200"><?php echo e($recruitment->reason); ?></td>
                                <td class="px-4 py-3 text-center">
                                    <?php if($recruitment->photo): ?>
                                        <img src="<?php echo e(asset('uploads/' . $recruitment->photo)); ?>"
                                            class="w-10 h-10 rounded-full object-cover mx-auto border"
                                            alt="Foto">
                                    <?php else: ?>
                                        <span class="text-xs text-gray-500">Tidak Ada Foto</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200"><?php echo e($recruitment->created_at); ?></td>
                                <!-- <td class="px-4 py-3 text-gray-900 dark:text-gray-200"><?php echo e($recruitment->bersedia); ?></td> -->
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200">
                                    <?php echo e($recruitment->Adminukm->name ?? 'Tidak Diketahui'); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                    </table>

                    <!-- Navigasi Tombol -->
                    <div class="flex justify-between items-center mt-4">
                        <button @click="if (page > 1) page--"
                                class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 transition text-sm">
                            &laquo; Sebelumnya
                        </button>
                        <div class="text-gray-600 dark:text-gray-300 text-sm">
                            Halaman <span x-text="page"></span> dari <?php echo e(ceil($recruitments->count() / 5)); ?>

                        </div>
                        <button @click="if (page < <?php echo e(ceil($recruitments->count() / 5)); ?>) page++"
                                class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 transition text-sm">
                            Selanjutnya &raquo;
                        </button>
                    </div>
                </div>  
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\UKM-TA\resources\views/ukm/Riwayat_pendaftaran.blade.php ENDPATH**/ ?>