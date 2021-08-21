<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm truyện</div>

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

                        <form method="POST" action="<?php echo e(route('truyen.store')); ?>" enctype='multipart/form-data'>
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="slug">Tên truyện</label>
                                <input type="text" class="form-control" value="<?php echo e(old('tentruyen')); ?>" onkeyup="ChangeToSlug();" name="tentruyen" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lượt xem</label>
                                <input type="text" class="form-control" value="<?php echo e(old('views')); ?>" name="views"  aria-describedby="emailHelp" placeholder="Lượt xem">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khóa</label>
                                <input type="text" data-role="tagsinput" class="form-control" value="<?php echo e(old('tukhoa')); ?>" name="tukhoa"  aria-describedby="emailHelp" placeholder="">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tác giả</label>
                                <input type="text" class="form-control" value="<?php echo e(old('tacgia')); ?>" name="tacgia" aria-describedby="emailHelp" placeholder="Tác giả">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug truyện</label>
                                <input type="text" class="form-control" value="<?php echo e(old('slug_truyen')); ?>" name="slug_truyen" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug truyện...">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt truyện</label>
                                <textarea name="tomtat" id="ckeditor_truyen" class="form-control" rows="5" style="resize: none"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục truyện</label>
                                <select name="danhmuc" class="custom-select">
                                    <?php $__currentLoopData = $danhmuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $muc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($muc->id); ?>"><?php echo e($muc->tendanhmuc); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh truyện</label>
                                <input type="file" class="form-control-file" name="hinhanh">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích hoạt</label>
                                <select name="kichhoat" class="custom-select">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hoàn thiện</label>
                                <select name="hoanthien" class="custom-select">
                                    <option value="0">Rồi</option>
                                    <option value="1">Chưa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Truyện nổi bật/hot</label>
                                <select name="truyennoibat" class="custom-select">
                                    <option value="0">Truyện mới</option>
                                    <option value="1">Truyện nổi bật</option>
                                    <option value="2">Truyện xem nhiều</option>
                                </select>
                            </div>
                            <button type="submit" name="themtruyen" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\sach-truyen\resources\views/admincp/truyen/create.blade.php ENDPATH**/ ?>