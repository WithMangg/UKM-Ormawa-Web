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
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                <?php echo e(__('Kelola Berita')); ?>

            </h2>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-gray-900 rounded-lg shadow-lg">
        <h2 class="text-3xl font-extrabold text-white mb-8">Edit Berita</h2>

        <?php if($errors->any()): ?>
            <div class="mb-6 rounded bg-red-800 border border-red-700 text-red-300 px-6 py-4">
                <strong class="block mb-2 text-lg">Periksa kembali inputan Anda:</strong>
                <ul class="list-disc pl-6 space-y-1">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('berita.update', $berita->id)); ?>" method="POST" enctype="multipart/form-data" class="space-y-8">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="judul" class="block text-sm font-semibold text-gray-300 mb-2">Judul Berita</label>
                <input type="text" name="judul" id="judul"
                    value="<?php echo e(old('judul', $berita->judul)); ?>" required
                    class="w-full rounded-md bg-gray-800 border border-gray-700 text-gray-200 placeholder-gray-400
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2" />
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-semibold text-gray-300 mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3" required
                    class="w-full rounded-md bg-gray-800 border border-gray-700 text-gray-200 placeholder-gray-400
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2 resize-none"><?php echo e(old('deskripsi', $berita->deskripsi)); ?></textarea>
            </div>

            <div>
                <label for="isi_berita" class="block text-sm font-semibold text-gray-300 mb-2">Isi Berita</label>
                <textarea name="isi_berita" id="isi_berita" rows="6" required
                    class="w-full rounded-md bg-gray-800 border border-gray-700 text-gray-200 placeholder-gray-400
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2 resize-y"><?php echo e(old('isi_berita', $berita->isi_berita)); ?></textarea>
            </div>

            <div>
                <label for="tanggal_berita" class="block text-sm font-semibold text-gray-300 mb-2">Tanggal Berita</label>
                <input type="date" name="tanggal_berita" id="tanggal_berita"
                    value="<?php echo e(old('tanggal_berita', $berita->tanggal_berita)); ?>" required
                    class="w-full rounded-md bg-gray-800 border border-gray-700 text-gray-200
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2" />
            </div>

            <div>
                <label for="foto_kegiatan" class="block text-sm font-semibold text-gray-300 mb-2">Gambar Berita</label>
                <?php if($berita->foto_kegiatan): ?>
                    <div class="mb-4">
                        <img src="<?php echo e(asset('storage/' . $berita->foto_kegiatan)); ?>" alt="Gambar Berita" class="max-w-xs rounded shadow-lg border border-gray-700">
                    </div>
                <?php endif; ?>
                <input type="file" name="foto_kegiatan" id="foto_kegiatan" accept="image/*"
                    class="w-full text-gray-300
                           file:mr-4 file:py-2 file:px-4
                           file:rounded file:border-0
                           file:bg-indigo-600 file:text-white
                           file:hover:bg-indigo-700
                           focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti gambar.</p>
            </div>

            <div class="flex space-x-4">
                <button type="submit"
                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3
                           text-lg font-semibold text-white shadow-md hover:bg-indigo-700 focus:outline-none
                           focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                    Update Berita
                </button>
                <a href="<?php echo e(route('berita.index')); ?>"
                    class="inline-flex justify-center rounded-md border border-gray-600 bg-gray-800 px-6 py-3
                           text-lg font-semibold text-gray-300 shadow-md hover:bg-gray-700 focus:outline-none
                           focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                    Batal
                </a>
            </div>
        </form>
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
<?php /**PATH C:\laragon\www\UKM-TA\resources\views/berita/edit.blade.php ENDPATH**/ ?>