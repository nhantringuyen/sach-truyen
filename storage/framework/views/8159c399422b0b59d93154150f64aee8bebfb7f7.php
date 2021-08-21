<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật danh mục truyện</div>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('danhmuc.update',[$danhmuc->id])); ?>"  enctype='multipart/form-data'>
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="category_name">Tên danh mục</label>
                                <input type="text" class="form-control" value="<?php echo e($danhmuc->tendanhmuc); ?>" name="tendanhmuc" id="category_name" placeholder="Tên danh mục...">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khóa</label>
                                <input type="text" class="form-control" value="<?php echo e(old('tukhoa')); ?>" name="tukhoa" placeholder="">

                            </div>
                            <div class="form-group">
                                <label for="convert_slug">Slug danh mục</label>
                                <input type="text" class="form-control" value="<?php echo e($danhmuc->slug_danhmuc); ?>" name="slug_danhmuc" id="convert_slug"  placeholder="Tên danh mục...">

                            </div>
                            <div class="form-group">
                                <label for="category_desc">Mô tả danh mục</label>
                                <input type="text" class="form-control" value="<?php echo e($danhmuc->mota); ?>" name="mota" id="category_desc"  placeholder="Mô tả danh mục">

                            </div>
                            <div class="form-group">
                                <label for="category_image">Hình ảnh danh mục</label>
                                <input type="file" class="form-control-file" name="hinhanh" id="category_image">

                            </div>
                            <div class="form-group">
                                <label for="active_select">Kích hoạt</label>
                                <select name="kichhoat" class="custom-select" id="active_select">
                                    <option value="0" <?php echo e($danhmuc->kichhoat == 0 ? 'selected' : ''); ?>>Kích hoạt</option>
                                    <option value="1" <?php echo e($danhmuc->kichhoat == 1 ? 'selected' : ''); ?>>Không kích hoạt</option>
                                </select>
                            </div>

                            <button type="submit" name="themdanhmuc" class="btn btn-primary">Thêm</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\sach-truyen\resources\views/admincp/danhmuctruyen/edit.blade.php ENDPATH**/ ?>