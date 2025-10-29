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
            <?php echo e(__('Rekomendasi')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">
                    Data Rekomendasi Admin
                </h2>

                <div class="flex justify-end mb-3">
                    <button onclick="openModal(<?php echo e($show->id); ?>)"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Edit Data
                    </button>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 text-left">
                            <tr>
                                <th class="px-4 py-3 font-semibold">Jenis Organisasi</th>
                                <th class="px-4 py-3 font-semibold">Aktif melibatkan anggota</th>
                                <th class="px-4 py-3 font-semibold">Mayoritas Gender</th>
                                <th class="px-4 py-3 font-semibold">Faktor Prioritas</th>
                                <th class="px-4 py-3 font-semibold">Jenis Kegiatan</th>
                                <th class="px-4 py-3 font-semibold">Tingkat Komitmen</th>
                                <th class="px-4 py-3 font-semibold">Frekuensi Kegiatan</th>
                                <th class="px-4 py-3 font-semibold">Dukungan Non-Akademik</th>
                                <th class="px-4 py-3 font-semibold">Alasan Dukungan</th>
                                <th class="px-4 py-3 font-semibold">Target Jangka Pendek</th>
                            </tr>
                        </thead>
                        <tbody
                            class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700 text-gray-900 dark:text-gray-200">
                            <tr>
                                <td class="px-4 py-3"><?php echo e($show->question2); ?></td>
                                <td class="px-4 py-3"><?php echo e($show->question1); ?></td>
                                <td class="px-4 py-3"><?php echo e($show->JK); ?></td>
                                <td class="px-4 py-3"><?php echo e($show->question3); ?></td>
                                <td class="px-4 py-3"><?php echo e($show->question4); ?></td>
                                <td class="px-4 py-3"><?php echo e($show->question5); ?></td>
                                <td class="px-4 py-3"><?php echo e($show->question6); ?></td>
                                <td class="px-4 py-3"><?php echo e($show->question7); ?></td>
                                <td class="px-4 py-3"><?php echo e($show->question8); ?></td>
                                <td class="px-4 py-3"><?php echo e($show->question9); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl w-3/4 max-h-[90vh] overflow-y-auto">
            <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">Edit Data Rekomendasi</h3>
            <form id="updateForm">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="id" id="editId">

                <div class="grid grid-cols-2 gap-4">
                    <?php
                        $labels = [
                            'question2' => 'Jenis organisasi apa yang paling menggambarkan organisasi ini?',
                            'question1' => 'Apakah organisasi ini aktif melibatkan anggotanya dalam kegiatan secara rutin?',
                            'JK' => 'Mayoritas Gender di organisasi ini adalah',
                            'question3' => 'Apa faktor utama yang menjadi prioritas dalam organisasi ini?',
                            'question4' => 'Jenis kegiatan apa yang paling sering dilakukan oleh organisasi ini?',
                            'question5' => 'Tingkat komitmen yang diharapkan dari anggota dalam organisasi ini?',
                            'question6' => 'Seberapa sering organisasi ini menyelenggarakan kegiatan?',
                            'question7' => 'Seberapa besar organisasi ini mendorong anggotanya aktif di luar kegiatan akademik?',
                            'question8' => 'Alasan utama organisasi ini mendorong anggotanya aktif di luar kegiatan akademik?',
                            'question9' => 'Target jangka pendek apa yang ingin dicapai organisasi ini?',
                        ];
                    ?>

                    <?php
                        if (!isset($mappings)) {
                            $mappings = [
                                'question1' => ['Ya', 'Tidak'],
                                'JK' => ['Laki-Laki', 'Perempuan', 'Laki-Laki dan Perempuan'],
                                'question2' => ['Organisasi pengembangan jiwa kepemimpinan', 'Organisasi pengembangan minat bakat ( seni, olahraga, literasi, teknologi)'],
                                'question3' => ['Lingkungan yang mendukung dan positif', 'Peluang belajar dan berkembang', 'Kesempatan untuk menunjukkan hasil atau prestasi', 'Ruang untuk mengekspresikan ide'],
                                'question4' => ['Kompetisi', 'Kolaborasi Tim', 'Kegiatan Fisik', 'Kreativitas', 'Sosial', 'Pengabdian Masyarakat'],
                                'question5' => ['Komitmen Besar', 'Cukup Besar', 'Sedang', 'Kecil'],
                                'question6' => ['Sering', 'Cukup', 'Kadang-kadang'],
                                'question7' => ['Besar', 'Cukup', 'Biasa saja', 'Tidak tertarik'],
                                'question8' => ['Membangun jaringan/relasi', 'Menambah pengalaman', 'Melatih soft skill', 'Meningkatkan CV/portofolio'],
                                'question9' => ['Pengembangan diri', 'Belajar hal baru', 'Eksplorasi minat', 'Keseruan dan kebersamaan'],
                            ];
                        }
                    ?>


                    <?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <?php echo e($label); ?>

                            </label>
                            <select name="<?php echo e($field); ?>" id="edit<?php echo e(ucfirst($field)); ?>"
                                class="w-full border rounded px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200">
                                <?php $__currentLoopData = $mappings[$field]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($opt); ?>"><?php echo e($opt); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-4 flex justify-end gap-2">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- (`/recmawa/${id}/edit`)  -->

    <script>
        function openModal(id) {
            fetch(`/recmawa/${id}/edit`)
                .then(async res => {
                    if (!res.ok) {
                        const text = await res.text();
                        throw new Error(`Gagal ambil data (${res.status}): ${text}`);
                    }
                    return res.json();
                })
                .then(data => {
                    console.log('Data dari server:', data);
                    document.getElementById('editId').value = data.id;

                    const fields = ['question1', 'JK', 'question2', 'question3', 'question4',
                        'question5', 'question6', 'question7', 'question8', 'question9'];

                    fields.forEach(f => {
                        const select = document.getElementById('edit' + f.charAt(0).toUpperCase() + f.slice(1));
                        if (select) select.value = data[f] ?? '';
                    });

                    document.getElementById('editModal').classList.remove('hidden');
                    document.getElementById('editModal').classList.add('flex');
                })
                .catch(err => console.error('Gagal memuat data:', err));
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        document.getElementById('updateForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const id = document.getElementById('editId').value;
            const formData = new FormData(this);

            fetch(`/recmawa/${id}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-HTTP-Method-Override': 'PUT',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(async res => {
                    if (!res.ok) {
                        const text = await res.text();
                        throw new Error(`Update gagal (${res.status}): ${text}`);
                    }
                    return res.json();
                })
                .then(data => {
                    console.log('Respons update:', data);
                    alert(data.message || 'Data berhasil diperbarui!');
                    location.reload();
                })
                .catch(err => console.error('Gagal menyimpan:', err));
        });
    </script>
    <!-- `/recmawa/${id}` -->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\UKM-TA\resources\views/ormawa/show_recomendation.blade.php ENDPATH**/ ?>