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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('My Ormawa')); ?>

            </h2>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-gray-50">
        
        <div class="bg-white p-10 rounded-xl shadow-lg space-y-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">


                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="<?php echo e(Storage::url($ormawa->logo)); ?>" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">

                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    <?php echo e($ormawa->name); ?>

                                </h3>
                                <p class="text-slate-500 text-sm">

                                </p>
                            </div>
                        </div>
                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="<?php echo e(route('ormawa.edit', $ormawa->id)); ?>" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit Company
                            </a>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold">About</h3>
                        <p>
                            <?php echo e($ormawa->about); ?>

                        </p>
                    </div>

                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold">Batas Tanggal Pendaftaran</h3>
                        <p>
                            <?php echo e($ormawa->batas_pendaftaran); ?>

                        </p>
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
<?php endif; ?><?php /**PATH C:\laragon\www\UKM-TA\resources\views/ormawa/index.blade.php ENDPATH**/ ?>