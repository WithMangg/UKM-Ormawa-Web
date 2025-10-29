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
        <div class="flex flex-col sm:flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('Kelola Pengguna')); ?>

            </h2>
            <a href="<?php echo e(route('users.create')); ?>"
                class="mt-4 sm:mt-0 px-6 py-3 bg-indigo-600 text-white rounded-full font-semibold hover:bg-indigo-700 transition duration-300">
                Tambah User
            </a>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-8" x-data="{ currentPage: 1, usersPerPage: 5 }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <?php
                    $totalUsers = count($users);
                    $chunkedUsers = $users->chunk(5);
                ?>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-indigo-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Username</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Roles</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <?php $__currentLoopData = $chunkedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody x-show="currentPage === <?php echo e($index + 1); ?>" class="bg-white divide-y divide-gray-100">
                                    <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-800"><?php echo e($user->name); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-800"><?php echo e($user->email); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">
                                                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($role->name); ?><?php if(!$loop->last): ?>, <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex justify-center gap-2">
                                                    <a href="<?php echo e(route('users.edit', $user->id)); ?>"
                                                        class="px-4 py-2 bg-indigo-500 text-white rounded-full hover:bg-indigo-600 transition">
                                                        Edit
                                                    </a>
                                                    <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST"
                                                        class="delete-form">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit"
                                                            class="px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>

                <!-- Navigasi Slide -->
                <div class="flex justify-between items-center p-4">
                    <button @click="if(currentPage > 1) currentPage--"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300"
                        :disabled="currentPage === 1">
                        &larr; Sebelumnya
                    </button>

                    <div class="space-x-2">
                        <template x-for="page in <?php echo e($chunkedUsers->count()); ?>">
                            <button @click="currentPage = page"
                                :class="{'bg-indigo-600 text-white': currentPage === page, 'bg-gray-200 text-gray-700': currentPage !== page}"
                                class="w-8 h-8 rounded-full font-semibold hover:bg-indigo-500 hover:text-white transition">
                                <span x-text="page"></span>
                            </button>
                        </template>
                    </div>

                    <button @click="if(currentPage < <?php echo e($chunkedUsers->count()); ?>) currentPage++"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300"
                        :disabled="currentPage === <?php echo e($chunkedUsers->count()); ?>">
                        Selanjutnya &rarr;
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data ini akan dihapus dan tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

     
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
<?php endif; ?><?php /**PATH C:\laragon\www\UKM-TA\resources\views/user/index.blade.php ENDPATH**/ ?>