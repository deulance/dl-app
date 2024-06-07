<template>
    <div class="loader-box-content">
        <img src="/assets/img/spinner.gif" class="loader-icon-btn" alt="">
        <!-- <i class="fa fa-spinner fa-spin loader-icon-btn"></i> -->
    </div>
</template>

<style scoped>
.loader-box-content {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
}

.loader-icon-btn {
    width: 80px;
}
</style>
