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
<div class="col-12 col-xs-6 col-sm-6 col-md-6 col-xl-4 col-xxl-4 add_service" data-bs-toggle="modal" data-bs-target="#add">
    <div class="card mb-3">
        <div class="card-body p-3 text-center">
            <div class="mb-2 mt-4 skeleton-load" alt="" width="100" height="100" style="border-radius: 15%;width: 100px;height: 100px;margin: auto;"></div>
            <div class="derecha mt-2 mb-1">
                <h5 class="m-0 fw-bold nombre_ skeleton-load m-auto mb-2" style="width: 50%;height: 20px;"></h5>
                <div style="width: 90%;height: 20px;" class="skeleton-load m-auto"></div>
                <div class="mt-2 mb-2 box_cant d-flex justify-content-around p-2" style="border: 0;">
                    <div class="atributo skeleton-load">
                        <div style="height: 48px;width: 60px;"></div>
                    </div>
                    <div class="atributo skeleton-load">
                        <div style="height: 48px;width: 60px;"></div>

                    </div>
                    <div class="atributo skeleton-load">
                        <div style="height: 48px;width: 60px;"></div>

                    </div>
                </div>
                <div class="skeleton-load" style="width: 80%;height: 20px;margin: auto;"></div>

            </div>
        </div>
    </div>
</div>