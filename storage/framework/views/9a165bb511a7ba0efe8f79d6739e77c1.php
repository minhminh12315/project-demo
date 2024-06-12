<?php $__env->startSection('content'); ?>


<main>
    <div class="container">
        <?php if(isset($prdName->category)): ?>
        <a class="product-detail-link" href="<?php echo e(route('home.index')); ?>">Main Page</a>
        <span>-></span>
        <a class="product-detail-link" href="<?php echo e(route('shop')); ?>">shop</a>
        <span>-></span>
        <a class="product-detail-link" href="<?php echo e(route('shop.category', ['id' => $prdName->category->id])); ?>"><?php echo e($prdName->category->name); ?></a>
        <span>-></span>
        <a class="product-detail-link" href="<?php echo e(route('product.detail', $prdName->id)); ?>"><?php echo e($prdName->name); ?></a>
        <?php endif; ?>
        <div class="product-detail p-5">
            <div class="row bg-white">
                <div class="col-6 ">
                    <div class="image-wrapper">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                            <?php
                                $firstImage = true;
                            ?>
                            <?php $__currentLoopData = $prd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $prd->productVariants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $variant->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="carousel-item <?php echo e($firstImage ? 'active' : ''); ?>">
                                            <img src="<?php echo e(asset($image->image_path)); ?>" height="300px" width="500px" class="d-block w-100" alt="<?php echo e($prd->name); ?>">
                                        </div>
                                        <?php
                                            $firstImage = false;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-6 ">
                    <h3 class="card-title pt-4" id="name"><?php echo e($prdName->name); ?></h3>
                    <div class="card-text pt-3" id="price"> 
                    </div>
                    <div class="card-text pt-2"><?php echo e($prdName->description); ?></div>
                    <form action="#">
                        <div>
                            <label for="color">Color</label>
                            <select name="color" id="color">
                                <?php $__currentLoopData = $uniqueColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($color); ?>"><?php echo e($color); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div>
                        <div>
                            <label for="size">Size</label>
                            <select name="size" id="size">
                                <?php if(isset($sizesByColor)): ?>
                                    <?php $__currentLoopData = $sizesByColor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($size); ?>"><?php echo e($size); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <?php $__currentLoopData = $uniqueSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($size); ?>"><?php echo e($size); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            </select>
                        </div>
                        <div>
                            <input type="number" name="quantity" id="quantity" value="1" required>
                        </div>
                        <a type="submit" id="addToCart" class="btn btn-primary mt-3">Add to card</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/user/product-detail.blade.php ENDPATH**/ ?>