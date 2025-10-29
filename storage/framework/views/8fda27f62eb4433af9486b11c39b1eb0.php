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
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-100 leading-tight">
                <?php echo e(__('Daftar Anggota')); ?>

            </h2>
            <button onclick="openModal('tambahModal')"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                + Tambah
            </button>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 transition duration-300">
                <table class="min-w-full text-left border border-gray-300 dark:border-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-100">
                        <tr>
                            <th class="border px-3 py-2">No</th>
                            <th class="border px-3 py-2">Nama</th>
                            <th class="border px-3 py-2">NIM</th>
                            <th class="border px-3 py-2">Jurusan</th>
                            <th class="border px-3 py-2">Tahun Masuk</th>
                            <th class="border px-3 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-100" x-data="{ page: 1 }">
                        <?php $__currentLoopData = $data_anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr x-show="page === Math.ceil((<?php echo e($index + 1); ?>) / 5)"
                                class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                                <td class="border px-3 py-2"><?php echo e($index + 1); ?></td>
                                <td class="border px-3 py-2"><?php echo e($data->nama); ?></td>
                                <td class="border px-3 py-2"><?php echo e($data->nim); ?></td>
                                <td class="border px-3 py-2"><?php echo e($data->jurusan); ?></td>
                                <td class="border px-3 py-2"><?php echo e($data->tahun_masuk); ?></td>
                                <td class="border px-3 py-2 text-center space-x-2">
                                    <button onclick="openModal('editModal<?php echo e($data->id); ?>')"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition duration-300">
                                        Edit
                                    </button>
                                    <form action="<?php echo e(route('hapus_anggota')); ?>" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');"
                                        style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded text-sm transition duration-300">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($data_anggota->isEmpty()): ?>
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 py-4 dark:text-gray-400">Tidak ada data
                                    anggota.</td>
                            </tr>
                        <?php endif; ?>


                    </tbody>


                </table>
                <!-- Navigasi Tombol -->
                <div class="flex justify-between items-center mt-4">
                    <button @click="if (page > 1) page--"
                        class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 transition text-sm">
                        &laquo; Sebelumnya
                    </button>
                    <div class="text-gray-600 dark:text-gray-300 text-sm">
                        Halaman <span x-text="page"></span> dari <?php echo e(ceil($data_anggota->count() / 5)); ?>

                    </div>
                    <button @click="if (page < <?php echo e(ceil($data_anggota->count() / 5)); ?>) page++"
                        class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 transition text-sm">
                        Selanjutnya &raquo;
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div id="tambahModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-lg p-6 transition duration-300">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Tambah Data</h2>
                <button onclick="closeModal('tambahModal')"
                    class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white">&times;</button>
            </div>

            <form action="<?php echo e(route('tambah_anggota')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="block font-medium mb-1">Nama</label>
                    <input type="text" name="nama"
                        class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
                <div class="mb-3">
                    <label class="block font-medium mb-1">NIM</label>
                    <input name="nim"
                        class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
                <div class="mb-3">
                    <label class="block font-medium mb-1">Jurusan</label>
                    <input name="jurusan"
                        class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
                <div class="mb-3">
                    <label class="block font-medium mb-1">Tahun Masuk</label>
                    <input type="date" name="tahun_masuk"
                        class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal('tambahModal')"
                        class="bg-gray-300 dark:bg-gray-600 text-black dark:text-white px-4 py-2 rounded hover:bg-gray-400 dark:hover:bg-gray-700 transition duration-300">Batal</button>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Tambah</button>
                </div>
            </form>
        </div>
    </div>

        <!-- Modal Edit -->
    <?php $__currentLoopData = $data_anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="editModal<?php echo e($data->id); ?>" 
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-lg p-6 transition duration-300">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Edit Data</h2>
                    <button onclick="closeModal('editModal<?php echo e($data->id); ?>')"
                        class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white">&times;</button>
                </div>

                <form action="<?php echo e(route('edit_anggota')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="id" value="<?php echo e($data->id); ?>">

                    <div class="mb-3">
                        <label class="block font-medium mb-1">Nama</label>
                        <input type="text" name="nama" value="<?php echo e($data->nama); ?>"
                            class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 
                                   dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div class="mb-3">
                        <label class="block font-medium mb-1">NIM</label>
                        <input name="nim" value="<?php echo e($data->nim); ?>"
                            class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 
                                   dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div class="mb-3">
                        <label class="block font-medium mb-1">Jurusan</label>
                        <input name="jurusan" value="<?php echo e($data->jurusan); ?>"
                            class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 
                                   dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div class="mb-3">
                        <label class="block font-medium mb-1">Tahun Masuk</label>
                        <input type="date" name="tahun_masuk" value="<?php echo e($data->tahun_masuk); ?>"
                            class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 
                                   dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeModal('editModal<?php echo e($data->id); ?>')"
                            class="bg-gray-300 dark:bg-gray-600 text-black dark:text-white px-4 py-2 rounded 
                                   hover:bg-gray-400 dark:hover:bg-gray-700 transition duration-300">
                            Batal
                        </button>
                        <button type="submit"
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-300">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }
        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>

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
<?php endif; ?><?php /**PATH C:\laragon\www\UKM-TA\resources\views/daftar_anggota.blade.php ENDPATH**/ ?>