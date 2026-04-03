<div
    <?php echo e($attributes
            ->merge([
                'id' => $getId(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH E:\belajar\laravel-website-sekolah\web-profile-sekolah\vendor\filament\forms\resources\views/components/group.blade.php ENDPATH**/ ?>