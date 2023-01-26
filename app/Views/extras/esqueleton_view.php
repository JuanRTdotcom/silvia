<style>
    .skeleton-load {
        background: #e7e7ff;
        animation: .65s esqueleto infinite alternate ease-in;
    }

    @keyframes esqueleto {
        from {
            background: #e7e7ff;
        }

        to {
            background: transparent;
        }
    }
</style>
<div class="col-6 col-xs-6 col-sm-6 col-md-6 col-xl-4 col-xxl-3 cursor-pointer">
    <div class="card mb-3" style="height: 130px;">
        <div class="card-body row p-3 m-0">
            <div class="col-md-5 p-0 skeleton-load" height="130" width="150" style="object-fit: cover;border-radius:15px;" alt="corte">

            </div>
            <div class="col-md-7">
                <h5 class="card-title fw-bolder skeleton-load" style="color: #5f7286 !important;height:18px;margin-bottom:4px;border-radius:5px"></h5>
                <p class="card-text skeleton-load" style="color:#b4b9bd !important;height:18px;margin-bottom:4px;border-radius:5px">
                </p>
                <p class="card-text skeleton-load" style="height:18px;margin-bottom:4px;border-radius:5px;width: 50%;">
                    <small class="text-muted"></small>
                </p>

            </div>
        </div>
    </div>
</div>