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
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-2xl text-yellow-900 leading-tight">
                <?php echo e(__('Tentang UKM')); ?>

            </h2>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-gray-100">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-indigo rounded-3xl shadow-xl p-10 space-y-8">

                
                <div class="flex flex-col md:flex-row items-center md:justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <img src="<?php echo e(Storage::url($abouts->logo)); ?>"
                             alt="Logo <?php echo e($abouts->nama_organisasi); ?>"
                             class="rounded-xl object-cover w-24 h-24 shadow-md border border-gray-200">
                        <div>
                            <h3 class="text-2xl font-bold text-indigo-900"><?php echo e($abouts->nama_organisasi); ?></h3>
                            <p class="text-sm text-slate-500 italic"><?php echo e($abouts->slogan); ?></p>
                        </div>
                    </div>
                    <div class="flex">
                        <a href="<?php echo e(route('abouts.edit', $abouts->id)); ?>"
                           class="px-6 py-2 rounded-full bg-indigo-700 text-white font-semibold shadow hover:bg-indigo-800 transition duration-200">
                            ✏️ Ubah Data
                        </a>
                    </div>
                </div>

                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-800">
                    <div class="flex gap-4 items-start">
                        <div class="text-indigo-600 text-xl">📄</div>
                        <div>
                            <h4 class="font-semibold text-lg">Tentang Kami</h4>
                            <p class="text-sm mt-1"><?php echo e($abouts->tentang_kami); ?></p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start">
                        <div class="text-indigo-600 text-xl">📧</div>
                        <div>
                            <h4 class="font-semibold text-lg">Email</h4>
                            <p class="text-sm mt-1"><?php echo e($abouts->email); ?></p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start">
                        <div class="text-indigo-600 text-xl">📞</div>
                        <div>
                            <h4 class="font-semibold text-lg">No Telepon</h4>
                            <p class="text-sm mt-1"><?php echo e($abouts->nomer_telepon); ?></p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start">
                        <div class="text-indigo-600 text-xl">📍</div>
                        <div>
                            <h4 class="font-semibold text-lg">Lokasi</h4>
                            <p class="text-sm mt-1"><?php echo e($abouts->lokasi); ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
       <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if(session('success')): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '<?php echo e(session("success")); ?>',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
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
<?php endif; ?>
<?php /**PATH C:\laragon\www\UKM-TA\resources\views/abouts/index.blade.php ENDPATH**/ ?>