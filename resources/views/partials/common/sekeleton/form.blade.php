<style>
    .skeleton-wrapper {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 20px;
    }

    .skeleton-text {
        width: 100%;
        height: 25px;
        background: #e0e0e0;
        border-radius: 4px;
        animation: shimmer 1.5s infinite linear;
    }

    .skeleton-text.short {
        width: 60%;
    }


    @keyframes shimmer {
        0% {
            background-position: 100%;
        }

        100% {
            background-position: -100%;
        }
    }

    .skeleton-image,
    .skeleton-text {
        background: linear-gradient(90deg,
                #e0e0e0 25%,
                #f5f5f5 50%,
                #e0e0e0 75%);
        background-size: 200% 100%;
    }
</style>
<div class="d-flex mb-4">
    <div class="col-4"><div class="skeleton-text"></div></div>
    <div class="col-1"></div>
    <div class="col-7"><div class="skeleton-text"></div></div>
</div>
<div class="d-flex mb-4">
    <div class="col-3"><div class="skeleton-text"></div></div>
    <div class="col-2"></div>
    <div class="col-7"><div class="skeleton-text"></div></div>
</div>
<div class="d-flex mb-4">
    <div class="col-4"><div class="skeleton-text"></div></div>
    <div class="col-1"></div>
    <div class="col-7"><div class="skeleton-text"></div></div>
</div>
<div class="d-flex mb-4">
    <div class="col-9"></div>
    <div class="col-3"><div class="skeleton-text"></div></div>
</div>
